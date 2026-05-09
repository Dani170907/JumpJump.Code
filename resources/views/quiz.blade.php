<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Stage {{ $level }} - JUMPJUMP.CODE</title>
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/line-numbers/prism-line-numbers.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism-themes/1.9.0/prism-vsc-dark-plus.min.css" rel="stylesheet" />

<style>
        /* 1. BASE LAYOUT KODE (SOLUSI FINAL PASTI RAPI) */
        .question-content pre {
            background-color: #23262E !important;
            border: 3px solid #5C6370 !important;
            border-radius: 10px !important;

            /* Ruang Kosong Kiri = 4.5rem untuk tempat angka */
            padding: 1.5rem 1.5rem 1.5rem 4.5rem !important;

            margin: 1.5rem 0 !important;
            overflow-x: auto !important;
            box-shadow: inset 0 0 10px rgba(0,0,0,0.5), 0 4px 15px rgba(0,0,0,0.3) !important;

            /* JADIKAN PRE SEBAGAI PATOKAN UTAMA KIRI-KANAN */
            position: relative !important;
        }

        .question-content pre code {
            /* KUNCI UTAMA: Lepas patokan dari code agar nomor baris loncat ke pre! */
            position: static !important;
            display: block !important;
            padding: 0 !important;
            margin: 0 !important;
        }

        .question-content pre,
        .question-content pre code,
        .question-content pre code span {
            color: #D5CED9 !important;
            font-family: 'Consolas', 'Monaco', 'Courier New', monospace !important;
            font-size: 1.15rem !important;
            text-shadow: none !important;
            text-transform: none !important;
            line-height: 1.6 !important;
        }

        /* 2. STYLE KOTAK NOMOR BARIS (LINE NUMBERS) */
        .question-content pre .line-numbers-rows {
            position: absolute !important;

            /* Sekarang left: 0 benar-benar nempel di ujung kiri layar gelapnya! */
            top: 0 !important;
            left: 0 !important;
            bottom: 0 !important;

            /* Lebar kotak 3.5rem (masih ada jeda aman 1rem ke teks kode) */
            width: 3.5rem !important;

            /* Samakan dengan padding-top pre agar angkanya sejajar dengan baris kode */
            padding: 1.5rem 0 0 0 !important;
            margin: 0 !important;

            border-right: 2px solid #3B404A !important;
            background-color: #1E2128 !important;
            text-align: right !important;
            pointer-events: none !important;
        }

        .question-content pre .line-numbers-rows > span:before {
            color: #5C6370 !important;
            display: block !important;
            padding-right: 0.8rem !important;
        }

        /* 3. PEWARNAAN ANDROMEDA (C++ & PYTHON) */
        .token.keyword, .token.directive.keyword, .token.macro.keyword, .token.directive-hash {
            color: #C74DED !important; /* Ungu */
            font-style: italic !important;
        }
        .token.function, .token.class-name {
            color: #FFE66D !important; /* Kuning */
            font-style: italic !important;
        }
        .token.string, .token.char {
            color: #96E072 !important; /* Hijau */
        }
        .token.number, .token.boolean {
            color: #F39C12 !important; /* Orange */
        }
        .token.operator {
            color: #EE5D43 !important; /* Merah */
        }
        .token.punctuation, .token.std-teks {
            color: #D5CED9 !important; /* Putih Abu-abu */
        }
        .token.kurung {
            color: #FFE66D !important; /* Kuning */
        }
        .token.custom-var, .token.variable, .token.property, .token.constant, .token.builtin {
            color: #00E8C6 !important; /* Cyan */
        }
        .token.comment {
            color: #5C6370 !important; /* Abu-abu */
            font-style: italic !important;
        }

        /* 4. PEWARNAAN KHUSUS HTML */
        .token.tag {
            color: #EE5D43 !important; /* Nama tag merah */
        }
        .token.tag .token.punctuation {
            color: #D5CED9 !important; /* Kurung < dan > putih */
        }
        .token.attr-name {
            color: #FFE66D !important; /* Atribut kuning italic */
            font-style: italic !important;
        }
        .token.attr-value, .token.attr-value .token.punctuation {
            color: #96E072 !important; /* Isi atribut hijau */
        }

        /* Perlindungan ekstra agar teks biasa di dalam HTML (seperti "Kolom A") tidak membiru */
        code[class*="language-markup"] .token.custom-var,
        code[class*="language-html"] .token.custom-var {
            color: #D5CED9 !important;
        }

        /* ==========================================
           5. ANIMASI GAME (BAWAAN ASLI)
        ========================================== */
        .question-content p {
            margin-bottom: 0.5rem;
        }
        @keyframes hoverRobot {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-12px) rotate(2deg); }
        }
        @keyframes hoverVirus {
            0%, 100% { transform: translateY(0px) scale(1); }
            50% { transform: translateY(-15px) scale(1.02); }
        }
        @keyframes blink {
            0%, 90%, 100% { transform: scaleY(1); }
            95% { transform: scaleY(0.1); }
        }
        @keyframes antennaTwitch {
            0%, 100% { transform: rotate(0deg); }
            10%, 30% { transform: rotate(15deg); }
            20%, 40% { transform: rotate(-15deg); }
            50% { transform: rotate(0deg); }
        }
        @keyframes virusPulse {
            0%, 100% { filter: drop-shadow(0 0 5px red) brightness(1); transform: scale(1); }
            50% { filter: drop-shadow(0 0 15px red) brightness(1.3); transform: scale(1.1); }
        }
        @keyframes dynamicShadow {
            0%, 100% { transform: scale(1); opacity: 0.6; }
            50% { transform: scale(0.6); opacity: 0.2; }
        }
        .anim-robot-body { animation: hoverRobot 3s ease-in-out infinite; }
        .anim-virus-body { animation: hoverVirus 2.5s ease-in-out infinite; }
        .anim-blink { animation: blink 4s infinite; }
        .anim-antenna { animation: antennaTwitch 5s infinite; transform-origin: bottom center; }
        .anim-virus-eye { animation: virusPulse 1.5s infinite; }
        .anim-shadow-robot { animation: dynamicShadow 3s ease-in-out infinite; }
        .anim-shadow-virus { animation: dynamicShadow 2.5s ease-in-out infinite; }
        @keyframes moveClouds {
            from { background-position: 0 0; }
            to { background-position: 200px 0; }
        }
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-15px) rotate(-1deg); }
            75% { transform: translateX(15px) rotate(1deg); }
        }
        @keyframes hitFlash {
            0% { filter: brightness(1) drop-shadow(0 0 0 transparent); }
            50% { filter: brightness(4) drop-shadow(0 0 20px white); }
            100% { filter: brightness(1) drop-shadow(0 0 0 transparent); }
        }
        @keyframes victorySparkle {
            0% { filter: drop-shadow(0 0 5px #fbbf24) brightness(1); }
            50% { filter: drop-shadow(0 0 40px #fbbf24) brightness(1.5); }
            100% { filter: drop-shadow(0 0 5px #fbbf24) brightness(1); }
        }
        @keyframes victoryJump {
            0% { transform: translate(0, 0) scale(1) rotate(0deg); }
            15% { transform: translate(-3vw, 15px) scale(1.2, 0.8) rotate(-10deg); }
            40% { transform: translate(20vw, -150px) scale(1.4) rotate(360deg); }
            100% { transform: translate(45vw, 0px) scale(1.8) rotate(720deg); }
        }
        @keyframes enemyExplode {
            0% { transform: scale(1); filter: brightness(1); opacity: 1; }
            20% { transform: scale(1.8); filter: brightness(10) drop-shadow(0 0 50px white); opacity: 1; }
            100% { transform: scale(0); filter: brightness(0); opacity: 0; }
        }
        /* ANIMASI PARTIKEL KODE MELAYANG */
        @keyframes floatUp {
            0% { transform: translateY(100px) scale(0.5); opacity: 0; }
            20% { opacity: 0.6; }
            80% { opacity: 0.6; }
            100% { transform: translateY(-300px) scale(1.2); opacity: 0; }
        }
        @keyframes floatRandom {
            0%, 100% { transform: translate(0, 0); opacity: 0.3; }
            50% { transform: translate(10px, -20px); opacity: 0.6; }
        }
        /* 6. EFEK ARENA FOREST / ADVENTURE (SESUAI MAP) */
        /* Animasi Kunang-kunang / Serbuk Sari Hutan */
        @keyframes floatFirefly {
            0% { transform: translate(0, 0) scale(1); opacity: 0; }
            20% { opacity: 0.8; }
            50% { transform: translate(-20px, -30px) scale(1.2); }
            80% { opacity: 0.8; }
            100% { transform: translate(20px, -60px) scale(1); opacity: 0; }
        }
        .firefly {
            position: absolute;
            width: 6px; height: 6px;
            background-color: #D9F99D; /* Hijau muda bercahaya */
            border-radius: 50%;
            box-shadow: 0 0 10px 2px #A3E635;
            animation: floatFirefly 6s ease-in-out infinite;
            z-index: 5;
        }

        /* Animasi Semak-semak Bergoyang Tertiup Angin */
        @keyframes swayPlant {
            0%, 100% { transform: rotate(-3deg); }
            50% { transform: rotate(3deg); }
        }
        .bush {
            position: absolute;
            background: #065F46;
            border-radius: 50% 50% 0 0; /* Bentuk setengah lingkaran */
            box-shadow: inset -5px -5px 15px rgba(0,0,0,0.3);
            transform-origin: bottom center;
        }
        .bush-light {
            background: #10B981;
        }
        .cyber-particle { animation: floatRandom 5s ease-in-out infinite; }
        /* ==========================================
           7. EFEK PARTIKEL TEMA DINAMIS
        ========================================== */

        /* Tema Volcano: Percikan Api (Embers) Naik ke Atas */
        @keyframes floatEmber {
            0% { transform: translate(0, 0) scale(1); opacity: 1; }
            100% { transform: translate(20px, -100px) scale(0.5); opacity: 0; }
        }
        .ember {
            position: absolute;
            background: #F59E0B;
            border-radius: 50%;
            box-shadow: 0 0 10px 2px #EF4444;
            animation: floatEmber linear infinite;
            z-index: 5;
        }

        /* Tema Salju: Hujan Salju Jatuh */
        @keyframes fallSnow {
            0% { transform: translateY(-20px) rotate(0deg); opacity: 0; }
            20% { opacity: 1; }
            100% { transform: translateY(150px) rotate(360deg); opacity: 0.2; }
        }
        .snow {
            position: absolute;
            color: white;
            font-weight: bold;
            animation: fallSnow linear infinite;
            z-index: 5;
            text-shadow: 0 0 5px rgba(255,255,255,0.8);
        }

        /* Tema Sihir: Rune/Simbol Melayang */
        @keyframes floatRune {
            0%, 100% { transform: translateY(0) scale(1); opacity: 0.4; }
            50% { transform: translateY(-15px) scale(1.1); opacity: 0.8; }
        }
        .rune {
            position: absolute;
            color: #E879F9;
            font-weight: bold;
            animation: floatRune 4s ease-in-out infinite;
            z-index: 5;
            text-shadow: 0 0 10px #C026D3;
        }

        /* Efek pointer target pada karakter */
        #jumpHero, #bugEnemy { cursor: crosshair; }
        .anim-float-1 { animation: floatUp 8s linear infinite; }
        .anim-float-2 { animation: floatUp 12s linear infinite 2s; }
        .anim-float-3 { animation: floatUp 10s linear infinite 4s; }
        .anim-float-4 { animation: floatUp 15s linear infinite 1s; }

        /* INTERAKSI HOVER KARAKTER */
        #jumpHero, #bugEnemy { cursor: crosshair; transition: filter 0.2s; }
        #jumpHero:hover, #bugEnemy:hover { filter: brightness(1.2) drop-shadow(0 0 10px rgba(255,255,255,0.5)); }
        #jumpHero:active, #bugEnemy:active { transform: scale(0.9); }
        .animate-shake { animation: shake 0.3s ease-in-out; }
        .animate-hit { animation: hitFlash 0.3s ease-in-out; }
        .animate-victory { animation: victorySparkle 0.5s ease-in-out infinite; }
        .bg-clouds {
            background-image: radial-gradient(circle at 50% 50%, rgba(255,255,255,0.9) 10%, transparent 11%),
                              radial-gradient(circle at 30% 60%, rgba(255,255,255,0.7) 5%, transparent 6%);
            background-size: 150px 100px;
            animation: moveClouds 20s linear infinite;
        }
        .custom-scrollbar::-webkit-scrollbar { width: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: #f1f1f1; border-radius: 4px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
    </style>
</head>
<body class="bg-[#87CEEB] h-[100dvh] w-screen overflow-hidden flex flex-col relative font-[VT323] selection:bg-yellow-300 selection:text-black">
    <x-alert />

    <div id="statusModal" class="fixed inset-0 bg-black/70 z-[10000] flex items-center justify-center opacity-0 pointer-events-none transition-all duration-300 hidden backdrop-blur-sm">
    <div class="bg-[#1a1c24] border-4 border-gray-700 rounded-3xl p-6 md:p-10 w-[90%] max-w-xl text-center transform scale-90 transition-all duration-300 shadow-[0_0_60px_rgba(0,0,0,0.8)]">

        <h2 id="modalTitle" class="text-5xl md:text-7xl font-black tracking-tighter text-red-500 mb-4 animate-pulse" style="text-shadow: 0 0 15px rgba(239,68,68,0.5);">GAME OVER!</h2>

        <p class="text-gray-400 text-lg md:text-2xl mb-6 font-medium">Oh no! Kamu kehabisan nyawa.</p>

        <div class="bg-[#2a2e3a] border-2 border-gray-600 rounded-2xl p-5 md:p-8 text-left mb-8 relative overflow-hidden shadow-inner">
            <div class="absolute top-0 left-0 w-full h-full bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0IiBoZWlnaHQ9IjQiPjxyZWN0IHdpZHRoPSI0IiBoZWlnaHQ9IjQiIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSIvPjwvc3ZnPg==')] opacity-30"></div>
            <p class="text-[#fecaca] text-xl md:text-3xl font-mono leading-relaxed relative z-10">
                <span class="text-red-400 font-bold">&gt;&gt; ANALISIS SISTEM:</span><br>
                <span id="modalStatusText" class="break-words">Syntax Error! Sistem penilai cerdas sedang sibuk. Pastikan jawabanmu sama persis dengan aturan penulisan.</span>
            </p>
        </div>

        <button id="modalBtn" onclick="returnToMap()" class="w-full bg-[#ef4444] hover:bg-[#dc2626] text-white text-2xl md:text-4xl font-bold py-3 md:py-5 rounded-2xl transition-all duration-150 transform hover:scale-105 active:scale-95 shadow-[0_6px_0_0_#991b1b] active:shadow-[0_2px_0_0_#991b1b] active:translate-y-1">
            KEMBALI KE PETA
        </button>
    </div>
</div>

    <div class="h-12 md:h-16 lg:h-20 bg-white border-b-4 lg:border-b-8 border-gray-300 flex items-center justify-between px-3 md:px-6 z-20 shadow-md shrink-0">
        <a href="/map" class="text-gray-600 hover:text-red-500 text-base md:text-2xl lg:text-3xl tracking-widest font-bold transition-all hover:scale-105 cursor-pointer flex items-center gap-1 md:gap-2">
            <span class="bg-gray-200 px-2 py-0.5 md:px-3 md:py-1 rounded border-b-2 lg:border-b-4 border-gray-400 active:border-b-0 active:translate-y-1">ESC</span> <span class="hidden sm:inline">RUN</span>
        </a>
        <div class="flex items-center gap-2 md:gap-4">
            <div id="hpContainer" class="bg-red-50 border-2 lg:border-4 border-red-200 px-2 md:px-4 py-1 md:py-2 rounded-xl text-base md:text-xl lg:text-3xl flex gap-1 items-center shadow-inner transition-transform duration-300"></div>
            <div class="hidden sm:block bg-yellow-400 border-2 lg:border-4 border-yellow-600 px-3 md:px-5 py-1 rounded-xl text-yellow-900 font-bold text-sm md:text-lg lg:text-2xl tracking-widest shadow-[0_2px_0_0_#854d0e]">STAGE <span class="text-white drop-shadow-md text-base md:text-xl lg:text-3xl">{{ $level }}</span></div>
            <div class="bg-blue-400 border-2 lg:border-4 border-blue-600 px-3 md:px-5 py-1 rounded-xl text-white font-bold text-sm md:text-lg lg:text-2xl tracking-widest shadow-[0_2px_0_0_#1e3a8a] uppercase">{{ $language }}</div>
        </div>
    </div>

    @php        $raw_level = $question->level_id ?? $question->level ?? null;

        if (!$raw_level) {
            preg_match('/\d+/', request()->path(), $matches);
            $raw_level = $matches[0] ?? 1;
        }
        $current_level = (int) $raw_level;

        if ($current_level < 1) {
            $current_level = 1;
        }

        if ($current_level >= 1 && $current_level <= 7) {
            $theme = 'forest';
            $bg_gradient = 'from-[#6EE7B7] via-[#34D399] to-[#059669] border-[#064E3B]';
        } elseif ($current_level >= 8 && $current_level <= 12) {
            $theme = 'magic';
            $bg_gradient = 'from-[#2E1065] via-[#4C1D95] to-[#1E1B4B] border-[#0F172A]';
        } elseif ($current_level >= 13 && $current_level <= 16) {
            $theme = 'volcano';
            $bg_gradient = 'from-[#7F1D1D] via-[#B91C1C] to-[#450A0A] border-[#2E0505]';
        } else {
            $theme = 'snow';
            $bg_gradient = 'from-[#E0F2FE] via-[#BAE6FD] to-[#7DD3FC] border-[#0284C7]';
        }
    @endphp

    <div id="arenaView" class="h-[25vh] md:h-[30vh] lg:h-[40vh] min-h-[140px] shrink-0 bg-gradient-to-b {{ $bg_gradient }} relative overflow-hidden flex items-end border-b-[6px] md:border-b-[10px] transition-all duration-500">

        @if ($theme == 'forest')
            <div class="absolute inset-0 bg-clouds opacity-40 mix-blend-overlay z-0"></div>
            <div class="firefly top-[40%] left-[20%]" style="animation-duration: 5s;"></div>
            <div class="firefly top-[60%] left-[50%]" style="animation-duration: 7s;"></div>
            <div class="absolute bottom-4 -left-10 w-[45vw] h-20 bg-[#065F46] rounded-t-[100px] z-0"></div>
            <div class="bush bush-light w-16 h-12 bottom-4 left-[10%] z-10" style="animation: swayPlant 4s ease-in-out infinite;"></div>

        @elseif ($theme == 'magic')
            <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0IiBoZWlnaHQ9IjQiPjxyZWN0IHdpZHRoPSI0IiBoZWlnaHQ9IjQiIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSIvPjwvc3ZnPg==')] opacity-50 z-0"></div>
            <div class="rune text-2xl top-[20%] left-[30%]" style="animation-delay: 0s;">✧</div>
            <div class="rune text-3xl top-[40%] left-[60%]" style="animation-delay: 1s;">✦</div>
            <div class="rune text-xl top-[30%] right-[20%]" style="animation-delay: 2s;">★</div>
            <div class="absolute bottom-4 -left-10 w-[45vw] h-24 bg-[#3B0764] rounded-t-full border-t-2 border-[#D946EF] shadow-[0_-5px_15px_rgba(217,70,239,0.3)] z-0"></div>

        @elseif ($theme == 'volcano')
            <div class="absolute bottom-0 w-full h-1/2 bg-gradient-to-t from-[#DC2626] to-transparent opacity-30 z-0"></div>
            <div class="ember w-2 h-2 top-[50%] left-[25%]" style="animation-duration: 3s;"></div>
            <div class="ember w-3 h-3 top-[70%] left-[60%]" style="animation-duration: 4s;"></div>
            <div class="ember w-1.5 h-1.5 top-[60%] right-[30%]" style="animation-duration: 2.5s;"></div>
            <div class="absolute bottom-4 -left-10 w-[40vw] h-32 bg-[#1C1917] rounded-t-lg transform rotate-6 z-0 border-t-4 border-[#EF4444]"></div>

        @elseif ($theme == 'snow')
            <div class="absolute inset-0 bg-clouds opacity-70 z-0"></div>
            <div class="snow text-xl md:text-3xl top-[10%] left-[20%]" style="animation-duration: 4s;">❄</div>
            <div class="snow text-lg md:text-2xl top-[5%] left-[50%]" style="animation-duration: 6s; animation-delay: 1s;">❄</div>
            <div class="snow text-2xl md:text-4xl top-[15%] right-[25%]" style="animation-duration: 5s; animation-delay: 2s;">❄</div>
            <div class="absolute bottom-4 -left-10 w-[50vw] h-24 bg-white rounded-t-full shadow-[inset_0_-10px_20px_#BAE6FD] z-0"></div>
        @endif

        <div id="heroWrapper" class="absolute left-[5%] md:left-[15%] bottom-3 flex flex-col items-center z-20">
            <div id="jumpHero" onclick="this.classList.add('animate-shake'); setTimeout(() => this.classList.remove('animate-shake'), 300);" class="w-16 h-24 md:w-32 md:h-44 flex flex-col items-center justify-end anim-robot-body relative drop-shadow-2xl cursor-crosshair">
                <div class="flex flex-col items-center anim-antenna">
                    <div class="w-3.5 h-3.5 md:w-6 md:h-6 bg-yellow-400 rounded-full border-2 border-yellow-600 shadow-[0_0_10px_yellow] relative z-10 -mb-1"></div>
                    <div class="w-1.5 h-4 md:w-2 md:h-8 bg-gray-400 border-x-2 border-gray-600"></div>
                </div>
                <div class="w-16 h-14 md:w-32 md:h-28 bg-[#38BDF8] border-4 md:border-8 border-gray-800 rounded-xl relative shadow-inner flex flex-col items-center justify-center overflow-hidden z-20">
                    <div class="absolute top-0 -left-6 w-[200%] h-1/2 bg-white opacity-20 transform -rotate-12 pointer-events-none"></div>
                    <div class="flex gap-2.5 mb-1 z-10 anim-blink">
                        <div class="w-2.5 h-5 md:w-5 md:h-9 bg-white border-2 border-blue-900 rounded-sm"></div>
                        <div class="w-2.5 h-5 md:w-5 md:h-9 bg-white border-2 border-blue-900 rounded-sm"></div>
                    </div>
                </div>
                <div class="w-12 h-3 md:w-16 h-4 md:h-6 bg-gray-600 border-x-2 border-gray-800 z-10"></div>
                <div class="w-16 h-6 md:w-24 md:h-14 bg-gray-800 border-2 md:border-4 border-gray-900 rounded-b-lg flex items-center justify-between px-1 md:px-2 z-10">
                    <div class="w-2.5 h-4 md:w-4 md:h-8 bg-gray-400 rounded-full border border-gray-200"></div>
                    <div class="w-2.5 h-4 md:w-4 md:h-8 bg-gray-400 rounded-full border border-gray-200"></div>
                </div>
            </div>
            <div id="heroShadow" class="w-12 h-2 md:w-20 md:h-3 bg-black rounded-full mt-1.5 blur-[2px] anim-shadow-robot opacity-50"></div>
        </div>

        <div class="absolute bottom-10 md:bottom-20 left-1/2 transform -translate-x-1/2 text-4xl md:text-6xl text-white font-black italic drop-shadow-[0_5px_5px_rgba(0,0,0,0.5)] animate-bounce z-10" style="-webkit-text-stroke: 1px #000;">VS</div>

        <div id="enemyWrapper" class="absolute right-[5%] md:right-[15%] bottom-3 flex flex-col items-center z-20">
            <div id="bugEnemy" onclick="this.classList.add('animate-hit'); setTimeout(() => this.classList.remove('animate-hit'), 300);" class="cursor-crosshair anim-virus-body drop-shadow-2xl">

                @if ($theme == 'forest')
                    <div class="w-16 h-16 md:w-28 md:h-28 bg-[#A855F7] border-4 border-[#4C1D95] shadow-inner rounded-full flex flex-col items-center justify-center relative">
                        <div class="flex gap-2">
                            <div class="w-4 h-4 md:w-8 md:h-8 bg-yellow-300 rounded-full flex justify-center border-2 border-[#4C1D95]"><div class="w-2 h-2 bg-red-600 rounded-full mt-1 anim-virus-eye"></div></div>
                            <div class="w-4 h-4 md:w-8 md:h-8 bg-yellow-300 rounded-full flex justify-center border-2 border-[#4C1D95]"><div class="w-2 h-2 bg-red-600 rounded-full mt-1 anim-virus-eye"></div></div>
                        </div>
                        <div class="w-8 h-3 bg-black rounded-b-full mt-2 relative border-t-2 border-[#4C1D95] overflow-hidden">
                            <div class="absolute bottom-0 w-full h-1 bg-red-600"></div>
                        </div>
                    </div>

                @elseif ($theme == 'magic')
                    <div class="w-16 h-16 md:w-28 md:h-28 bg-[#1E1B4B] border-4 border-[#C026D3] shadow-[0_0_30px_#C026D3] rounded-full flex flex-col items-center justify-center relative animate-pulse">
                        <div class="w-6 h-6 md:w-12 md:h-12 bg-red-600 rounded-full flex justify-center items-center shadow-inner border-2 border-black">
                            <div class="w-2 h-4 md:w-3 md:h-8 bg-black rounded-full"></div> </div>
                    </div>

                @elseif ($theme == 'volcano')
                    <div class="w-20 h-16 md:w-32 md:h-28 bg-[#EF4444] border-4 border-[#7F1D1D] rounded-t-[50px] rounded-b-xl flex flex-col items-center justify-center relative shadow-[inset_0_-10px_0_#991B1B]">
                        <div class="flex gap-3 mb-2">
                            <div class="w-4 h-4 md:w-6 md:h-6 bg-yellow-400 rounded-full transform -rotate-12 border-b-2 border-black"></div>
                            <div class="w-4 h-4 md:w-6 md:h-6 bg-yellow-400 rounded-full transform rotate-12 border-b-2 border-black"></div>
                        </div>
                        <div class="w-10 h-3 bg-[#7F1D1D] rounded-full"></div>
                    </div>

                @elseif ($theme == 'snow')
                    <div class="w-16 h-16 md:w-28 md:h-28 bg-[#BAE6FD] border-4 border-[#0284C7] rounded-xl flex flex-col items-center justify-center relative shadow-[inset_0_0_15px_#ffffff]">
                        <div class="absolute -top-3 left-2 w-4 h-6 bg-[#7DD3FC] transform -rotate-45 border-2 border-[#0284C7] rounded-t-md"></div>
                        <div class="absolute -top-3 right-2 w-4 h-6 bg-[#7DD3FC] transform rotate-45 border-2 border-[#0284C7] rounded-t-md"></div>
                        <div class="flex gap-2">
                            <div class="w-5 h-3 md:w-8 md:h-4 bg-[#0369A1] rounded-sm transform rotate-12"></div>
                            <div class="w-5 h-3 md:w-8 md:h-4 bg-[#0369A1] rounded-sm transform -rotate-12"></div>
                        </div>
                    </div>
                @endif
            </div>
            <div id="enemyShadow" class="w-12 h-2 md:w-20 md:h-3 bg-black rounded-full mt-2 md:mt-3 blur-[2px] anim-shadow-virus opacity-50"></div>
        </div>

        @php
            if ($theme == 'forest') $ground = 'bg-[#166534] border-[#4ADE80]';
            elseif ($theme == 'magic') $ground = 'bg-[#1E1B4B] border-[#C026D3]';
            elseif ($theme == 'volcano') $ground = 'bg-[#450A0A] border-[#DC2626]';
            else $ground = 'bg-[#E0F2FE] border-[#bae6fd]'; // salju
        @endphp
        <div class="absolute bottom-0 left-0 w-full h-4 md:h-6 {{ $ground }} border-t-4 z-20 shadow-[inset_0_-2px_5px_rgba(0,0,0,0.3)]"></div>
    </div>

    <div class="flex-1 bg-[#FFFBEB] border-t-4 border-[#FDE047] p-3 sm:p-5 lg:p-8 flex flex-col lg:flex-row gap-4 lg:gap-6 overflow-hidden relative shadow-[inset_0_10px_20px_rgba(0,0,0,0.05)] min-h-0">
        <div class="h-[35%] lg:h-auto lg:w-[45%] bg-white border-2 sm:border-4 border-blue-400 rounded-2xl lg:rounded-3xl p-4 sm:p-6 lg:p-8 relative flex flex-col min-h-[90px]">
            <span class="absolute -top-4 sm:-top-5 left-4 sm:left-6 bg-blue-500 text-white px-3 py-1 sm:px-5 sm:py-1.5 text-sm sm:text-lg md:text-2xl font-bold rounded-full border-2 border-white transform -rotate-2 z-10">? MISSION</span>
            <div class="mt-2 sm:mt-4 flex-1 overflow-y-auto pr-2 custom-scrollbar block">

                @php
                    $raw_text = $question->question_text;

                    $parts = preg_split('/(```[\s\S]*?```)/', $raw_text, -1, PREG_SPLIT_DELIM_CAPTURE);

                    $teks_instruksi = trim($parts[0] ?? '');
                    $blok_kode_markdown = trim($parts[1] ?? '');

                    $teks_instruksi = str_replace(['\n', '\\n'], " ", $teks_instruksi);

                    $blok_kode_markdown = str_ireplace(['\n', '\\n'], "\n", $blok_kode_markdown);
                    $blok_kode_markdown = str_ireplace('```c++', '```cpp', $blok_kode_markdown);
                    $blok_kode_markdown = str_ireplace('```python3', '```python', $blok_kode_markdown);

                    $html_kode = Str::markdown($blok_kode_markdown);

                    $char_count = strlen($teks_instruksi);
                    if ($char_count > 200) $font_size = "text-lg md:text-xl";
                    elseif ($char_count > 100) $font_size = "text-xl md:text-2xl";
                    else $font_size = "text-2xl md:text-4xl";
                @endphp

                <div class="mt-2 sm:mt-4 flex flex-col h-full overflow-hidden">
                    <div class="shrink-0 mb-3 border-b-2 border-dashed border-blue-100 pb-2">
                        <h3 class="{{ $font_size }} text-gray-800 font-bold leading-tight">
                            {{ $teks_instruksi }}
                        </h3>
                    </div>

                    <div class="flex-1 overflow-y-auto pr-2 custom-scrollbar">
                        <div class="question-content w-full">
                            {!! $html_kode !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="flex-1 lg:w-[55%] bg-white border-2 sm:border-4 border-green-400 rounded-2xl lg:rounded-3xl p-3 sm:p-5 lg:p-6 relative shadow-[4px_4px_0_0_#86EFAC] flex flex-col min-h-0">
            <span class="absolute -top-4 sm:-top-5 left-4 sm:left-6 bg-green-500 text-white px-3 py-1 sm:px-5 sm:py-1.5 text-sm sm:text-lg md:text-2xl font-bold rounded-full border-2 border-white shadow-sm transform rotate-2 z-10">! ACTION</span>
            <div class="flex-1 flex flex-col justify-start mt-3 lg:mt-4 min-h-0">
                @if($question->options && count($question->options) > 0)
                <div class="overflow-y-auto custom-scrollbar h-full w-full pr-2">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4 lg:gap-5 w-full h-full content-start md:content-center">
                        @foreach($question->options as $index => $opsi)
                        <label class="flex items-center p-3 sm:p-4 lg:p-6 border-2 sm:border-4 border-gray-200 bg-gray-50 hover:bg-blue-50 hover:border-blue-400 hover:shadow-md cursor-pointer group rounded-xl lg:rounded-2xl transition-all duration-200 transform active:scale-[0.98] has-[:checked]:bg-green-50 has-[:checked]:border-green-500 has-[:checked]:shadow-lg min-h-[60px] md:min-h-[80px]">
                            <input type="radio" name="jawaban" value="{{ $index }}" class="hidden peer">
                            <div class="w-5 h-5 sm:w-6 sm:h-6 md:w-8 md:h-8 border-2 sm:border-4 border-gray-400 peer-checked:bg-green-500 peer-checked:border-green-600 flex items-center justify-center mr-3 md:mr-4 flex-shrink-0 rounded-full transition-all relative"><div class="w-2 h-2 md:w-3 md:h-3 bg-white rounded-full opacity-0 peer-checked:opacity-100 transform scale-0 peer-checked:scale-100 transition-transform"></div></div>
                            <span class="text-base sm:text-xl md:text-2xl lg:text-3xl text-gray-700 font-bold tracking-wide group-hover:text-blue-700 peer-checked:text-green-700 leading-tight break-words">{{ $opsi }}</span>
                        </label>
                        @endforeach
                    </div>
                </div>
                @else
                <div class="flex flex-col items-center justify-center h-full p-2">
                    <div class="flex items-center w-full bg-gray-900 border-2 sm:border-4 border-gray-700 focus-within:border-green-400 focus-within:shadow-[0_0_15px_rgba(74,222,128,0.4)] transition-all duration-300 p-4 sm:p-6 lg:p-8 rounded-xl lg:rounded-2xl shadow-inner relative overflow-hidden group">
                        <span class="text-green-400 text-2xl sm:text-4xl lg:text-5xl mr-3 animate-pulse">>_</span>
                        <input type="text" id="inputKode" class="bg-transparent border-none text-green-300 text-lg sm:text-2xl md:text-3xl lg:text-4xl w-full focus:outline-none font-mono placeholder-gray-600 relative z-10" placeholder="Ketik kode..." autocomplete="off" spellcheck="false" autofocus>
                    </div>
                </div>
                @endif
            </div>
            <button onclick="lockAnswer()" class="mt-3 sm:mt-5 shrink-0 w-full bg-green-500 hover:bg-green-400 border-2 sm:border-4 border-green-700 text-white text-xl sm:text-2xl md:text-3xl lg:text-4xl py-2 sm:py-3 rounded-full shadow-[0_4px_0_0_#15803D] sm:shadow-[0_6px_0_0_#15803D] active:translate-y-[4px] sm:active:translate-y-[6px] active:shadow-none transition-all tracking-widest font-bold cursor-pointer">EXECUTE!</button>
        </div>
    </div>

    <script>
        const kunciJawaban = "{{ $question->correct_answer }}";
        const currentLevel = parseInt("{{ $level }}");
        const selectedLang = "{{ $language }}";
        const isInputMode = {{ empty($question->options) ? 'true' : 'false' }};
        const penjelasanSoal = @json($question->penjelasan);
        const hpKey = `jumpjump_hp_${selectedLang}`;
        const maxHp = 3;
        let currentHp = parseInt(localStorage.getItem(hpKey));
        if (isNaN(currentHp)) {
            currentHp = maxHp;
            localStorage.setItem(hpKey, currentHp);
        }
        function renderHp() {
            const hpContainer = document.getElementById('hpContainer');
            let hearts = "";
            for (let i = 0; i < maxHp; i++) {
                if (i < currentHp) {
                    const pulseClass = (currentHp === 1) ? 'animate-pulse scale-110' : 'scale-100';
                    hearts += `<span class="text-red-500 drop-shadow-sm transform ${pulseClass} cursor-default">❤️</span>`;
                } else {
                    hearts += `<span class="text-gray-300 opacity-40 grayscale transform scale-90">💔</span>`;
                }
            }
            hpContainer.innerHTML = hearts;
        }
        renderHp();

        function lockAnswer() {
            let jawabanPemain = "";
            if (isInputMode) {
                const inputElem = document.getElementById('inputKode');
                if (!inputElem || inputElem.value.trim() === "") {
                    return window.showCustomAlert("Hei, terminalnya jangan dikosongin!", "warning", 3000);
                }
                jawabanPemain = inputElem.value.trim();
            } else {
                const selectedOption = document.querySelector('input[name="jawaban"]:checked');
                if (!selectedOption) {
                    return window.showCustomAlert("Pilih aksinya dulu dong!", "warning", 3000);
                }
                jawabanPemain = selectedOption.value;
            }

            const hero = document.getElementById('jumpHero');
            const enemy = document.getElementById('bugEnemy');
            const heroShadow = document.getElementById('heroShadow');
            const enemyShadow = document.getElementById('enemyShadow');
            const arenaView = document.getElementById('arenaView');
            const heroWrapper = document.getElementById('heroWrapper');
            const enemyWrapper = document.getElementById('enemyWrapper');

            // Persiapan elemen Modal
            const modal = document.getElementById('statusModal');
            const modalTitle = document.getElementById('modalTitle');
            const modalText = document.getElementById('modalStatusText');
            const modalBtn = document.getElementById('modalBtn');
            const modalDesc = modal.querySelector('p'); // Paragraf deskripsi kecil

            // Tampilkan notifikasi loading analisis
            window.showCustomAlert("AI sedang menganalisis kode...", "info", 2000);

            // Kirim jawaban ke Backend
            fetch('/submit-answer', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    question_id: "{{ $question->id }}",
                    user_answer: jawabanPemain
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.is_correct) {
                    // --- SKENARIO: JAWABAN BENAR ---
                    hero.classList.remove('anim-robot-body');
                    heroShadow.classList.remove('anim-shadow-robot');
                    hero.classList.add('animate-victory');
                    heroWrapper.style.animation = "victoryJump 0.8s cubic-bezier(0.25, 1, 0.5, 1) forwards";
                    setTimeout(() => {
                        enemy.classList.remove('anim-virus-body');
                        enemy.style.animation = "enemyExplode 0.4s ease-out forwards";
                        enemyShadow.style.opacity = "0";
                    }, 550);

                    // Update Level Terbuka di Storage
                    const currentLang = localStorage.getItem('jumpjump_language') || selectedLang;
                    const storageKey = `jumpjump_highest_level_${currentLang.toUpperCase()}`;
                    let highestLevel = parseInt(localStorage.getItem(storageKey)) || 1;
                    if (currentLevel >= highestLevel) {
                        localStorage.setItem(storageKey, currentLevel + 1);
                    }

                    // TAMPILKAN MODAL TEMA MENANG (SETELAH ANIMASI)
                    setTimeout(() => {
                        // Konfigurasi Modal Jadi Tema Sukses
                        modalTitle.innerText = "STAGE CLEAR!";
                        modalTitle.className = "text-5xl md:text-7xl font-black tracking-tighter text-green-400 mb-4 animate-pulse";
                        modalTitle.style.textShadow = "0 0 15px rgba(74,222,128,0.5)";

                        modalDesc.innerText = "Luar biasa! Bug berhasil dimusnahkan.";
                        modalText.innerText = data.feedback; // Penjelasan dari AI
                        modalText.parentElement.classList.replace('text-[#fecaca]', 'text-[#bbf7d0]');
                        modalText.parentElement.querySelector('span').classList.replace('text-red-400', 'text-green-400');

                        modalBtn.innerText = "LANJUT KE PETA";
                        modalBtn.className = "w-full bg-[#16a34a] hover:bg-[#15803d] text-white text-2xl md:text-4xl font-bold py-3 md:py-5 rounded-2xl transition-all duration-150 transform hover:scale-105 active:scale-95 shadow-[0_6px_0_0_#14532d] active:shadow-[0_2px_0_0_#14532d] active:translate-y-1";

                        // Munculkan Modal
                        modal.classList.remove('hidden');
                        setTimeout(() => {
                            modal.classList.remove('opacity-0', 'pointer-events-none');
                            modal.children[0].classList.replace('scale-90', 'scale-100');
                        }, 50);
                    }, 1200);

                } else {
                    // --- SKENARIO: JAWABAN SALAH ---
                    // ... (Animasi kalah tetap sama) ...
                    enemy.classList.remove('anim-virus-body');
                    enemyWrapper.style.transition = "all 0.2s ease-in";
                    enemyWrapper.style.transform = "translateX(-60vw) scale(1.3)";
                    setTimeout(() => {
                        hero.classList.add('animate-hit');
                        arenaView.classList.add('animate-shake');
                        setTimeout(() => {
                            hero.classList.remove('animate-hit');
                            arenaView.classList.remove('animate-shake');
                            enemyWrapper.style.transform = "translateX(0) scale(1)";
                            setTimeout(() => { enemy.classList.add('anim-virus-body'); }, 300);
                        }, 300);
                    }, 200);

                    currentHp--;
                    localStorage.setItem(hpKey, currentHp);
                    renderHp();

                    if (currentHp <= 0) {
                        // TAMPILKAN MODAL TEMA KALAH TOTAL (GAME OVER)
                        // Konfigurasi Modal Jadi Tema Merah (Bawaan awal)
                        modalTitle.innerText = "GAME OVER!";
                        modalTitle.className = "text-5xl md:text-7xl font-black tracking-tighter text-red-500 mb-4 animate-pulse";
                        modalTitle.style.textShadow = "0 0 15px rgba(239,68,68,0.5)";

                        modalDesc.innerText = "Oh no! Kamu kehabisan nyawa.";
                        modalText.innerText = "Syntax Error! " + data.feedback; // Umpan balik AI/DB

                        modalBtn.innerText = "KEMBALI KE PETA";
                        modalBtn.className = "w-full bg-[#ef4444] hover:bg-[#dc2626] text-white text-2xl md:text-4xl font-bold py-3 md:py-5 rounded-2xl transition-all duration-150 transform hover:scale-105 active:scale-95 shadow-[0_6px_0_0_#991b1b] active:shadow-[0_2px_0_0_#991b1b] active:translate-y-1";

                        // Munculkan Modal
                        modal.classList.remove('hidden');
                        setTimeout(() => {
                            modal.classList.remove('opacity-0', 'pointer-events-none');
                            modal.children[0].classList.replace('scale-90', 'scale-100');
                        }, 50);
                        localStorage.removeItem(hpKey);
                    } else {
                        const hpDiv = document.getElementById('hpContainer');
                        hpDiv.classList.add('scale-105', 'border-red-500');
                        setTimeout(() => hpDiv.classList.remove('scale-105', 'border-red-500'), 300);

                        // Alert merah biasa (untuk nyawa belum habis)
                        window.showCustomAlert(`OUCH! ${data.feedback} Sisa Nyawa: ${currentHp}`, "error", 6000);
                    }
                }
            })
            .catch(error => {
                console.error('Error:', error);
                window.showCustomAlert('Koneksi terputus! Gagal menghubungi server.', 'error', 3000);
            });
        }
        function returnToMap() {
            window.location.href = '/map';
        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/line-numbers/prism-line-numbers.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const langMap = { 'C++': 'cpp', 'PYTHON': 'python', 'HTML': 'markup' };
            let selectedLangKey = selectedLang ? selectedLang.toUpperCase() : '';
            let defaultLangClass = langMap[selectedLangKey] || selectedLang.toLowerCase();

            document.querySelectorAll('.question-content pre').forEach((pre) => {
                pre.classList.add('line-numbers');

                let codeBlock = pre.querySelector('code');
                if (codeBlock && !codeBlock.className.includes('language-')) {
                    codeBlock.classList.add('language-' + defaultLangClass);
                }
            });

            if (typeof Prism !== 'undefined') {
                Prism.hooks.add('before-tokenize', function(env) {

                    if (env.language === 'cpp' || env.language === 'python') {
                        if (Prism.languages[env.language] && !Prism.languages[env.language].kurung) {

                            if (env.language === 'cpp') {
                                Prism.languages.insertBefore('cpp', 'keyword', {
                                    'std-teks': /\bstd\b/
                                });
                            }

                            Prism.languages.insertBefore(env.language, 'punctuation', {
                                'kurung': /[{}[\]()]/,
                                'custom-var': /\b[a-zA-Z_]\w*\b/
                            });
                        }
                    }
                });

                Prism.highlightAll();
            }
        });
    </script>
</body>
</html>
