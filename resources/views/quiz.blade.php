<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Stage {{ $level }} - JUMPJUMP.CODE</title>
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/line-numbers/prism-line-numbers.min.css" rel="stylesheet" />

    <style>
        /* ==========================================
           1. PENGATURAN FONT & SINTAKS (RESPONSIF)
        ========================================== */
        .question-content pre,
        .question-content pre code,
        .question-content pre code span {
            color: #D5CED9 !important;
            font-family: 'Consolas', 'Monaco', 'Courier New', monospace !important;
            text-shadow: none !important;
            text-transform: none !important;
            line-height: 1.6 !important;
        }

        .question-content pre,
        .question-content pre code { font-size: 13px !important; }

        @media (min-width: 768px) {
            .question-content pre,
            .question-content pre code { font-size: 15px !important; }
        }

        /* ==========================================
           2. BASE LAYOUT KOTAK KODE (PRISMJS)
        ========================================== */
        .question-content pre {
            background-color: #23262E !important;
            border: 3px solid #5C6370 !important;
            border-radius: 10px !important;
            padding: 1.5rem 1.5rem 1.5rem 4.5rem !important;
            margin: 1.5rem 0 !important;
            overflow-x: auto !important;
            box-shadow: inset 0 0 10px rgba(0,0,0,0.5), 0 4px 15px rgba(0,0,0,0.3) !important;
            position: relative !important;
        }

        .question-content pre code {
            position: static !important; display: block !important;
            padding: 0 !important; margin: 0 !important;
        }

        .question-content pre .line-numbers-rows {
            position: absolute !important; top: 0 !important; left: 0 !important; bottom: 0 !important;
            width: 3.5rem !important; padding: 1.5rem 0 0 0 !important; margin: 0 !important;
            border-right: 2px solid #3B404A !important; background-color: #1E2128 !important;
            text-align: right !important; pointer-events: none !important;
        }

        .question-content pre .line-numbers-rows > span:before {
            color: #5C6370 !important; display: block !important; padding-right: 0.8rem !important;
        }

        /* Pewarnaan Andromeda C++ & Python & HTML */
        .token.keyword, .token.directive.keyword, .token.macro.keyword, .token.directive-hash { color: #C74DED !important; font-style: italic !important; }
        .token.function, .token.class-name { color: #FFE66D !important; font-style: italic !important; }
        .token.string, .token.char, .token.attr-value, .token.attr-value .token.punctuation { color: #96E072 !important; }
        .token.number, .token.boolean { color: #F39C12 !important; }
        .token.operator, .token.tag { color: #EE5D43 !important; }
        .token.punctuation, .token.std-teks, .token.tag .token.punctuation { color: #D5CED9 !important; }
        .token.kurung { color: #FFE66D !important; }
        .token.custom-var, .token.variable, .token.property, .token.constant, .token.builtin { color: #00E8C6 !important; }
        .token.comment { color: #5C6370 !important; font-style: italic !important; }
        .token.attr-name { color: #FFE66D !important; font-style: italic !important; }
        code[class*="language-markup"] .token.custom-var, code[class*="language-html"] .token.custom-var { color: #D5CED9 !important; }

        /* ==========================================
           3. ANIMASI GAME (HERO & EFEK UMUM)
        ========================================== */
        .question-content p { margin-bottom: 0.5rem; }
        @keyframes hoverRobot { 0%, 100% { transform: translateY(0px) rotate(0deg); } 50% { transform: translateY(-12px) rotate(2deg); } }
        @keyframes hoverVirus { 0%, 100% { transform: translateY(0px) scale(1); } 50% { transform: translateY(-10px) scale(1.02); } }
        @keyframes blink { 0%, 90%, 100% { transform: scaleY(1); } 95% { transform: scaleY(0.1); } }
        @keyframes antennaTwitch { 0%, 100% { transform: rotate(0deg); } 10%, 30% { transform: rotate(15deg); } 20%, 40% { transform: rotate(-15deg); } 50% { transform: rotate(0deg); } }
        @keyframes virusPulse { 0%, 100% { filter: drop-shadow(0 0 5px red) brightness(1); transform: scale(1); } 50% { filter: drop-shadow(0 0 15px red) brightness(1.3); transform: scale(1.1); } }
        @keyframes dynamicShadow { 0%, 100% { transform: scale(1); opacity: 0.6; } 50% { transform: scale(0.6); opacity: 0.2; } }

        .anim-robot-body { animation: hoverRobot 3s ease-in-out infinite; }
        .anim-virus-body { animation: hoverVirus 2.5s ease-in-out infinite; }
        .anim-blink { animation: blink 4s infinite; }
        .anim-antenna { animation: antennaTwitch 5s infinite; transform-origin: bottom center; }
        .anim-virus-eye { animation: virusPulse 1.5s infinite; }
        .anim-shadow-robot { animation: dynamicShadow 3s ease-in-out infinite; }
        .anim-shadow-virus { animation: dynamicShadow 2.5s ease-in-out infinite; }

        @keyframes shake { 0%, 100% { transform: translateX(0); } 25% { transform: translateX(-15px) rotate(-1deg); } 75% { transform: translateX(15px) rotate(1deg); } }
        @keyframes hitFlash { 0% { filter: brightness(1) drop-shadow(0 0 0 transparent); } 50% { filter: brightness(4) drop-shadow(0 0 20px white); } 100% { filter: brightness(1) drop-shadow(0 0 0 transparent); } }
        @keyframes victorySparkle { 0% { filter: drop-shadow(0 0 5px #fbbf24) brightness(1); } 50% { filter: drop-shadow(0 0 40px #fbbf24) brightness(1.5); } 100% { filter: drop-shadow(0 0 5px #fbbf24) brightness(1); } }
        @keyframes victoryJump { 0% { transform: translate(0, 0) scale(1) rotate(0deg); } 15% { transform: translate(-3vw, 15px) scale(1.2, 0.8) rotate(-10deg); } 40% { transform: translate(20vw, -150px) scale(1.4) rotate(360deg); } 100% { transform: translate(45vw, 0px) scale(1.8) rotate(720deg); } }
        @keyframes enemyExplode { 0% { transform: scale(1); filter: brightness(1); opacity: 1; } 20% { transform: scale(1.8); filter: brightness(10) drop-shadow(0 0 50px white); opacity: 1; } 100% { transform: scale(0); filter: brightness(0); opacity: 0; } }

        #jumpHero, #bugEnemy { cursor: crosshair; transition: filter 0.2s; }
        #jumpHero:hover, #bugEnemy:hover { filter: brightness(1.2) drop-shadow(0 0 10px rgba(255,255,255,0.5)); }
        #jumpHero:active, #bugEnemy:active { transform: scale(0.9); }
        .animate-shake { animation: shake 0.3s ease-in-out; }
        .animate-hit { animation: hitFlash 0.3s ease-in-out; }
        .animate-victory { animation: victorySparkle 0.5s ease-in-out infinite; }

        /* ==========================================
           4. GAYA SERANG MUSUH (BERDASARKAN TEMA)
        ========================================== */
        @keyframes attackForest { 0% { transform: translateX(0) rotate(0); } 100% { transform: translateX(-60vw) rotate(-720deg) scale(1.2); } }
        @keyframes attackDesert { 0% { transform: translateX(0) translateY(0); opacity: 1;} 20% { transform: translateX(0) translateY(80px); opacity: 0; } 70% { transform: translateX(-60vw) translateY(80px); opacity: 0; } 100% { transform: translateX(-60vw) translateY(0) scale(1.3); opacity: 1; } }
        @keyframes attackSwamp { 0% { transform: translate(0, 0) scale(1); } 50% { transform: translate(-30vw, -150px) scale(1.5); } 100% { transform: translate(-60vw, 0) scale(1.3); } }
        @keyframes attackRocky { 0% { transform: translateX(0); } 30% { transform: translateX(10vw) scale(1.1); } 100% { transform: translateX(-60vw) scale(1.4); } }
        @keyframes attackVolcano { 0% { transform: translateX(0) scale(1); filter: brightness(1); } 50% { filter: brightness(2) drop-shadow(0 0 20px red); } 100% { transform: translateX(-60vw) scale(1.5); filter: brightness(3) drop-shadow(0 0 40px red); } }
        @keyframes attackSnow { 0% { transform: translateX(0) skewX(0); } 100% { transform: translateX(-60vw) skewX(-30deg) scale(1.2); } }

        /* Scrollbar */
        .custom-scrollbar::-webkit-scrollbar { width: 6px; height: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: #f1f1f1; border-radius: 4px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
    </style>
</head>

<body class="bg-[#111827] h-[100dvh] w-screen overflow-hidden flex flex-col relative font-[VT323] selection:bg-yellow-300 selection:text-black">
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

    @php
        $raw_level = $question->level_id ?? $question->level ?? null;
        if (!$raw_level) {
            preg_match('/\d+/', request()->path(), $matches);
            $raw_level = $matches[0] ?? 1;
        }
        $current_level = (int) $raw_level;
        if ($current_level < 1) $current_level = 1;

        // PEMBAGIAN 6 TEMA (Tiap 4 Level Ganti Suasana & Musuh)
        if ($current_level >= 1 && $current_level <= 4) { $theme = 'forest'; }
        elseif ($current_level >= 5 && $current_level <= 8) { $theme = 'desert'; }
        elseif ($current_level >= 9 && $current_level <= 12) { $theme = 'swamp'; }
        elseif ($current_level >= 13 && $current_level <= 16) { $theme = 'rocky'; }
        elseif ($current_level >= 17 && $current_level <= 20) { $theme = 'volcano'; }
        else { $theme = 'snow'; } // Level 21+
    @endphp

    <div class="absolute top-0 left-0 w-full h-14 md:h-16 lg:h-20 bg-gradient-to-b from-black/70 via-black/30 to-transparent flex items-center justify-between px-3 md:px-6 z-50 pointer-events-none">
        <a href="/map" class="pointer-events-auto text-white/80 hover:text-white text-sm md:text-lg lg:text-xl tracking-widest font-bold transition-all hover:scale-105 cursor-pointer flex items-center gap-1 md:gap-2 drop-shadow-md">
            <span class="bg-black/40 px-2 md:px-2.5 py-0.5 rounded border-b-2 border-white/30 active:border-b-0 active:translate-y-[2px] backdrop-blur-sm">ESC</span> <span class="hidden sm:inline">RUN</span>
        </a>
        <div class="pointer-events-auto flex items-center gap-2 md:gap-3 lg:gap-4">
            <div id="hpContainer" class="bg-black/40 backdrop-blur-sm border border-red-500/40 px-2 md:px-3 py-1 rounded-xl text-sm md:text-base lg:text-lg flex gap-1 items-center shadow-inner transition-transform duration-300"></div>
            <div class="hidden sm:flex items-center gap-1.5 bg-black/40 backdrop-blur-sm border border-yellow-500/50 px-3 md:px-4 py-1 md:py-1.5 rounded-xl text-yellow-400 font-bold text-xs md:text-sm lg:text-base tracking-widest">
                STAGE <span class="text-white drop-shadow-md text-sm md:text-base lg:text-lg">{{ $level }}</span>
            </div>
            <div class="bg-black/40 backdrop-blur-sm border border-blue-400/50 px-3 md:px-4 py-1 md:py-1.5 rounded-xl text-blue-300 font-bold text-xs md:text-sm lg:text-base tracking-widest uppercase">
                {{ $language }}
            </div>
        </div>
    </div>

    <div id="arenaView"
         class="w-full h-[40vh] min-h-[140px] shrink-0 relative overflow-hidden flex items-end transition-all duration-500 bg-cover bg-center border-b-4 border-[#FDE047]"
         style="background-image: url('{{ asset('images/bg-' . $theme . '.png') }}'); box-shadow: inset 0 -20px 30px rgba(0,0,0,0.5);">

        <div id="heroWrapper" class="absolute left-[5%] md:left-[15%] bottom-4 md:bottom-8 flex flex-col items-center z-20 origin-bottom transform scale-[0.7] md:scale-[0.85] lg:scale-100 transition-transform">
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
            <div id="heroShadow" class="w-12 h-2 md:w-20 md:h-3 bg-black/60 rounded-full mt-1.5 blur-[2px] anim-shadow-robot opacity-50"></div>
        </div>

        <div class="absolute bottom-10 md:bottom-16 left-1/2 transform -translate-x-1/2 text-4xl md:text-5xl lg:text-6xl text-white font-black italic drop-shadow-[0_5px_5px_rgba(0,0,0,0.8)] animate-bounce z-10" style="-webkit-text-stroke: 1px #000;">VS</div>

        <div id="enemyWrapper" class="absolute right-[5%] md:right-[15%] bottom-4 md:bottom-8 flex flex-col items-center z-20 origin-bottom transform scale-[0.7] md:scale-[0.85] lg:scale-100 transition-transform">
            <div id="bugEnemy" onclick="this.classList.add('animate-hit'); setTimeout(() => this.classList.remove('animate-hit'), 300);" class="cursor-crosshair anim-virus-body drop-shadow-2xl">

                @if ($theme == 'forest')
                    <div class="w-16 h-16 md:w-24 md:h-24 bg-[#166534] border-4 border-[#064E3B] rounded-full flex flex-col items-center justify-center relative shadow-[inset_0_0_15px_#4ADE80]">
                        <div class="absolute -top-3 w-0 h-0 border-l-[10px] border-r-[10px] border-b-[15px] border-l-transparent border-r-transparent border-b-[#064E3B]"></div>
                        <div class="absolute -left-3 top-8 w-0 h-0 border-t-[10px] border-b-[10px] border-r-[15px] border-t-transparent border-b-transparent border-r-[#064E3B]"></div>
                        <div class="absolute -right-3 top-8 w-0 h-0 border-t-[10px] border-b-[10px] border-l-[15px] border-t-transparent border-b-transparent border-l-[#064E3B]"></div>
                        <div class="flex gap-2 z-10"><div class="w-4 h-4 bg-yellow-400 rounded-full anim-virus-eye"></div><div class="w-4 h-4 bg-yellow-400 rounded-full anim-virus-eye"></div></div>
                        <div class="w-8 h-2 bg-black rounded-full mt-2"></div>
                    </div>
                @elseif ($theme == 'desert')
                    <div class="w-16 h-16 md:w-24 md:h-24 relative flex items-center justify-center">
                        <div class="absolute inset-0 bg-[#B45309] border-4 border-[#78350F] transform rotate-45 shadow-[inset_0_0_15px_#F59E0B] rounded-sm"></div>
                        <div class="absolute -top-4 -left-2 w-6 h-6 bg-[#92400E] border-2 border-[#78350F] rounded-full"></div>
                        <div class="absolute -top-4 -right-2 w-6 h-6 bg-[#92400E] border-2 border-[#78350F] rounded-full"></div>
                        <div class="flex gap-3 z-10 -mt-2 transform">
                            <div class="w-3 h-5 bg-black rounded-full anim-virus-eye border border-yellow-500"></div>
                            <div class="w-3 h-5 bg-black rounded-full anim-virus-eye border border-yellow-500"></div>
                        </div>
                    </div>
                @elseif ($theme == 'swamp')
                    <div class="w-16 h-16 md:w-24 md:h-24 bg-[#7E22CE] border-4 border-[#4C1D95] shadow-[inset_0_0_20px_#A855F7] flex flex-col items-center justify-center relative" style="border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%;">
                        <div class="absolute -bottom-4 left-4 w-4 h-6 bg-[#7E22CE] rounded-b-full"></div>
                        <div class="absolute -bottom-2 right-6 w-3 h-4 bg-[#7E22CE] rounded-b-full"></div>
                        <div class="flex gap-4 z-10">
                            <div class="w-5 h-5 bg-[#22C55E] rounded-full anim-virus-eye flex items-center justify-center"><div class="w-2 h-2 bg-black rounded-full"></div></div>
                            <div class="w-3 h-3 bg-[#22C55E] rounded-full anim-virus-eye mt-1 flex items-center justify-center"><div class="w-1 h-1 bg-black rounded-full"></div></div>
                        </div>
                    </div>
                @elseif ($theme == 'rocky')
                    <div class="w-16 h-16 md:w-24 md:h-24 bg-[#4B5563] border-4 border-[#1F2937] shadow-[inset_0_0_15px_#9CA3AF] rounded-md flex flex-col items-center justify-center relative">
                        <div class="absolute -top-3 left-2 w-6 h-6 bg-[#374151] border-2 border-[#1F2937] transform rotate-12"></div>
                        <div class="absolute -top-2 right-2 w-5 h-5 bg-[#4B5563] border-2 border-[#1F2937] transform -rotate-12"></div>
                        <div class="flex gap-2 z-10 bg-black p-1 rounded"><div class="w-4 h-2 bg-[#06B6D4] anim-virus-eye"></div><div class="w-4 h-2 bg-[#06B6D4] anim-virus-eye"></div></div>
                        <div class="w-10 h-3 bg-[#1F2937] mt-3 flex items-center justify-around px-1"><div class="w-1 h-2 bg-white"></div><div class="w-1 h-2 bg-white"></div><div class="w-1 h-2 bg-white"></div></div>
                    </div>
                @elseif ($theme == 'volcano')
                    <div class="w-16 h-16 md:w-24 md:h-24 bg-[#991B1B] border-4 border-[#450A0A] rounded-t-full rounded-b-xl flex flex-col items-center justify-center relative shadow-[inset_0_0_20px_#EF4444]">
                        <div class="absolute -top-4 w-6 h-8 bg-gradient-to-t from-[#EF4444] to-transparent rounded-t-full opacity-80 animate-pulse"></div>
                        <div class="flex gap-2 z-10 mb-2">
                            <div class="w-6 h-4 bg-yellow-300 rounded-full transform -rotate-12 anim-virus-eye border-b-2 border-black"></div>
                            <div class="w-6 h-4 bg-yellow-300 rounded-full transform rotate-12 anim-virus-eye border-b-2 border-black"></div>
                        </div>
                        <div class="w-10 h-3 bg-black rounded-full"></div>
                    </div>
                @else
                    <div class="w-16 h-16 md:w-24 md:h-24 bg-[#E0F2FE] border-4 border-[#0284C7] shadow-[inset_0_0_20px_#38BDF8] flex flex-col items-center justify-center relative transform rotate-45">
                        <div class="transform -rotate-45 flex flex-col items-center">
                            <div class="flex gap-3 z-10 mb-2"><div class="w-3 h-5 bg-[#0284C7] anim-virus-eye rounded-sm"></div><div class="w-3 h-5 bg-[#0284C7] anim-virus-eye rounded-sm"></div></div>
                            <div class="w-6 h-2 bg-[#0284C7] rounded-full"></div>
                        </div>
                        <div class="absolute -top-4 -left-4 w-8 h-8 bg-[#BAE6FD] border-2 border-[#0284C7] -z-10"></div>
                        <div class="absolute -bottom-4 -right-4 w-8 h-8 bg-[#BAE6FD] border-2 border-[#0284C7] -z-10"></div>
                    </div>
                @endif

            </div>
            <div id="enemyShadow" class="w-12 h-2 md:w-20 md:h-3 bg-black/60 rounded-full mt-2 md:mt-3 blur-[2px] anim-shadow-virus opacity-50"></div>
        </div>
    </div>

    <div class="flex-1 bg-[#FFFBEB] p-3 sm:p-5 lg:p-8 flex flex-col lg:flex-row gap-4 lg:gap-6 relative shadow-[inset_0_10px_20px_rgba(0,0,0,0.05)] min-h-0 overflow-y-auto lg:overflow-hidden">

        <div class="w-full lg:w-[60%] xl:w-[65%] bg-white border-2 sm:border-4 border-blue-400 rounded-2xl lg:rounded-3xl p-4 sm:p-5 lg:p-6 relative flex flex-col h-fit lg:h-full transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_15px_30px_rgba(96,165,250,0.3)] shrink-0 lg:shrink">
            <span class="absolute -top-4 sm:-top-5 left-4 sm:left-6 bg-blue-500 text-white px-3 py-1 sm:px-5 sm:py-1.5 text-xs sm:text-sm md:text-base lg:text-lg font-bold rounded-full border-2 border-white transform -rotate-2 z-10">? MISSION</span>

            <div class="mt-2 sm:mt-3 flex flex-col h-full min-h-0">
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
                    if ($char_count > 200) $font_size = "text-sm md:text-base";
                    elseif ($char_count > 100) $font_size = "text-base md:text-lg";
                    else $font_size = "text-lg md:text-xl";
                @endphp

                <div class="shrink-0 mb-3 border-b-2 border-dashed border-blue-100 pb-3">
                    <h3 class="{{ $font_size }} text-gray-800 font-bold leading-snug">
                        {{ $teks_instruksi }}
                    </h3>
                </div>

                <div class="question-content flex-1 w-full overflow-y-auto overflow-x-auto custom-scrollbar rounded-lg text-sm sm:text-base">
                    {!! $html_kode !!}
                </div>
            </div>
        </div>

        <div class="w-full lg:w-[40%] xl:w-[35%] bg-white border-2 sm:border-4 border-green-400 rounded-2xl lg:rounded-3xl p-4 sm:p-5 lg:p-6 relative shadow-[4px_4px_0_0_#86EFAC] flex flex-col h-fit lg:h-full justify-between transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_15px_30px_rgba(74,222,128,0.3)] shrink-0 lg:shrink mt-2 lg:mt-0">
            <span class="absolute -top-4 sm:-top-5 left-4 sm:left-6 bg-green-500 text-white px-3 py-1 sm:px-5 sm:py-1.5 text-xs sm:text-sm md:text-base lg:text-lg font-bold rounded-full border-2 border-white shadow-sm transform rotate-2 z-10">! ACTION</span>

            <div class="flex-1 flex flex-col justify-center mt-4 sm:mt-4 mb-4 sm:mb-4 min-h-0">
                @if($question->options && count($question->options) > 0)
                <div class="w-full overflow-y-auto custom-scrollbar pr-1">
                    <div class="flex flex-col gap-2 sm:gap-3 w-full">
                        @foreach($question->options as $index => $opsi)
                        <label class="flex items-center p-2 sm:p-3 border-2 sm:border-4 border-gray-200 bg-gray-50 hover:bg-blue-50 hover:border-blue-400 hover:shadow-md cursor-pointer group rounded-xl transition-all duration-200 transform active:scale-[0.98] has-[:checked]:bg-green-50 has-[:checked]:border-green-500 has-[:checked]:shadow-lg min-h-[50px] sm:min-h-[60px]">
                            <input type="radio" name="jawaban" value="{{ $index }}" class="hidden peer">
                            <div class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6 border-2 border-gray-400 peer-checked:bg-green-500 peer-checked:border-green-600 flex items-center justify-center mr-2 md:mr-3 flex-shrink-0 rounded-full transition-all relative"><div class="w-1.5 h-1.5 md:w-2 md:h-2 bg-white rounded-full opacity-0 peer-checked:opacity-100 transform scale-0 peer-checked:scale-100 transition-transform"></div></div>
                            <span class="text-sm sm:text-base md:text-lg text-gray-700 font-bold tracking-wide group-hover:text-blue-700 peer-checked:text-green-700 leading-tight break-words">{{ $opsi }}</span>
                        </label>
                        @endforeach
                    </div>
                </div>
                @else
                <div class="flex flex-col items-center justify-center w-full">
                    <div class="flex items-center w-full bg-gray-900 border-2 sm:border-4 border-gray-700 focus-within:border-green-400 focus-within:shadow-[0_0_15px_rgba(74,222,128,0.4)] transition-all duration-300 p-3 sm:p-4 rounded-xl shadow-inner relative overflow-hidden group">
                        <span class="text-green-400 text-xl sm:text-2xl mr-2 animate-pulse">>_</span>
                        <input type="text" id="inputKode" class="bg-transparent border-none text-green-300 text-base sm:text-lg md:text-xl w-full focus:outline-none font-mono placeholder-gray-500 relative z-10" placeholder="Ketik kode..." autocomplete="off" spellcheck="false" autofocus>
                    </div>
                </div>
                @endif
            </div>

            <button onclick="lockAnswer()" class="mt-auto shrink-0 w-full bg-green-500 hover:bg-green-400 border-2 sm:border-4 border-green-700 text-white text-lg sm:text-xl md:text-2xl py-2 sm:py-3 rounded-full shadow-[0_4px_0_0_#15803D] active:translate-y-[4px] active:shadow-none transition-all tracking-widest font-bold cursor-pointer">EXECUTE!</button>
        </div>
    </div>

    <script>
        const kunciJawaban = "{{ $question->correct_answer }}";
        const currentLevel = parseInt("{{ $level }}");
        const selectedLang = "{{ $language }}";
        const currentTheme = "{{ $theme }}"; // Mengambil tema aktif
        const isInputMode = {{ empty($question->options) ? 'true' : 'false' }};
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
                    hearts += `<span class="text-red-500 drop-shadow-md transform ${pulseClass} cursor-default">❤️</span>`;
                } else {
                    hearts += `<span class="text-white/30 grayscale transform scale-90">💔</span>`;
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

            const modal = document.getElementById('statusModal');
            const modalTitle = document.getElementById('modalTitle');
            const modalText = document.getElementById('modalStatusText');
            const modalBtn = document.getElementById('modalBtn');
            const modalDesc = modal.querySelector('p');

            window.showCustomAlert("AI sedang menganalisis kode...", "info", 2000);

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
                    hero.classList.remove('anim-robot-body');
                    heroShadow.classList.remove('anim-shadow-robot');
                    hero.classList.add('animate-victory');
                    heroWrapper.style.animation = "victoryJump 0.8s cubic-bezier(0.25, 1, 0.5, 1) forwards";
                    setTimeout(() => {
                        enemy.classList.remove('anim-virus-body');
                        enemy.style.animation = "enemyExplode 0.4s ease-out forwards";
                        enemyShadow.style.opacity = "0";
                    }, 550);

                    const currentLang = localStorage.getItem('jumpjump_language') || selectedLang;
                    const storageKey = `jumpjump_highest_level_${currentLang.toUpperCase()}`;
                    let highestLevel = parseInt(localStorage.getItem(storageKey)) || 1;
                    if (currentLevel >= highestLevel) {
                        localStorage.setItem(storageKey, currentLevel + 1);
                    }

                    setTimeout(() => {
                        modalTitle.innerText = "STAGE CLEAR!";
                        modalTitle.className = "text-5xl md:text-7xl font-black tracking-tighter text-green-400 mb-4 animate-pulse";
                        modalTitle.style.textShadow = "0 0 15px rgba(74,222,128,0.5)";
                        modalDesc.innerText = "Luar biasa! Bug berhasil dimusnahkan.";
                        modalText.innerText = data.feedback;
                        modalText.parentElement.classList.replace('text-[#fecaca]', 'text-[#bbf7d0]');
                        modalText.parentElement.querySelector('span').classList.replace('text-red-400', 'text-green-400');
                        modalBtn.innerText = "LANJUT KE PETA";
                        modalBtn.className = "w-full bg-[#16a34a] hover:bg-[#15803d] text-white text-2xl md:text-4xl font-bold py-3 md:py-5 rounded-2xl transition-all duration-150 transform hover:scale-105 active:scale-95 shadow-[0_6px_0_0_#14532d] active:shadow-[0_2px_0_0_#14532d] active:translate-y-1";

                        modal.classList.remove('hidden');
                        setTimeout(() => {
                            modal.classList.remove('opacity-0', 'pointer-events-none');
                            modal.children[0].classList.replace('scale-90', 'scale-100');
                        }, 50);
                    }, 1200);

                } else {
                    // Memicu Serangan Dinamis Sesuai Tema
                    enemy.classList.remove('anim-virus-body');
                    enemyWrapper.style.transition = "none";

                    if (currentTheme === 'forest') enemyWrapper.style.animation = "attackForest 0.5s cubic-bezier(0.5, 0, 0.5, 1) forwards";
                    else if (currentTheme === 'desert') enemyWrapper.style.animation = "attackDesert 0.6s ease-in-out forwards";
                    else if (currentTheme === 'swamp') enemyWrapper.style.animation = "attackSwamp 0.5s ease-in-out forwards";
                    else if (currentTheme === 'rocky') enemyWrapper.style.animation = "attackRocky 0.5s ease-in forwards";
                    else if (currentTheme === 'volcano') enemyWrapper.style.animation = "attackVolcano 0.4s ease-in forwards";
                    else enemyWrapper.style.animation = "attackSnow 0.5s ease-in forwards";

                    setTimeout(() => {
                        hero.classList.add('animate-hit');
                        arenaView.classList.add('animate-shake');
                        setTimeout(() => {
                            hero.classList.remove('animate-hit');
                            arenaView.classList.remove('animate-shake');
                            enemyWrapper.style.animation = "";
                            enemyWrapper.style.transition = "all 0.3s ease-out";
                            enemyWrapper.style.transform = "translateX(0) scale(1)";
                            setTimeout(() => { enemy.classList.add('anim-virus-body'); }, 300);
                        }, 300);
                    }, 500);

                    currentHp--;
                    localStorage.setItem(hpKey, currentHp);
                    renderHp();

                    if (currentHp <= 0) {
                        modalTitle.innerText = "GAME OVER!";
                        modalTitle.className = "text-5xl md:text-7xl font-black tracking-tighter text-red-500 mb-4 animate-pulse";
                        modalTitle.style.textShadow = "0 0 15px rgba(239,68,68,0.5)";
                        modalDesc.innerText = "Oh no! Kamu kehabisan nyawa.";
                        modalText.innerText = "Syntax Error! " + data.feedback;
                        modalBtn.innerText = "KEMBALI KE PETA";
                        modalBtn.className = "w-full bg-[#ef4444] hover:bg-[#dc2626] text-white text-2xl md:text-4xl font-bold py-3 md:py-5 rounded-2xl transition-all duration-150 transform hover:scale-105 active:scale-95 shadow-[0_6px_0_0_#991b1b] active:shadow-[0_2px_0_0_#991b1b] active:translate-y-1";

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
                        window.showCustomAlert(`OUCH! ${data.feedback} Sisa Nyawa: ${currentHp}`, "error", 6000);
                    }
                }
            })
            .catch(error => {
                console.error('Error:', error);
                window.showCustomAlert('Koneksi terputus! Gagal menghubungi server.', 'error', 3000);
            });
        }

        function returnToMap() { window.location.href = '/map'; }
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
                                Prism.languages.insertBefore('cpp', 'keyword', { 'std-teks': /\bstd\b/ });
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
