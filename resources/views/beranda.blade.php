<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>JUMPJUMP.CODE</title>
    <style>
        body {
            font-family: 'Press Start 2P', cursive;
        }
    </style>
</head>
<body class="bg-blue-300 min-h-screen flex items-center justify-center bg-cover bg-center" style="background-image: url('{{ asset('images/bg-main.png') }}');">
<x-alert /> 
    <div class="text-center w-full max-w-5xl px-4">

        <!-- Judul/Banner -->
        <div class="bg-blue-600 border-4 border-blue-800 p-6 rounded-lg shadow-[8px_8px_0_0_rgba(0,0,0,0.5)] mb-32 transform hover:scale-105 transition-transform">
            <h1 class="text-white text-xl md:text-2xl leading-relaxed tracking-wider">
                BELAJAR CODING: PETUALANGAN LOGIKA
            </h1>
        </div>

        <!-- Tombol Menu -->
        <div class="flex flex-col md:flex-row justify-center items-center gap-10">
            <!-- Tombol Start -->
            <button onclick="openModal()" class="w-80 py-6 bg-red-500 hover:bg-red-600 text-white text-3xl border-4 border-red-800 rounded-full shadow-[6px_6px_0_0_rgba(0,0,0,0.4)] active:translate-y-1 active:shadow-none transition-all">
                START
            </button>

            <!-- Tombol Setting -->
            <button onclick="openSettingModal()" class="w-80 py-6 bg-teal-400 hover:bg-teal-500 text-white text-3xl border-4 border-teal-800 rounded-full shadow-[6px_6px_0_0_rgba(0,0,0,0.4)] active:translate-y-1 active:shadow-none transition-all">
                SETTING
            </button>
        </div>

    </div>
    @include('partials.modal-nama')
    @include('partials.modal-setting')
    @include('partials.modal-bahasa')

    @stack('scripts')
</body>
</html>
