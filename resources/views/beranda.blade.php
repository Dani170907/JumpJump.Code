<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>JUMPJUMP.CODE - Welcome</title>
    <style>
        body { font-family: 'Press Start 2P', cursive; }

        /* ========================================= */
        /* ANIMASI LINGKUNGAN (Biar "Ramai")         */
        /* ========================================= */

        /* 1. Efek Garis TV Tabung (Scanlines) */
        .scanlines {
            background: linear-gradient(rgba(18, 16, 16, 0) 50%, rgba(0, 0, 0, 0.15) 50%);
            background-size: 100% 4px;
            pointer-events: none;
        }

        /* 2. Partikel Melayang (Pixel Dust) */
        @keyframes floatUp {
            0% { transform: translateY(110vh) rotate(0deg); opacity: 0; }
            10% { opacity: 0.8; }
            90% { opacity: 0.8; }
            100% { transform: translateY(-10vh) rotate(360deg); opacity: 0; }
        }
        .pixel-dust { position: absolute; animation: floatUp linear infinite; }

        /* 3. Teks Berkedip Klasik */
        @keyframes flashText {
            0%, 49% { opacity: 1; }
            50%, 100% { opacity: 0; }
        }
        .anim-flash { animation: flashText 1s infinite; }

        /* 4. Banner Melayang pelan */
        @keyframes floatBanner {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-8px); }
        }
        .anim-banner { animation: floatBanner 4s ease-in-out infinite; }

        /* ========================================= */
        /* ANIMASI KARAKTER DETIL (Juice)            */
        /* ========================================= */
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
    </style>
