<!DOCTYPE html>
<html lang="id">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Stage {{ $level }} - JUMPJUMP.CODE</title>
   <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
   @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-900 h-screen w-screen overflow-hidden flex flex-col relative scanlines">
   <x-alert />
   <!-- MODAL GAME OVER tersembunyi -->
   <div id="gameOverModal" class="fixed inset-0 z-[99999] hidden flex items-center justify-center bg-black bg-opacity-90 backdrop-blur-sm transition-opacity">
      <div class="bg-gray-900 border-4 border-red-600 rounded-xl p-8 max-w-2xl w-full mx-4 shadow-[0_0_30px_rgba(220,38,38,0.5)] transform scale-90 transition-transform duration-300 flex flex-col items-center text-center">
         <h2 class="text-5xl md:text-6xl text-red-500 mb-2 animate-pulse tracking-widest text-shadow">SYSTEM FAILURE</h2>
         <div class="text-3xl text-yellow-400 mb-6 tracking-widest">GAME OVER!</div>

         <div class="bg-black border-2 border-gray-700 w-full p-4 rounded mb-8 text-left">
            <span class="text-gray-500 text-lg block mb-2">> Analisis Error:</span>
            <p id="gameOverText" class="text-xl md:text-2xl text-green-400 font-mono leading-relaxed">
               <!-- Penjelasan akan di-inject lewat JS -->
            </p>
         </div>

         <button onclick="returnToMap()" class="bg-red-700 hover:bg-red-600 text-white border-4 border-red-400 px-8 py-3 rounded text-2xl tracking-widest shadow-[0_4px_0_0_#7f1d1d] active:translate-y-[4px] active:shadow-none transition-all uppercase">
            REBOOT SYSTEM (Back to Map)
         </button>
      </div>
   </div>

   <!-- TOP BAR: Status Pemain -->
   <div class="h-16 md:h-20 bg-gray-800 border-b-4 border-gray-950 flex items-center justify-between px-6 shadow-md z-10">
      <a href="/map" class="text-white hover:text-red-400 text-2xl tracking-widest transition-colors cursor-pointer text-shadow">&larr; RUN (ESCAPE)</a>

      <div class="flex items-center gap-6">
         <!-- UI Nyawa (HP) -->
         <div id="hpContainer" class="bg-gray-900 border-2 border-red-900 px-3 py-1 rounded text-xl flex gap-1 shadow-inner items-center">
            <!-- Hati akan di-render lewat JavaScript -->
         </div>

         <div class="bg-gray-900 border-2 border-gray-600 px-4 py-1 rounded text-yellow-400 text-xl tracking-widest">
            STAGE <span class="text-white">{{ $level }}</span>
         </div>
         <div class="bg-blue-900 border-2 border-blue-500 px-4 py-1 rounded text-blue-100 text-xl tracking-widest uppercase">
            {{ $language }}
         </div>
      </div>
   </div>

   <!-- AREA VISUAL (Atas): Arena Pertarungan -->
   <div class="flex-1 bg-gradient-to-b from-gray-800 to-gray-950 relative overflow-hidden flex items-end border-b-8 border-gray-900">
      <!-- Background Grid Retro -->
      <div class="absolute inset-0 opacity-20 bg-[linear-gradient(rgba(255,255,255,0.1)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.1)_1px,transparent_1px)] bg-[size:40px_40px]"></div>

      <!-- JUMP HERO (Karakter Pemain) -->
      <div id="jumpHero" class="absolute left-[10%] md:left-[20%] bottom-8 w-14 h-14 md:w-16 md:h-16 bg-blue-500 border-4 border-white shadow-[0_0_20px_rgba(59,130,246,0.8)] rounded-lg flex items-center justify-center transition-all duration-500 z-10">
         <!-- Mata Hero -->
         <div class="flex gap-2 mb-2">
            <div class="w-2 h-4 bg-white rounded-full"></div>
            <div class="w-2 h-4 bg-white rounded-full"></div>
         </div>
      </div>

      <!-- BUG ENEMY (Musuh / Error) -->
      <div id="bugEnemy" class="absolute right-[10%] md:right-[20%] bottom-8 w-14 h-14 md:w-16 md:h-16 bg-red-600 border-4 border-red-300 shadow-[0_0_20px_rgba(220,38,38,0.8)] rounded-full flex flex-col items-center justify-center transition-all duration-300 animate-pulse z-10">
         <!-- Mata Marah -->
         <div class="flex gap-2 mt-1">
            <div class="w-4 h-1.5 bg-black rotate-45 transform origin-right rounded"></div>
            <div class="w-4 h-1.5 bg-black -rotate-45 transform origin-left rounded"></div>
         </div>
         <!-- Mulut -->
         <div class="w-6 h-2 border-b-4 border-black rounded-full mt-1"></div>
      </div>

      <!-- Lantai Tempat Berdiri -->
      <div class="absolute bottom-0 left-0 w-full h-8 bg-gray-800 border-t-4 border-gray-600 z-0"></div>
   </div>

   <!-- AREA INTERAKSI (Bawah): Kotak Dialog & Pilihan -->
   <div class="h-[45vh] bg-gray-800 border-t-8 border-gray-950 p-4 md:p-6 flex flex-col md:flex-row gap-4">

      <!-- Kotak Pertanyaan (Kiri) -->
      <div class="md:w-1/2 bg-blue-950 border-4 border-gray-300 rounded-xl p-6 relative shadow-inner">
         <span class="absolute -top-4 left-6 bg-gray-300 text-gray-900 px-3 py-0.5 text-lg font-bold rounded-sm border-2 border-gray-800">
            ENEMY ATTACK!
         </span>
         <!-- Render pertanyaan langsung dari Database -->
         <h2 class="text-2xl md:text-4xl text-white mt-2 leading-relaxed tracking-wide">
            {{ $question->question_text }}
         </h2>
      </div>

      <!-- Kotak Pilihan Jawaban (Kanan) -->
      <div class="md:w-1/2 bg-gray-900 border-4 border-gray-300 rounded-xl p-4 relative flex flex-col">
         <span class="absolute -top-4 left-6 bg-gray-300 text-gray-900 px-3 py-0.5 text-lg font-bold rounded-sm border-2 border-gray-800">
            ACTION MENU
         </span>

         <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-3 mt-4 overflow-y-auto pr-2">

            @if($question->options)
            <!-- MODE 1: PILIHAN GANDA -->
            @foreach($question->options as $index => $opsi)
            <label class="flex items-center p-3 border-2 border-gray-600 bg-gray-800 hover:bg-gray-700 cursor-pointer group rounded transition-colors">
               <input type="radio" name="jawaban" value="{{ $index }}" class="hidden peer">
               <div class="w-5 h-5 border-2 border-gray-400 peer-checked:bg-red-500 peer-checked:border-red-500 flex items-center justify-center mr-3 flex-shrink-0 rounded-sm transition-all"></div>
               <span class="text-xl md:text-2xl text-gray-200 group-hover:text-white tracking-widest">{{ $opsi }}</span>
            </label>
            @endforeach
            @else
            <!-- MODE 2: TERMINAL INPUT KODE -->
            <div class="col-span-1 md:col-span-2 flex flex-col items-center justify-center h-full p-4">
               <p class="text-gray-400 text-lg mb-2 text-center w-full">>> Tulis kodemu di bawah ini <<< /p>
                     <div class="flex items-center w-full bg-black border-2 border-green-500 p-4 rounded shadow-[0_0_15px_rgba(34,197,94,0.2)]">
                        <span class="text-green-500 text-3xl mr-4 animate-pulse">_></span>
                        <input type="text" id="inputKode" class="bg-transparent border-none text-green-400 text-3xl w-full focus:outline-none font-mono tracking-widest placeholder-green-900" placeholder="Ketik syntax..." autocomplete="off" spellcheck="false" autofocus>
                     </div>
            </div>
            @endif

         </div>

         <!-- Tombol Execute/Lock -->
         <button onclick="lockAnswer()" class="mt-4 w-full bg-[#ff6b4a] hover:bg-[#ff522c] border-4 border-[#ffb39e] text-white text-2xl md:text-3xl py-2 rounded shadow-[0_4px_0_0_#b52a10] active:translate-y-[4px] active:shadow-none transition-all tracking-widest cursor-pointer uppercase">
            EXECUTE CODE
         </button>
      </div>

   </div>

   <script>
      // PERBAIKAN 1: Pastikan penulisan kurung kurawal Blade sejajar tanpa spasi di tengahnya
      const kunciJawaban = "{{ $question->correct_answer }}";
      const currentLevel = parseInt("{{ $level }}");
      const selectedLang = "{{ $language }}";
      const isInputMode = {{ empty($question->options) ? 'true' : 'false' }};
      const penjelasanSoal = @json($question->penjelasan);

      // LOGIKA SISTEM NYAWA (HP)
      // HP sekarang unik per bahasa (Misal: main HTML nyawa habis, main Python nyawa masih penuh)
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
               hearts += `<span class="text-red-500 drop-shadow-[0_0_5px_rgba(239,68,68,0.8)]">♥</span>`;
            } else {
               hearts += `<span class="text-gray-700">♥</span>`;
            }
         }
         hpContainer.innerHTML = hearts;
      }

      renderHp();

      // LOGIKA PENGECEKAN JAWABAN
      function lockAnswer() {
         let jawabanPemain = "";

         if (isInputMode) {
            const inputElem = document.getElementById('inputKode');
            if (!inputElem || inputElem.value.trim() === "") {
               return window.showCustomAlert("Ketik kode di terminal terlebih dahulu!", "warning");
            }
            jawabanPemain = inputElem.value.trim();
         } else {
            const selectedOption = document.querySelector('input[name="jawaban"]:checked');
            if (!selectedOption) {
               return window.showCustomAlert("Pilih aksi di Action Menu terlebih dahulu!", "warning");
            }
            jawabanPemain = selectedOption.value;
         }

         const hero = document.getElementById('jumpHero');
         const enemy = document.getElementById('bugEnemy');

         // CEK KONDISI JAWABAN
         if (jawabanPemain === kunciJawaban) {
            // ANIMASI JIKA BENAR (HERO MENYERANG)
            hero.classList.remove('bg-blue-500', 'shadow-[0_0_20px_rgba(59,130,246,0.8)]');
            hero.classList.add('bg-yellow-400', 'shadow-[0_0_30px_rgba(250,204,21,1)]', '-translate-y-32', 'scale-125', 'rotate-[360deg]');

            setTimeout(() => {
               hero.classList.remove('-translate-y-32');
               hero.classList.add('translate-x-[50vw]');

               enemy.classList.remove('bg-red-600', 'animate-pulse');
               enemy.classList.add('bg-gray-800', 'scale-y-0', 'opacity-0');
            }, 400);

            // Jalankan Alert setelah animasi jalan
            setTimeout(() => {
               window.showCustomAlert("BENAR! Code Executed Perfectly.", "success");

               // Ambil bahasa dari Local Storage agar 100% sama dengan yang dipakai Map
               const currentLang = localStorage.getItem('jumpjump_language') || selectedLang;

               // Gunakan toUpperCase() agar seragam
               const storageKey = `jumpjump_highest_level_${currentLang.toUpperCase()}`;

               let highestLevel = parseInt(localStorage.getItem(storageKey)) || 1;

               if (currentLevel >= highestLevel) {
                  localStorage.setItem(storageKey, currentLevel + 1);
               }

               setTimeout(() => window.location.href = '/map', 1800);
            }, 600);

         } else {
            // ANIMASI JIKA SALAH (ENEMY MENYERANG)
            enemy.classList.add('-translate-x-[50vw]', 'scale-125');

            setTimeout(() => {
               hero.classList.remove('bg-blue-500');
               hero.classList.add('bg-red-600', 'animate-ping', '-translate-x-4');

               setTimeout(() => {
                  hero.classList.remove('bg-red-600', 'animate-ping', '-translate-x-4');
                  hero.classList.add('bg-blue-500');
                  enemy.classList.remove('-translate-x-[50vw]', 'scale-125');
               }, 500);
            }, 200);

            currentHp--;
            localStorage.setItem(hpKey, currentHp);
            renderHp();

            if (currentHp <= 0) {
               const teksPenjelasan = penjelasanSoal ? penjelasanSoal : "Pelajari lagi sintaks dasarnya.";
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
               window.showCustomAlert(`SALAH! Syntax Incorrect. Sisa Nyawa: ${currentHp}`, "error");
            }
         }
      }

      function returnToMap() {
         window.location.href = '/map';
      }
   </script>
</body>
</html>
