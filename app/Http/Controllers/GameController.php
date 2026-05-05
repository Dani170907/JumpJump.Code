<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

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
}
