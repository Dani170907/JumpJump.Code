<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('beranda');
});

Route::get('/map', function () {
    return view('map');
});

Route::get('/quiz/{level}', function ($level) {
    return view('quiz', ['level' => $level]);
});
