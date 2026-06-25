<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GameController extends Controller
{
    /**
     * Menampilkan halaman Quiz/Arena pertarungan.
     * Mengelola session agar soal tidak berulang berturut-turut.
     */
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
        // ambil saja soal yang ada tanpa pengecualian ID.
        if (!$question) {
            $question = Question::where('language', $language)
                            ->where('level', $level)
                            ->inRandomOrder()
                            ->first();
        }

        // 4. Jika memang belum ada soal sama sekali untuk level ini di database
        if (!$question) {
            return redirect('/map')->with('error', 'Stage ini belum tersedia!');
        }

        // 5. Simpan ID soal ini ke memori agar tidak muncul berturut-turut di percobaan berikutnya
        session(['last_question_id' => $question->id]);

        return view('quiz', compact('question', 'level', 'language'));
    }

    /**
     * Mengecek ketersediaan soal di background via AJAX (untuk World Map).
     */
    public function checkStage($language, $level)
    {
        $exists = Question::where('language', $language)
                          ->where('level', $level)
                          ->exists();

        return response()->json(['exists' => $exists]);
    }

    /**
     * Inti Evaluasi: Menerima jawaban, menilai secara berlapis,
     * dan mengelola panggilan AI untuk Post-Mortem Analysis (Game Over).
     */
    public function submitAnswer(Request $request)
    {
        // 1. Ekstrak Input
        $questionId = $request->input('question_id');
        $userAnswer = $request->input('user_answer');

        // MENERIMA STATUS NYAWA DARI FRONTEND (Agar backend tahu kapan memicu Post-Mortem AI)
        $isGameOver = filter_var($request->input('is_game_over', false), FILTER_VALIDATE_BOOLEAN);

        // 2. Fetch Data Soal
        $question = Question::find($questionId);
        if (!$question) {
            return response()->json(['error' => 'Soal tidak ditemukan di database'], 404);
        }

        $correctAnswer = $question->correct_answer;
        $isPilihanGanda = !empty($question->options);

        // ======================================================================
        // LAPIS 1: SANITASI & EXACT MATCH (BERLAKU UNTUK SEMUA TIPE SOAL)
        // Sanitasi: lowercase, hapus spasi, seragamkan kutip (') -> (")
        // ======================================================================
        $cleanUser = strtolower(preg_replace('/\s+/', '', $userAnswer));
        $cleanCorrect = strtolower(preg_replace('/\s+/', '', $correctAnswer));

        $cleanUser = str_replace("'", '"', $cleanUser);
        $cleanCorrect = str_replace("'", '"', $cleanCorrect);

        // Jika sama persis -> Langsung Benar (Efisiensi 100%, 0 Token AI)
        if ($cleanUser === $cleanCorrect) {
            return response()->json([
                'is_correct' => true,
                'method' => 'exact_match',
                'feedback' => 'Luar biasa! Jawaban yang kamu berikan sangat tepat.'
            ]);
        }

        // ======================================================================
        // HANDLING PILIHAN GANDA SALAH
        // Jika soal PG dan gagal Exact Match -> Mutlak Salah. Ambil database penjelasan.
        // ======================================================================
        if ($isPilihanGanda) {
            return response()->json([
                'is_correct' => false,
                'method' => 'multiple_choice_wrong',
                // Jika GameOver: Beri Penjelasan DB. Jika Nyawa Masih Ada: Beri Alert Umum
                'feedback' => $isGameOver
                    ? ($question->penjelasan ?? 'Pilihan yang kamu pilih salah.')
                    : 'Pilihan tersebut kurang tepat, coba lagi!'
            ]);
        }

        // ======================================================================
        // KHUSUS SOAL ISIAN (CODING)
        // ======================================================================

        // LAPIS 1.5: PENGECEKAN KEMIRIPAN (COST OPTIMIZATION UNTUK ALERT)
        similar_text($cleanUser, $cleanCorrect, $similarityPercent);

        // JIKA JAWABAN MELENCENG JAUH / NGAWUR (< 65%)
        // -> Anggap salah mutlak. Ambil database penjelasan (baik untuk Alert atau Game Over).
        if ($similarityPercent < 65) {
            return response()->json([
                'is_correct' => false,
                'method' => 'low_similarity',
                // Jika GameOver: Beri Penjelasan DB. Jika Nyawa Masih Ada: Beri Alert Umum
                'feedback' => $isGameOver
                    ? ($question->penjelasan ?? 'Sintaks salah dan logikanya melenceng jauh.')
                    : 'Jawabanmu kurang tepat, coba periksa lagi sintaksnya.'
            ]);
        }

        // JIKA JAWABAN MENDEKATI BENAR (>= 65%) TAPI NYAWA MASIH ADA (Bukan Game Over)
        // CEGAT PANGGILAN API GEMINI DI SINI! Tampilkan alert statis saja untuk hemat token.
        if (!$isGameOver) {
            return response()->json([
                'is_correct' => false,
                'method' => 'close_but_no_ai',
                'feedback' => 'Penulisan kodemu sudah hampir benar! Coba teliti lagi, mungkin ada typo atau simbol yang kurang.'
            ]);
        }
        // ======================================================================
        // LAPIS 2: AI POST-MORTEM EVALUATOR
        // HANYA BERJALAN JIKA: ISIAN + MENDEKATI BENAR (TYPO) + NYAWA HABIS (GAME OVER)
        // ======================================================================

        // Prompt AI difokuskan sebagai instruktur yang menjelaskan letak typo
        $prompt = "Kamu adalah instruktur coding cerdas untuk game edukasi pemrograman.
        Bahasa: {$question->language}
        Soal: {$question->question_text}
        Kunci Jawaban Resmi: {$correctAnswer}
        Jawaban Peserta: {$userAnswer}

        Konteks: Sisa nyawa peserta habis (Game Over). Jawaban peserta sudah hampir benar (kemiripan tinggi), tapi terdapat kesalahan kecil seperti typo, kurang simbol, salah quotes, atau tag tak tertutup.
        Tugas: Beritahu letak kesalahannya secara spesifik dan ringkas dalam 1 kalimat (Post-Mortem Analysis).
        Balas HANYA dengan format JSON valid:
        {
            \"is_correct\": false,
            \"feedback\": \"Berikan 1 kalimat singkat langsung pada intinya (contoh: 'Kamu lupa menambahkan tanda titik koma di akhir').\"
        }";

        try {
            // Setup & Loop API Keys untuk mitigasi Rate Limit (429)
            $apiKeys = explode(',', env('GEMINI_API_KEYS'));
            $response = null;

            foreach ($apiKeys as $key) {
                // Menggunakan model Gemini 2.5 Flash terbaru dari daftar Anda
                $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=" . trim($key);

                $response = Http::withHeaders([
                    'Content-Type' => 'application/json',
                ])->post($url, [
                    'contents' => [['parts' => [['text' => $prompt]]]],
                    // Paksa output JSON agar mudah didecode
                    'generationConfig' => ['response_mime_type' => 'application/json']
                ]);

                // Berhenti loop jika sukses atau bukan 429
                if ($response->successful() || $response->status() !== 429) {
                    break;
                }
            }

            if ($response && $response->successful()) {
                // Parse respon JSON dari AI
                $aiText = $response->json('candidates.0.content.parts.0.text');
                $aiResult = json_decode($aiText, true);

                return response()->json([
                    'is_correct' => false, // Dipaksa false karena nyawa sudah habis
                    'method' => 'ai_evaluation',
                    'feedback' => $aiResult['feedback'] ?? 'Ada kesalahan kecil pada penulisan sintaks kodemu.'
                ]);
            } else {
                // Handle jika API Google gagal total setelah mencoba semua key
                $pesanErrorGoogle = $response ? $response->body() : 'Tidak ada respon dari server';
                throw new \Exception("Google API Error: " . $pesanErrorGoogle);
            }

        } catch (\Exception $e) {
            // FALLBACK MEKANISME: Jika AI Error saat Game Over, kembali pakai database penjelasan
            return response()->json([
                'is_correct' => false,
                'method' => 'fallback_error',
                'feedback' => $question->penjelasan ?? 'Sintaks kodemu hampir benar, namun terdapat sedikit kesalahan ketik.'
            ]);
        }
    }
}
