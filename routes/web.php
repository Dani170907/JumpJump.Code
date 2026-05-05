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
