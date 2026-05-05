<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class GameController extends Controller
{
    public function showQuiz($language, $level)
    {
        // Cari soal berdasarkan bahasa dan level di database
        $question = Question::where('language', $language)
            ->where('level', $level)
            ->first();

        // Jika soal tidak ditemukan, redirect kembali ke peta dengan pesan error
        if (!$question) {
            return redirect('/map')->with('error', 'Stage ini belum tersedia!');
        }

        // Tampilkan halaman quiz dengan soal yang ditemukan
        return view('quiz', compact('question', 'language', 'level'));
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
