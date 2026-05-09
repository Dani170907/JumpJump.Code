<?php

use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('beranda');
});

Route::get('/map', function () {
    return view('map');
});

Route::get('/quiz/{language}/{level}', [GameController::class, 'showQuiz']);

// Route untuk AJAX mengecek ketersediaan soal
Route::get('/check-stage/{language}/{level}', [GameController::class, 'checkStage']);

// Rute untuk AI Evaluator
Route::post('/submit-answer', [GameController::class, 'submitAnswer'])->name('submit.answer');

Route::get('/cek-model', function() {
    // Mengambil API Key pertama dari .env
    $keys = explode(',', env('GEMINI_API_KEYS'));
    $key = trim($keys[0]); 

    // Menembak endpoint ListModels bawaan Google
    $url = "https://generativelanguage.googleapis.com/v1beta/models?key=" . $key;

    return Http::get($url)->json();
});
