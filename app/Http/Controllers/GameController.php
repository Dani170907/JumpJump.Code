<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GameController extends Controller
{
    public function showQuiz($language, $level)
    {
        // 1. Cek apakah ada ID soal terakhir yang disimpan di memori (Session)
        $lastQuestionId = session('last_question_id');

        // 2. Cari soal acak, TAPI kecualikan ID soal yang baru saja dimainkan
        $question = Question::where('language', $language)
                            ->where('level', $level)
                            ->when($lastQuestionId, function($query) use ($lastQuestionId) {
                                return $query->where('id', '!=', $lastQuestionId);
                            })
                            ->inRandomOrder()
                            ->first();

        // 3. Fallback: Jika soalnya cuma 1 di database (sehingga query di atas kosong),
        // ambil saja soal yang ada tanpa pengecualian.
        if (!$question) {
             $question = Question::where('language', $language)
                            ->where('level', $level)
                            ->inRandomOrder()
                            ->first();
        }

        // 4. Jika memang belum ada soal sama sekali untuk level ini
        if (!$question) {
            return redirect('/map')->with('error', 'Stage ini belum tersedia!');
        }

        // 5. Simpan ID soal ini ke memori agar tidak muncul berturut-turut di percobaan berikutnya
        session(['last_question_id' => $question->id]);

        return view('quiz', compact('question', 'level', 'language'));
    }

    // Fungsi untuk mengecek ketersediaan soal di background menggunakan AJAX
    public function checkStage($language, $level)
    {
        // Mengecek apakah soal tersebut ada di database (mengembalikan true/false)
        $exists = Question::where('language', $language)
                          ->where('level', $level)
                          ->exists();

        // Mengirimkan jawaban ke JavaScript dalam format JSON
        return response()->json(['exists' => $exists]);
    }

    public function submitAnswer(Request $request)
    {
        $questionId = $request->input('question_id');
        $userAnswer = $request->input('user_answer');

        $question = Question::find($questionId);

        if (!$question) {
            return response()->json(['error' => 'Soal tidak ditemukan'], 404);
        }

        $correctAnswer = $question->correct_answer;

        // Cek apakah soal ini Pilihan Ganda (punya opsi) atau Isian (opsi kosong)
        $isPilihanGanda = !empty($question->options);

        // LAPIS 1: SANITASI & EXACT MATCH (BERLAKU UNTUK SEMUA TIPE SOAL)
        $cleanUser = strtolower(preg_replace('/\s+/', '', $userAnswer));
        $cleanCorrect = strtolower(preg_replace('/\s+/', '', $correctAnswer));

        $cleanUser = str_replace("'", '"', $cleanUser);
        $cleanCorrect = str_replace("'", '"', $cleanCorrect);

        // Jika sama persis -> Langsung Benar
        if ($cleanUser === $cleanCorrect) {
            return response()->json([
                'is_correct' => true,
                'method' => 'exact_match',
                'feedback' => 'Luar biasa! Jawaban yang kamu berikan sangat tepat.'
            ]);
        }

        // KHUSUS PILIHAN GANDA (STOP DI SINI, JANGAN PANGGIL AI)
        if ($isPilihanGanda) {
            // Kalau pilihan ganda dan tidak sama persis di Lapis 1, berarti mutlak salah.
            return response()->json([
                'is_correct' => false,
                'method' => 'multiple_choice_wrong',
                'feedback' => $question->penjelasan_salah ?? 'Aksi yang kamu pilih kurang tepat. Coba perhatikan lagi soalnya.'
            ]);
        }

        // LAPIS 1.5: PENGECEKAN KEMIRIPAN (KHUSUS SOAL ISIAN KODE)
        similar_text($cleanUser, $cleanCorrect, $similarityPercent);

        if ($similarityPercent < 40) {
            return response()->json([
                'is_correct' => false,
                'method' => 'low_similarity',
                'feedback' => $question->penjelasan_salah ?? 'Sintaks salah dan logikanya melenceng jauh dari tujuan soal.'
            ]);
        }
        // LAPIS 2: AI EVALUATOR (KHUSUS SOAL ISIAN YANG HAMPIR BENAR)
        $prompt = "Kamu adalah sistem penilai otomatis untuk game edukasi pemrograman.
        Bahasa Pemrograman: {$question->language}
        Soal: {$question->question_text}
        Kunci Jawaban Resmi: {$correctAnswer}
        Jawaban Peserta: {$userAnswer}

        Tugasmu: Evaluasi apakah 'Jawaban Peserta' ekuivalen secara logika dan sintaks dengan 'Kunci Jawaban Resmi'.
        Balas HANYA dengan format JSON valid:
        {
            \"is_correct\": true/false,
            \"feedback\": \"Berikan 1 kalimat singkat alasan\"
        }";

        try {
            $apiKeys = explode(',', env('GEMINI_API_KEYS'));
            $response = null;

            foreach ($apiKeys as $key) {
                // 1. UBAH NAMA MODEL MENJADI gemini-pro
                $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent?key=" . trim($key);

                $response = Http::withHeaders([
                    'Content-Type' => 'application/json',
                ])->post($url, [
                    // 2. HAPUS BAGIAN generationConfig KARENA GEMINI-PRO TIDAK MENDUKUNGNYA
                    'contents' => [['parts' => [['text' => $prompt]]]]
                ]);

                if ($response->successful() || $response->status() !== 429) {
                    break;
                }
            }

            if ($response && $response->successful()) {
                $aiText = $response->json('candidates.0.content.parts.0.text');

                // Tambahan pengaman: Terkadang gemini-pro masih bandel memberikan markdown ```json ... ```
                // Kita bersihkan dulu teksnya sebelum di-decode
                $cleanAiText = str_replace(['```json', '```'], '', $aiText);
                $aiResult = json_decode(trim($cleanAiText), true);

                return response()->json([
                    'is_correct' => $aiResult['is_correct'] ?? false,
                    'method' => 'ai_evaluation',
                    'feedback' => $aiResult['feedback'] ?? 'Analisis kode oleh AI selesai.'
                ]);
            } else {
                $pesanErrorGoogle = $response ? $response->body() : 'Tidak ada respon dari server';
                throw new \Exception("Google API Error: " . $pesanErrorGoogle);
            }

        } catch (\Exception $e) {
            // Biarkan mode DEBUG menyala dulu sampai kita yakin berhasil
            return response()->json([
                'is_correct' => false,
                'method' => 'fallback_error',
                'feedback' => 'DEBUG ERROR: ' . $e->getMessage()
            ]);
        }
    }
}
