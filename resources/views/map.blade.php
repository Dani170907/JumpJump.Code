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
         scrollbar-width: thin;
         scrollbar-color: #ef4444 #1f2937;
      }
      body::-webkit-scrollbar { width: 12px; }
      body::-webkit-scrollbar-track { background: #1f2937; }
      body::-webkit-scrollbar-thumb { background-color: #ef4444; border-radius: 6px; }

      .text-outline {
         text-shadow: 2px 0 #000, -2px 0 #000, 0 2px #000, 0 -2px #000, 1px 1px #000, -1px -1px #000, 1px -1px #000, -1px 1px #000;
      }
   </style>
</head>
<body class="bg-gray-900 m-0 p-0 overflow-auto">

   @if(session('error'))
   <div id="pesanSistem" class="fixed top-10 left-1/2 transform -translate-x-1/2 bg-red-600 border-4 border-red-900 text-white px-6 py-3 rounded-xl z-[9999] shadow-[0_6px_0_0_#450a0a] text-xl md:text-3xl tracking-widest animate-bounce flex items-center gap-3">
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

   <div class="fixed top-4 left-4 md:top-6 md:left-8 z-[60]">
       <a href="/" class="bg-red-500 hover:bg-red-600 border-4 border-red-800 text-white px-4 py-1 md:px-6 md:py-2 rounded-full text-lg md:text-2xl shadow-[0_4px_0_0_#b52a10] active:translate-y-[4px] active:shadow-none transition-all text-outline cursor-pointer block">
          &larr; BACK
       </a>
   </div>

   <div class="relative w-[150%] sm:w-[150%] md:w-full mx-auto">

      <img src="{{ asset('images/map-level.png') }}" class="w-full h-auto block" alt="Map Level">

      <div class="absolute inset-0 pointer-events-none shadow-[inset_0_0_60px_rgba(0,0,0,0.5)] z-0"></div>

      @php
         $wrapperClass = "absolute z-10 w-[7%] md:w-[7.5%] lg:w-[7.5%] aspect-square transform -translate-x-1/2 -translate-y-1/2";

         $btnClass = "w-full h-full flex items-center justify-center rounded-full bg-gray-500 hover:bg-gray-400 border-[3px] md:border-4 border-gray-300 text-gray-200 text-lg md:text-3xl lg:text-5xl font-bold shadow-[0_4px_0_0_#374151] active:translate-y-[4px] active:shadow-none transition-all text-outline cursor-pointer block";
      @endphp

      <div class="{{ $wrapperClass }}" style="top: 90.5%; left: 42.5%;">
         <button id="btn-level-1" onclick="pilihLevel(1)" class="{{ $btnClass }}">1</button>
      </div>
      <div class="{{ $wrapperClass }}" style="top: 83.7%; left: 28.7%;">
         <button id="btn-level-2" onclick="pilihLevel(2)" class="{{ $btnClass }}">2</button>
      </div>
      <div class="{{ $wrapperClass }}" style="top: 77.5%; left: 37%;">
         <button id="btn-level-3" onclick="pilihLevel(3)" class="{{ $btnClass }}">3</button>
      </div>
      <div class="{{ $wrapperClass }}" style="top: 75.5%; left: 71.7%;">
         <button id="btn-level-4" onclick="pilihLevel(4)" class="{{ $btnClass }}">4</button>
      </div>
      <div class="{{ $wrapperClass }}" style="top: 71%; left: 84.5%;">
         <button id="btn-level-5" onclick="pilihLevel(5)" class="{{ $btnClass }}">5</button>
      </div>
      <div class="{{ $wrapperClass }}" style="top: 62%; left: 77.3%;">
         <button id="btn-level-6" onclick="pilihLevel(6)" class="{{ $btnClass }}">6</button>
      </div>
      <div class="{{ $wrapperClass }}" style="top: 58%; left: 52%;">
         <button id="btn-level-7" onclick="pilihLevel(7)" class="{{ $btnClass }}">7</button>
      </div>
      <div class="{{ $wrapperClass }}" style="top: 56.5%; left: 25.5%;">
         <button id="btn-level-8" onclick="pilihLevel(8)" class="{{ $btnClass }}">8</button>
      </div>
      <div class="{{ $wrapperClass }}" style="top: 48.5%; left: 22.8%;">
         <button id="btn-level-9" onclick="pilihLevel(9)" class="{{ $btnClass }}">9</button>
      </div>
      <div class="{{ $wrapperClass }}" style="top: 45%; left: 35%;">
         <button id="btn-level-10" onclick="pilihLevel(10)" class="{{ $btnClass }}">10</button>
      </div>
      <div class="{{ $wrapperClass }}" style="top: 47%; left: 50%;">
         <button id="btn-level-11" onclick="pilihLevel(11)" class="{{ $btnClass }}">11</button>
      </div>
      <div class="{{ $wrapperClass }}" style="top: 46%; left: 64%;">
         <button id="btn-level-12" onclick="pilihLevel(12)" class="{{ $btnClass }}">12</button>
      </div>
      <div class="{{ $wrapperClass }}" style="top: 40%; left: 76%;">
         <button id="btn-level-13" onclick="pilihLevel(13)" class="{{ $btnClass }}">13</button>
      </div>
      <div class="{{ $wrapperClass }}" style="top: 37.5%; left: 64%;">
         <button id="btn-level-14" onclick="pilihLevel(14)" class="{{ $btnClass }}">14</button>
      </div>
      <div class="{{ $wrapperClass }}" style="top: 34.5%; left: 50%;">
         <button id="btn-level-15" onclick="pilihLevel(15)" class="{{ $btnClass }}">15</button>
      </div>
      <div class="{{ $wrapperClass }}" style="top: 31%; left: 37%;">
         <button id="btn-level-16" onclick="pilihLevel(16)" class="{{ $btnClass }}">16</button>
      </div>
      <div class="{{ $wrapperClass }}" style="top: 25.3%; left: 34.5%;">
         <button id="btn-level-17" onclick="pilihLevel(17)" class="{{ $btnClass }}">17</button>
      </div>
      <div class="{{ $wrapperClass }}" style="top: 24.5%; left: 51%;">
         <button id="btn-level-18" onclick="pilihLevel(18)" class="{{ $btnClass }}">18</button>
      </div>
      <div class="{{ $wrapperClass }}" style="top: 21%; left: 62%;">
         <button id="btn-level-19" onclick="pilihLevel(19)" class="{{ $btnClass }}">19</button>
      </div>
      <div class="{{ $wrapperClass }}" style="top: 17.5%; left: 50%;">
         <button id="btn-level-20" onclick="pilihLevel(20)" class="{{ $btnClass }}">20</button>
      </div>
   </div>

   <script>
      document.addEventListener('DOMContentLoaded', () => {
         const currentLang = localStorage.getItem('jumpjump_language');

         if (!currentLang) {
            window.location.href = '/';
            return;
         }

         const storageKey = `jumpjump_highest_level_${currentLang.toUpperCase()}`;
         let highestLevel = parseInt(localStorage.getItem(storageKey)) || 1;

         for (let i = 1; i <= 20; i++) {
            const btn = document.getElementById(`btn-level-${i}`);

            if (btn) {
                if (i <= highestLevel) {
                    btn.style.cursor = "pointer";
                    btn.classList.remove('bg-gray-500', 'hover:bg-gray-400', 'border-gray-300', 'text-gray-200', 'shadow-[0_4px_0_0_#374151]');
                    btn.classList.add('bg-[#ff6b4a]', 'hover:bg-[#ff522c]', 'border-[#ffb39e]', 'text-white', 'shadow-[0_4px_0_0_#b52a10]');
                } else {
                    btn.style.cursor = "not-allowed";
                    btn.classList.remove('bg-[#ff6b4a]', 'hover:bg-[#ff522c]', 'border-[#ffb39e]', 'text-white', 'shadow-[0_4px_0_0_#b52a10]');
                    btn.classList.add('bg-gray-500', 'hover:bg-gray-400', 'border-gray-300', 'text-gray-200', 'shadow-[0_4px_0_0_#374151]');

                    btn.onclick = (e) => {
                        e.preventDefault();
                        window.showCustomAlert('Level masih terkunci!', 'warning');
                    };
                }
            }
         }
      });

      window.onload = () => {
         setTimeout(() => {
             window.scrollTo({
                 top: document.body.scrollHeight,
                 behavior: 'smooth'
             });
         }, 100);
      };

      async function pilihLevel(level) {
         const selectedLang = localStorage.getItem("jumpjump_language") || "C++";
         const storageKey = `jumpjump_highest_level_${selectedLang.toUpperCase()}`;
         let highestLevel = parseInt(localStorage.getItem(storageKey)) || 1;

         if (level > highestLevel) {
            return window.showCustomAlert(`STAGE TERKUNCI! Selesaikan stage sebelumnya.`, 'warning');
         }

         try {
            let response = await fetch(`/check-stage/${selectedLang}/${level}`);
            let data = await response.json();

            if (data.exists) {
               window.location.href = `/quiz/${selectedLang}/${level}`;
            } else {
               window.showCustomAlert(`Stage ${level} untuk ${selectedLang} belum dibuat!`, 'error');
            }
         } catch (error) {
            window.showCustomAlert("Terjadi kesalahan koneksi sistem.", 'error');
         }
      }
   </script>
</body>
</html>
