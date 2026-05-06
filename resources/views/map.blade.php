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
      body {
         font-family: 'VT323', monospace;
      }

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
         if (pesan) {
            pesan.style.transition = "opacity 0.5s ease";
            pesan.style.opacity = "0";
            setTimeout(() => pesan.remove(), 500);
         }
      }, 3500);

   </script>
   @endif

   <x-alert />

   <div class="relative w-[95%] md:w-full aspect-video max-h-screen max-w-[calc(100vh*16/9)] bg-cover bg-center rounded-2xl md:rounded-[2.5rem] border-4 md:border-8 border-gray-800 shadow-[0_0_40px_rgba(0,0,0,0.8)] overflow-hidden" style="background-image: url('{{ asset('images/map-level.png') }}');">

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
      document.addEventListener('DOMContentLoaded', () => {
         const currentLang = localStorage.getItem('jumpjump_language');

         if (!currentLang) {
            window.location.href = '/';
            return;
         }

         // Gunakan toUpperCase() agar seragam (menghindari error 'html' vs 'HTML')
         const storageKey = `jumpjump_highest_level_${currentLang.toUpperCase()}`;
         let highestLevel = parseInt(localStorage.getItem(storageKey)) || 1;

         console.log(`Bahasa: ${currentLang}, Level Tertinggi: ${highestLevel}`);

         for (let i = 1; i <= 10; i++) {
            const btn = document.getElementById(`btn-level-${i}`);

            if (btn) {
                // Hapus efek transparan agar menutupi gambar halo di background
                btn.style.opacity = "1";

                if (i <= highestLevel) {
                    // ===================================
                    // KONDISI TERBUKA (WARNA MERAH)
                    // ===================================
                    btn.style.cursor = "pointer";

                    // Ganti Abu-abu menjadi Merah
                    btn.classList.remove('bg-gray-500', 'hover:bg-gray-400', 'border-gray-300', 'text-gray-200', 'shadow-[0_4px_0_0_#374151]', 'md:shadow-[0_6px_0_0_#374151]');
                    btn.classList.add('bg-[#ff6b4a]', 'hover:bg-[#ff522c]', 'border-[#ffb39e]', 'text-white', 'shadow-[0_4px_0_0_#b52a10]', 'md:shadow-[0_6px_0_0_#b52a10]');

                    // Panggil fungsi API Check Stage
                    btn.onclick = () => pilihLevel(i);
                } else {
                    // ===================================
                    // KONDISI TERKUNCI (WARNA ABU-ABU SOLID)
                    // ===================================
                    btn.style.cursor = "not-allowed";

                    // Ganti Merah menjadi Abu-abu
                    btn.classList.remove('bg-[#ff6b4a]', 'hover:bg-[#ff522c]', 'border-[#ffb39e]', 'text-white', 'shadow-[0_4px_0_0_#b52a10]', 'md:shadow-[0_6px_0_0_#b52a10]');
                    btn.classList.add('bg-gray-500', 'hover:bg-gray-400', 'border-gray-300', 'text-gray-200', 'shadow-[0_4px_0_0_#374151]', 'md:shadow-[0_6px_0_0_#374151]');

                    btn.onclick = (e) => {
                        e.preventDefault();
                        window.showCustomAlert('Level masih terkunci!', 'warning');
                    };
                }
            }
         }
      });

      async function pilihLevel(level) {
         const selectedLang = localStorage.getItem("jumpjump_language") || "C++";
         const storageKey = `jumpjump_highest_level_${selectedLang.toUpperCase()}`;
         let highestLevel = parseInt(localStorage.getItem(storageKey)) || 1;

         if (level > highestLevel) {
            return showCustomAlert(`STAGE TERKUNCI! Selesaikan stage sebelumnya.`, 'warning');
         }

         try {
            let response = await fetch(`/check-stage/${selectedLang}/${level}`);
            let data = await response.json();

            if (data.exists) {
               window.location.href = `/quiz/${selectedLang}/${level}`;
            } else {
               showCustomAlert(`Stage ${level} untuk ${selectedLang} belum dibuat!`, 'error');
            }
         } catch (error) {
            showCustomAlert("Terjadi kesalahan koneksi sistem.", 'error');
         }
      }
   </script>
</body>
</html>

