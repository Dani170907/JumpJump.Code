<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Stage {{ $level }} - JUMPJUMP.CODE</title>
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism-themes/1.9.0/prism-vsc-dark-plus.min.css" rel="stylesheet" />

    <style>
.question-content pre {
            /* Latar Belakang Khas Andromeda */
            background-color: #23262E !important;

            /* Border tebal bergaya Andromeda (Bisa diganti warnanya, misal cyan #00E8C6 atau ungu #C74DED) */
            border: 3px solid #5C6370 !important;
            border-radius: 10px !important;

            padding: 1.2rem !important;
            margin-top: 1.5rem !important;
            margin-bottom: 1.5rem !important;
            line-height: 1.6 !important;
            letter-spacing: normal !important;
            overflow-x: auto !important;

            /* Bayangan dalam agar border terlihat menyatu */
            box-shadow: inset 0 0 10px rgba(0,0,0,0.5), 0 4px 15px rgba(0,0,0,0.3) !important;
        }

        .question-content pre,
        .question-content pre code,
        .question-content pre code span {
            font-family: 'Consolas', 'Monaco', 'Courier New', monospace !important;
            font-size: 1.15rem !important; /* Sedikit dibesarkan agar italicnya jelas */
            text-shadow: none !important;
            text-transform: none !important;
        }

        /* === EFEK ITALIC UNTUK SINTAKS TERTENTU === */
        /* Membuat Keyword (seperti def, class, if, return) dan Komentar menjadi Italic */
        .token.keyword,
        .token.comment,
        .token.class-name,
        .token.function {
            font-style: italic !important;
        }

        /* Menimpa warna beberapa token agar lebih mirip Andromeda (Opsional) */
        .token.keyword { color: #C74DED !important; } /* Ungu Andromeda */
        .token.function { color: #FFE66D !important; } /* Kuning Andromeda */
        .token.string { color: #96E072 !important; } /* Hijau Andromeda */
        .token.comment { color: #5C6370 !important; } /* Abu-abu redup */

        .question-content p {
            margin-bottom: 0.5rem;
        }

        /* KUMPULAN ANIMASI CUSTOM & JUICE */
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

    <div id="gameOverModal" class="fixed inset-0 z-[99999] hidden flex items-center justify-center bg-black/20 backdrop-blur-md transition-opacity p-4">
        <div class="bg-gray-900 border-4 md:border-8 border-red-500 rounded-2xl md:rounded-3xl p-5 md:p-8 max-w-2xl w-full shadow-[10px_10px_0_0_rgba(220,38,38,0.4)] transform scale-90 transition-transform duration-300 flex flex-col items-center text-center max-h-[90vh] flex-shrink-0">
            <h2 class="text-5xl sm:text-6xl md:text-7xl text-red-500 mb-1 md:mb-2 animate-bounce tracking-widest" style="text-shadow: 2px 2px 0 #000;">GAME OVER!</h2>
            <div class="text-xl md:text-3xl text-yellow-300 mb-3 md:mb-4 animate-pulse">Oh no! Kamu kehabisan nyawa.</div>
            <div class="bg-white border-2 md:border-4 border-gray-400 w-full p-4 md:p-6 rounded-xl md:rounded-2xl mb-4 md:mb-6 text-left shadow-inner flex-1 overflow-y-auto custom-scrollbar">
                <span class="text-red-500 text-lg md:text-2xl font-bold block mb-1 md:mb-2 border-b-2 md:border-b-4 border-dashed border-red-200 pb-1">>> ANALISIS SISTEM:</span>
                <p id="gameOverText" class="text-base sm:text-xl md:text-2xl text-gray-800 leading-snug md:leading-relaxed mt-2"></p>
            </div>
            <button onclick="returnToMap()" class="bg-[#ff6b4a] hover:bg-[#ff522c] text-white border-2 md:border-4 border-white px-6 md:px-10 py-2 md:py-3 rounded-full text-2xl md:text-3xl tracking-widest shadow-[0_4px_0_0_#b52a10] active:translate-y-[4px] active:shadow-none transition-all uppercase shrink-0">KEMBALI KE PETA</button>
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

    <div id="arenaView" class="h-[25vh] md:h-[30vh] lg:h-[40vh] min-h-[140px] shrink-0 bg-gradient-to-b from-[#4CB1F7] to-[#87CEFA] relative overflow-hidden flex items-end border-b-[6px] md:border-b-[10px] border-[#4A3B2C] transition-all duration-300">
        <div class="absolute top-2 left-4 w-10 h-10 md:w-20 md:h-20 bg-yellow-300 rounded-full shadow-[0_0_30px_rgba(253,224,71,0.9)] animate-pulse z-0"></div>
        <div class="absolute inset-0 bg-clouds opacity-80 z-0"></div>
        <div class="absolute bottom-4 -left-10 w-[40vw] h-16 md:h-32 bg-[#7DD3FC] rounded-t-full z-0"></div>
        <div class="absolute bottom-4 right-10 w-[50vw] h-20 md:h-36 bg-[#7DD3FC] rounded-t-full z-0"></div>
        <div class="absolute bottom-4 left-10 w-[30vw] h-12 md:h-24 bg-[#38BDF8] rounded-t-full z-0 border-t-4 border-[#0284C7] shadow-lg"></div>
        <div class="absolute bottom-8 md:bottom-16 left-1/2 transform -translate-x-1/2 text-3xl md:text-6xl text-yellow-300 font-bold italic drop-shadow-md animate-bounce z-10" style="text-shadow: 2px 2px 0 #D97706, -2px -2px 0 #D97706;">VS</div>

        <div id="heroWrapper" class="absolute left-[5%] md:left-[15%] bottom-3 md:bottom-4 flex flex-col items-center z-20 transition-transform duration-75">
            <div id="jumpHero" class="w-16 h-24 md:w-32 md:h-44 flex flex-col items-center justify-end anim-robot-body relative group drop-shadow-2xl z-20" style="transform-origin: bottom center;">
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
            <div id="heroShadow" class="w-12 h-2 md:w-20 h-2 md:h-3 bg-black rounded-full mt-1.5 blur-[2px] anim-shadow-robot"></div>
        </div>

        <div id="enemyWrapper" class="absolute right-[5%] md:right-[15%] bottom-3 md:bottom-4 flex flex-col items-center z-20 transition-transform duration-75">
            <div id="bugEnemy" class="w-16 h-16 md:w-32 md:h-32 bg-[#A855F7] border-4 md:border-8 border-[#4C1D95] shadow-inner rounded-full flex flex-col items-center justify-center transition-all duration-300 anim-virus-body relative drop-shadow-2xl">
                <div class="absolute -top-3 md:-top-5 left-1/2 transform -translate-x-1/2 w-2.5 h-4 md:w-4 md:h-8 bg-[#6B21A8] border-2 border-[#4C1D95] rounded-t-full"></div>
                <div class="absolute top-1 md:top-0 left-1 transform -rotate-45 w-2.5 h-4 md:w-4 md:h-8 bg-[#6B21A8] border-2 border-[#4C1D95] rounded-t-full"></div>
                <div class="absolute top-1 md:top-0 right-1 transform rotate-45 w-2.5 h-4 md:w-4 md:h-8 bg-[#6B21A8] border-2 border-[#4C1D95] rounded-t-full"></div>
                <div class="flex gap-1.5 md:gap-2.5 mt-2 z-10">
                    <div class="w-4 h-4 md:w-10 md:h-10 bg-yellow-300 rounded-full flex items-center justify-center shadow-inner relative border-2 border-[#4C1D95]">
                        <div class="w-2 h-2 md:w-3 md:h-3 bg-red-600 rounded-full mt-1 anim-virus-eye"></div>
                    </div>
                    <div class="w-4 h-4 md:w-10 md:h-10 bg-yellow-300 rounded-full flex items-center justify-center shadow-inner relative border-2 border-[#4C1D95]">
                        <div class="w-2 h-2 md:w-3 md:h-3 bg-red-600 rounded-full mt-1 anim-virus-eye"></div>
                    </div>
                </div>
                <div class="w-8 h-3 md:w-14 md:h-6 bg-black rounded-b-full mt-2 relative border-t-2 md:border-t-4 border-[#4C1D95] overflow-hidden flex justify-center gap-1">
                    <div class="w-1.5 h-2 md:w-2 md:h-4 bg-white transform rotate-12 rounded-b-sm"></div>
                    <div class="w-1.5 h-3 md:w-2 md:h-5 bg-white rounded-b-sm"></div>
                    <div class="w-1.5 h-2 md:w-2 md:h-4 bg-white transform -rotate-12 rounded-b-sm"></div>
                    <div class="absolute bottom-0 w-full h-1 md:h-2.5 bg-red-600 rounded-t-full"></div>
                </div>
            </div>
            <div id="enemyShadow" class="w-12 h-2 md:w-20 h-2 md:h-3 bg-black rounded-full mt-2 md:mt-3 blur-[2px] anim-shadow-virus"></div>
        </div>
        <div class="absolute bottom-0 left-0 w-full h-4 md:h-8 bg-[#22C55E] border-t-[3px] md:border-t-[6px] border-[#15803D] z-10 shadow-[inset_0_-3px_0_0_rgba(0,0,0,0.2)]"></div>
    </div>

    <div class="flex-1 bg-[#FFFBEB] border-t-4 border-[#FDE047] p-3 sm:p-5 lg:p-8 flex flex-col lg:flex-row gap-4 lg:gap-6 overflow-hidden relative shadow-[inset_0_10px_20px_rgba(0,0,0,0.05)] min-h-0">
        <div class="h-[35%] lg:h-auto lg:w-[45%] bg-white border-2 sm:border-4 border-blue-400 rounded-2xl lg:rounded-3xl p-4 sm:p-6 lg:p-8 relative flex flex-col min-h-[90px]">
            <span class="absolute -top-4 sm:-top-5 left-4 sm:left-6 bg-blue-500 text-white px-3 py-1 sm:px-5 sm:py-1.5 text-sm sm:text-lg md:text-2xl font-bold rounded-full border-2 border-white transform -rotate-2 z-10">? MISSION</span>
            <div class="mt-2 sm:mt-4 flex-1 overflow-y-auto pr-2 custom-scrollbar block">

                @php
                    $teks_bersih = str_replace(['\n', '\\n'], "\n", $question->question_text);
                    $html_soal = Str::markdown($teks_bersih);
                @endphp

                <div class="question-content text-lg sm:text-2xl md:text-3xl lg:text-4xl text-gray-800 leading-snug sm:leading-relaxed tracking-wide font-semibold w-full">
                    {!! $html_soal !!}
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
                    return window.showCustomAlert("Hei, terminalnya jangan dikosongin!", "warning");
                }
                jawabanPemain = inputElem.value.trim();
            } else {
                const selectedOption = document.querySelector('input[name="jawaban"]:checked');
                if (!selectedOption) {
                    return window.showCustomAlert("Pilih aksinya dulu dong!", "warning");
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

            if (jawabanPemain === kunciJawaban) {
                hero.classList.remove('anim-robot-body');
                heroShadow.classList.remove('anim-shadow-robot');
                hero.classList.add('animate-victory');
                heroWrapper.style.animation = "victoryJump 0.8s cubic-bezier(0.25, 1, 0.5, 1) forwards";
                setTimeout(() => {
                    enemy.classList.remove('anim-virus-body');
                    enemy.style.animation = "enemyExplode 0.4s ease-out forwards";
                    enemyShadow.style.opacity = "0";
                }, 550);
                setTimeout(() => {
                    window.showCustomAlert("PERFECT! Serangan Berhasil!", "success");
                    const currentLang = localStorage.getItem('jumpjump_language') || selectedLang;
                    const storageKey = `jumpjump_highest_level_${currentLang.toUpperCase()}`;
                    let highestLevel = parseInt(localStorage.getItem(storageKey)) || 1;
                    if (currentLevel >= highestLevel) {
                        localStorage.setItem(storageKey, currentLevel + 1);
                    }
                    setTimeout(() => window.location.href = '/map', 1500);
                }, 1000);
            } else {
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
                    const teksPenjelasan = penjelasanSoal ? penjelasanSoal : "Syntax Error! Perhatikan lagi logikanya.";
                    const modal = document.getElementById('gameOverModal');
                    const modalText = document.getElementById('gameOverText');
                    modalText.innerText = teksPenjelasan;
                    modal.classList.remove('hidden');
                    setTimeout(() => {
                        modal.children[0].classList.remove('scale-90');
                        modal.children[0].classList.add('scale-100');
                    }, 50);
                    localStorage.removeItem(hpKey);
                } else {
                    const hpDiv = document.getElementById('hpContainer');
                    hpDiv.classList.add('scale-105', 'border-red-500');
                    setTimeout(() => hpDiv.classList.remove('scale-105', 'border-red-500'), 300);
                    window.showCustomAlert(`OUCH! Salah. Sisa Nyawa: ${currentHp}`, "error");
                }
            }
        }
        function returnToMap() {
            window.location.href = '/map';
        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            // Deteksi otomatis blok kode untuk memberikan bahasa yang tepat
            document.querySelectorAll('.question-content pre code').forEach((block) => {
                if (!block.className.includes('language-')) {
                    // Mapping bahasa ke class Prism.js
                    const langMap = {
                        'C++': 'cpp',
                        'PYTHON': 'python',
                        'HTML': 'markup'
                    };
                    let langClass = langMap[selectedLang] || selectedLang.toLowerCase();
                    block.classList.add('language-' + langClass);
                }
            });

            if (typeof Prism !== 'undefined') {
                Prism.highlightAll();
            }
        });
    </script>
</body>
</html>