</head>
<body class="bg-blue-300 min-h-screen flex flex-col items-center justify-center bg-cover bg-center relative overflow-hidden" style="background-image: url('{{ asset('images/bg-main.png') }}');">

    <div class="scanlines absolute inset-0 z-50"></div>

    <x-alert />

    <div class="absolute inset-0 z-0 pointer-events-none">
        <div class="pixel-dust bg-white w-3 h-3 left-[10%]" style="animation-duration: 8s; animation-delay: 0s;"></div>
        <div class="pixel-dust bg-yellow-400 w-5 h-5 left-[25%]" style="animation-duration: 12s; animation-delay: 2s;"></div>
        <div class="pixel-dust bg-white w-2 h-2 left-[45%]" style="animation-duration: 6s; animation-delay: 5s;"></div>
        <div class="pixel-dust bg-teal-300 w-4 h-4 left-[65%]" style="animation-duration: 10s; animation-delay: 1s;"></div>
        <div class="pixel-dust bg-red-400 w-3 h-3 left-[85%]" style="animation-duration: 9s; animation-delay: 4s;"></div>
        <div class="pixel-dust bg-yellow-200 w-6 h-6 left-[50%]" style="animation-duration: 15s; animation-delay: 7s;"></div>
    </div>

    <div class="absolute inset-0 z-10 pointer-events-none flex items-center justify-between px-[5%] md:px-[15%] pb-20">

        <div class="flex flex-col items-center">
            <div class="anim-robot-body flex flex-col items-center drop-shadow-2xl">
                <div class="anim-antenna flex flex-col items-center">
                    <div class="w-4 h-4 md:w-5 md:h-5 bg-yellow-400 rounded-full border-2 border-yellow-600 shadow-[0_0_10px_yellow] z-10 -mb-1"></div>
                    <div class="w-1.5 h-6 md:w-2 md:h-8 bg-gray-400 border-x-2 border-gray-600"></div>
                </div>
                <div class="w-24 h-16 md:w-32 md:h-24 bg-[#38BDF8] border-4 md:border-6 border-gray-800 rounded-xl relative shadow-inner flex flex-col items-center justify-center overflow-hidden z-20">
                    <div class="absolute top-0 -left-6 w-[200%] h-1/2 bg-white opacity-20 transform -rotate-12 pointer-events-none"></div>
                    <div class="flex gap-3 mb-1 z-10 anim-blink">
                       <div class="w-3 h-5 md:w-4 md:h-8 bg-white border-2 border-blue-900 rounded-sm"></div>
                       <div class="w-3 h-5 md:w-4 md:h-8 bg-white border-2 border-blue-900 rounded-sm"></div>
                    </div>
                </div>
                <div class="w-12 h-3 md:w-16 h-4 bg-gray-600 border-x-2 border-gray-800 z-10"></div>
                <div class="w-16 h-8 md:w-20 md:h-10 bg-gray-800 border-2 md:border-4 border-gray-900 rounded-b-lg flex items-center justify-between px-2 z-10">
                    <div class="w-3 h-5 md:w-4 md:h-6 bg-gray-400 rounded-full border border-gray-200"></div>
                    <div class="w-3 h-5 md:w-4 md:h-6 bg-gray-400 rounded-full border border-gray-200"></div>
                </div>
            </div>
            <div class="anim-shadow-robot w-16 h-2 md:w-20 md:h-3 bg-black rounded-full mt-2 blur-[2px]"></div>
        </div>

        <div class="flex flex-col items-center">
            <div class="anim-virus-body w-20 h-20 md:w-28 md:h-28 bg-[#A855F7] border-4 md:border-6 border-[#4C1D95] shadow-[inset_0_-5px_10px_rgba(0,0,0,0.4)] rounded-full flex flex-col items-center justify-center relative drop-shadow-2xl">
                <div class="absolute -top-3 md:-top-4 left-1/2 transform -translate-x-1/2 w-2.5 h-5 bg-[#6B21A8] border-2 border-[#4C1D95] rounded-t-full"></div>
                <div class="absolute top-0 left-1 transform -rotate-45 w-2.5 h-5 bg-[#6B21A8] border-2 border-[#4C1D95] rounded-t-full"></div>
                <div class="absolute top-0 right-1 transform rotate-45 w-2.5 h-5 bg-[#6B21A8] border-2 border-[#4C1D95] rounded-t-full"></div>
                <div class="flex gap-2 mt-2 z-10">
                    <div class="w-6 h-6 md:w-8 md:h-8 bg-yellow-300 rounded-full flex items-center justify-center shadow-inner relative border-2 border-[#4C1D95]">
                        <div class="anim-virus-eye w-2 h-2 md:w-3 md:h-3 bg-red-600 rounded-full mt-1"></div>
                    </div>
                    <div class="w-6 h-6 md:w-8 md:h-8 bg-yellow-300 rounded-full flex items-center justify-center shadow-inner relative border-2 border-[#4C1D95]">
                        <div class="anim-virus-eye w-2 h-2 md:w-3 md:h-3 bg-red-600 rounded-full mt-1"></div>
                    </div>
                </div>
                <div class="w-10 h-4 md:w-14 md:h-6 bg-black rounded-b-full mt-2 relative border-t-2 border-[#4C1D95] overflow-hidden flex justify-center gap-1">
                    <div class="w-1.5 h-3 md:w-2 md:h-4 bg-white transform rotate-12 rounded-b-sm"></div>
                    <div class="w-1.5 h-4 md:w-2 md:h-5 bg-white rounded-b-sm"></div>
                    <div class="w-1.5 h-3 md:w-2 md:h-4 bg-white transform -rotate-12 rounded-b-sm"></div>
                </div>
            </div>
            <div class="anim-shadow-virus w-16 h-2 md:w-20 md:h-3 bg-black rounded-full mt-3 blur-[2px]"></div>
        </div>

    </div>

    <div class="relative z-20 text-center w-full max-w-5xl px-4 mt-12 flex flex-col items-center">

        <div class="anim-banner bg-blue-600 border-4 border-blue-800 p-6 md:p-8 rounded-lg shadow-[8px_8px_0_0_rgba(0,0,0,0.5)] mb-4 transform hover:scale-105 transition-transform">
            <h1 class="text-white text-xl md:text-3xl leading-relaxed tracking-wider" style="text-shadow: 3px 3px 0px #1e3a8a;">
                BELAJAR CODING: <br class="md:hidden"><span class="text-yellow-300">PETUALANGAN LOGIKA</span>
            </h1>
        </div>

        <p class="anim-flash text-yellow-300 text-sm md:text-lg mb-24 drop-shadow-[0_2px_2px_rgba(0,0,0,0.8)]">
            - INSERT COIN TO PLAY -
        </p>

        <div class="flex flex-col md:flex-row justify-center items-center gap-8 md:gap-24 w-full">
            <button onclick="openModal()" class="w-full md:w-80 py-5 md:py-6 bg-red-500 hover:bg-red-600 text-white text-2xl md:text-3xl border-4 border-red-800 rounded-full shadow-[6px_6px_0_0_rgba(0,0,0,0.5)] active:translate-y-2 active:shadow-none transition-all hover:shadow-[0_0_20px_rgba(239,68,68,0.6)]">
                START
            </button>

            <button onclick="openSettingModal()" class="w-full md:w-80 py-5 md:py-6 bg-teal-400 hover:bg-teal-500 text-white text-2xl md:text-3xl border-4 border-teal-800 rounded-full shadow-[6px_6px_0_0_rgba(0,0,0,0.5)] active:translate-y-2 active:shadow-none transition-all hover:shadow-[0_0_20px_rgba(45,212,191,0.6)]">
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
