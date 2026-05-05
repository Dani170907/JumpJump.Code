<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Peta Level - JUMPJUMP.CODE</title>
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'VT323', monospace; }
        .text-outline {
            text-shadow: 2px 0 #000, -2px 0 #000, 0 2px #000, 0 -2px #000, 1px 1px #000, -1px -1px #000, 1px -1px #000, -1px 1px #000;
        }
    </style>
</head>
<body class="bg-gray-900 h-screen w-screen overflow-hidden flex items-center justify-center">
    @if(session('error'))
    <div id="pesanSistem" class="absolute top-10 left-1/2 transform -translate-x-1/2 bg-red-600 border-4 border-red-900 text-white px-6 py-3 rounded-xl z-50 shadow-[0_6px_0_0_#450a0a] text-xl md:text-3xl tracking-widest animate-bounce flex items-center gap-3">
        <span>⚠️</span> {{ session('error') }}
    </div>

    <script>
        setTimeout(() => {
            const pesan = document.getElementById('pesanSistem');
            if(pesan) {
                pesan.style.transition = "opacity 0.5s ease";
                pesan.style.opacity = "0";
                setTimeout(() => pesan.remove(), 500);
            }
        }, 3500);
    </script>
    @endif

    <x-alert />

    <div class="relative w-[95%] md:w-full aspect-video max-h-screen max-w-[calc(100vh*16/9)] bg-cover bg-center rounded-2xl md:rounded-[2.5rem] border-4 md:border-8 border-gray-800 shadow-[0_0_40px_rgba(0,0,0,0.8)] overflow-hidden"
         style="background-image: url('{{ asset('images/map-level.png') }}');">

        <div class="absolute inset-0 pointer-events-none shadow-[inset_0_0_40px_rgba(0,0,0,0.7)] md:shadow-[inset_0_0_80px_rgba(0,0,0,0.8)] z-0"></div>
        <a href="/" class="absolute top-4 left-4 md:top-6 md:left-8 bg-red-500 hover:bg-red-600 border-4 border-red-800 text-white px-4 py-1 md:px-6 md:py-2 rounded-full text-lg md:text-2xl z-10 shadow-[0_4px_0_0_#b52a10] active:translate-y-[4px] active:shadow-none transition-all text-outline cursor-pointer">
            &larr; BACK
        </a>
        <button id="btn-level-1" onclick="pilihLevel(1)" class="absolute top-[70%] left-[64%] w-[7%] aspect-square flex items-center justify-center rounded-full bg-[#ff6b4a] hover:bg-[#ff522c] border-[3px] md:border-4 border-[#ffb39e] text-white text-xl md:text-6xl font-bold shadow-[0_4px_0_0_#b52a10] md:shadow-[0_6px_0_0_#b52a10] active:translate-y-[4px] md:active:translate-y-[6px] active:shadow-none transition-all text-outline cursor-pointer z-10">
            1
        </button>
        <button id="btn-level-2" onclick="pilihLevel(2)" class="absolute top-[57%] left-[52.5%] w-[7%] aspect-square flex items-center justify-center rounded-full bg-gray-500 hover:bg-gray-400 border-[3px] md:border-4 border-gray-300 text-gray-200 text-xl md:text-6xl font-bold shadow-[0_4px_0_0_#374151] md:shadow-[0_6px_0_0_#374151] active:translate-y-[4px] md:active:translate-y-[6px] active:shadow-none transition-all text-outline cursor-pointer z-10">
            2
        </button>
        <button id="btn-level-3" onclick="pilihLevel(3)" class="absolute top-[32%] left-[66%] w-[7%] aspect-square flex items-center justify-center rounded-full bg-gray-500 hover:bg-gray-400 border-[3px] md:border-4 border-gray-300 text-gray-200 text-xl md:text-6xl font-bold shadow-[0_4px_0_0_#374151] md:shadow-[0_6px_0_0_#374151] active:translate-y-[4px] md:active:translate-y-[6px] active:shadow-none transition-all text-outline cursor-pointer z-10">
            3
        </button>
        <button id="btn-level-4" onclick="pilihLevel(4)" class="absolute top-[16%] left-[51.5%] w-[7%] aspect-square flex items-center justify-center rounded-full bg-gray-500 hover:bg-gray-400 border-[3px] md:border-4 border-gray-300 text-gray-200 text-xl md:text-6xl font-bold shadow-[0_4px_0_0_#374151] md:shadow-[0_6px_0_0_#374151] active:translate-y-[4px] md:active:translate-y-[6px] active:shadow-none transition-all text-outline cursor-pointer z-10">
            4
        </button>
        <button id="btn-level-5" onclick="pilihLevel(5)" class="absolute top-[8%] left-[35.5%] w-[7%] aspect-square flex items-center justify-center rounded-full bg-gray-500 hover:bg-gray-400 border-[3px] md:border-4 border-gray-300 text-gray-200 text-xl md:text-6xl font-bold shadow-[0_4px_0_0_#374151] md:shadow-[0_6px_0_0_#374151] active:translate-y-[4px] md:active:translate-y-[6px] active:shadow-none transition-all text-outline cursor-pointer z-10">
            5
        </button>
        <button id="btn-level-6" onclick="pilihLevel(6)" class="absolute top-[29%] left-[25.5%] w-[7%] aspect-square flex items-center justify-center rounded-full bg-gray-500 hover:bg-gray-400 border-[3px] md:border-4 border-gray-300 text-gray-200 text-xl md:text-6xl font-bold shadow-[0_4px_0_0_#374151] md:shadow-[0_6px_0_0_#374151] active:translate-y-[4px] md:active:translate-y-[6px] active:shadow-none transition-all text-outline cursor-pointer z-10">
            6
        </button>
        <button id="btn-level-7" onclick="pilihLevel(7)" class="absolute top-[56%] left-[31%] w-[7%] aspect-square flex items-center justify-center rounded-full bg-gray-500 hover:bg-gray-400 border-[3px] md:border-4 border-gray-300 text-gray-200 text-xl md:text-6xl font-bold shadow-[0_4px_0_0_#374151] md:shadow-[0_6px_0_0_#374151] active:translate-y-[4px] md:active:translate-y-[6px] active:shadow-none transition-all text-outline cursor-pointer z-10">
            7
        </button>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // 1. Cek bahasa apa yang sedang dimainkan
            const selectedLang = localStorage.getItem("jumpjump_language") || "C++";

            // 2. Ambil level tertinggi KHUSUS untuk bahasa tersebut
            const storageKey = `jumpjump_highest_level_${selectedLang}`;
            let highestLevel = parseInt(localStorage.getItem(storageKey)) || 1;

            const unlockedClasses = ['bg-[#ff6b4a]', 'hover:bg-[#ff522c]', 'border-[#ffb39e]', 'shadow-[0_4px_0_0_#b52a10]', 'md:shadow-[0_6px_0_0_#b52a10]', 'text-white'];
            const lockedClasses = ['bg-gray-500', 'hover:bg-gray-400', 'border-gray-300', 'shadow-[0_4px_0_0_#374151]', 'md:shadow-[0_6px_0_0_#374151]', 'text-gray-200'];

            for (let i = 1; i <= 7; i++) {
                let btn = document.getElementById(`btn-level-${i}`);
                if (!btn) continue;

                if (i <= highestLevel) {
                    btn.classList.remove(...lockedClasses);
                    btn.classList.add(...unlockedClasses);
                }
            }
        });

        async function pilihLevel(level) {
            const selectedLang = localStorage.getItem("jumpjump_language") || "C++";
            const storageKey = `jumpjump_highest_level_${selectedLang}`;
            let highestLevel = parseInt(localStorage.getItem(storageKey)) || 1;

            // 1. Cek apakah level masih terkunci
            if(level > highestLevel) {
                return showCustomAlert(`STAGE TERKUNCI! Selesaikan stage sebelumnya.`, 'warning');
            }

            // 2. Jika level sudah terbuka, lakukan pengecekan ke Database
            try {
                // Memanggil Route pengecekan di Laravel
                let response = await fetch(`/check-stage/${selectedLang}/${level}`);
                let data = await response.json();

                // Jika true (soal ada di database)
                if (data.exists) {
                    window.location.href = `/quiz/${selectedLang}/${level}`;
                } else {
                    // Jika false (soal belum dibuat), tampilkan alert tanpa refresh!
                    showCustomAlert(`Stage ${level} untuk ${selectedLang} belum dibuat!`, 'error');
                }
            } catch (error) {
                // Jika terjadi error koneksi ke server
                showCustomAlert("Terjadi kesalahan koneksi sistem.", 'error');
            }
        }
    </script>
</body>
</html>
