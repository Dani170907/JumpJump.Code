<!DOCTYPE html>
<html lang="id">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Peta Level - JUMPJUMP.CODE</title>
   <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
   @vite(['resources/css/app.css', 'resources/js/app.js'])
   <style>
      body {
         font-family: 'VT323', monospace;
         scrollbar-width: thin;
         scrollbar-color: #ef4444 #1f2937;
         overflow-x: hidden;
      }
      body::-webkit-scrollbar { width: 12px; }
      body::-webkit-scrollbar-track { background: #1f2937; }
      body::-webkit-scrollbar-thumb { background-color: #ef4444; border-radius: 6px; }

      .text-outline {
         text-shadow: 2px 0 #000, -2px 0 #000, 0 2px #000, 0 -2px #000, 1px 1px #000, -1px -1px #000, 1px -1px #000, -1px 1px #000;
      }

      /* ========================================= */
      /* 1. EFEK KERAMAIAN LINGKUNGAN RETRO       */
      /* ========================================= */

      .scanlines {
         position: fixed; inset: 0; z-index: 60; pointer-events: none;
         background: linear-gradient(rgba(18, 16, 16, 0) 50%, rgba(0, 0, 0, 0.1) 50%);
         background-size: 100% 4px;
         opacity: 0.8;
      }

      @keyframes floatUp {
         0% { transform: translateY(110vh) rotate(0deg); opacity: 0; }
         10% { opacity: 1; }
         90% { opacity: 1; }
         100% { transform: translateY(-10vh) rotate(360deg); opacity: 0; }
      }
      .pixel-dust { position: absolute; animation: floatUp linear infinite; z-index: 1; pointer-events: none; }

      /* C. Garis JALUR BARU: LENGKUNG, SANGAT KECIL, PUTUS-PUTUS HALUS */
      @keyframes pathPulse {
         0%, 100% { stroke-opacity: 0.6; filter: drop-shadow(0 0 2px #ffb39e); }
         50% { stroke-opacity: 0.8; filter: drop-shadow(0 0 8px #ffb39e); }
      }
      .active-path {
         stroke: #ffb39e;
         /* PERBAIKAN: Sangat Kecil (1.5) */
         stroke-width: 1.5;
         /* PERBAIKAN: Putus-putus kecil & rapat */
         stroke-dasharray: 3, 3;
         fill: none;
         /* Denyut Samar */
         animation: pathPulse 2s ease-in-out infinite;
         stroke-linecap: round;
      }
      .locked-path {
         stroke: #4b5563;
         stroke-width: 1;
         stroke-dasharray: 2, 4;
         fill: none;
         stroke-opacity: 0.3;
      }

      @keyframes nodeGlow {
         0%, 100% { transform: translate(-50%, -50%) scale(1); opacity: 0.2; }
         50% { transform: translate(-50%, -50%) scale(1.3); opacity: 0.5; }
      }
      .unlocked-node-glow {
         position: absolute; top: 50%; left: 50%; z-index: 5;
         width: 140%; height: 140%; border-radius: 50%;
         background: radial-gradient(circle, #ffb39e 0%, transparent 70%);
         pointer-events: none;
         animation: nodeGlow 3s ease-in-out infinite;
      }

      /* ========================================= */
      /* 2. ANIMASI KARAKTER (Robot)               */
      /* ========================================= */
      @keyframes hoverRobot {
         0%, 100% { transform: translateY(0px) rotate(0deg); }
         50% { transform: translateY(-8px) rotate(2deg); }
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

      .anim-robot-body { animation: hoverRobot 2.5s ease-in-out infinite; }
      .anim-blink { animation: blink 4s infinite; }
      .anim-antenna { animation: antennaTwitch 5s infinite; transform-origin: bottom center; }

      @keyframes arcJump {
         0% { margin-top: 0; }
         50% { margin-top: -80px; }
         100% { margin-top: 0; }
      }
      .is-jumping { animation: arcJump 0.6s cubic-bezier(0.25, 1, 0.5, 1); }
      #mapHero { transition: top 0.6s ease-in-out, left 0.6s ease-in-out, opacity 0.3s ease; }
   </style>
</head>
<body class="bg-gray-900 m-0 p-0 overflow-auto relative">

   <div class="scanlines"></div>

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

   <div class="fixed top-4 left-4 md:top-6 md:left-8 z-[70]">
       <a href="/" class="bg-red-500 hover:bg-red-600 border-4 border-red-800 text-white px-4 py-1 md:px-6 md:py-2 rounded-full text-lg md:text-2xl shadow-[0_4px_0_0_#b52a10] active:translate-y-[4px] active:shadow-none transition-all text-outline cursor-pointer block">
          &larr; BACK
       </a>
   </div>

   <div id="mapContainer" class="relative w-[150%] sm:w-[150%] md:w-full mx-auto overflow-hidden">

      <div class="absolute inset-0 z-1 pointer-events-none">
          <div class="pixel-dust bg-white w-2 h-2 left-[10%]" style="animation-duration: 8s; animation-delay: 0s;"></div>
          <div class="pixel-dust bg-[#ffb39e] w-3 h-3 left-[25%]" style="animation-duration: 12s; animation-delay: 2s;"></div>
          <div class="pixel-dust bg-white w-1.5 h-1.5 left-[45%]" style="animation-duration: 6s; animation-delay: 5s;"></div>
          <div class="pixel-dust bg-[#38BDF8] w-2.5 h-2.5 left-[65%]" style="animation-duration: 10s; animation-delay: 1s;"></div>
          <div class="pixel-dust bg-[#fbbf24] w-2 h-2 left-[85%]" style="animation-duration: 9s; animation-delay: 4s;"></div>
          <div class="pixel-dust bg-white w-4 h-4 left-[50%]" style="animation-duration: 15s; animation-delay: 7s;"></div>
      </div>

      <img src="{{ asset('images/map-level.png') }}" class="relative w-full h-auto block z-2" alt="Map Level">

      <div class="absolute inset-0 pointer-events-none shadow-[inset_0_0_60px_rgba(0,0,0,0.5)] z-3"></div>

      <svg id="pathLayer" class="absolute inset-0 z-5 w-full h-full pointer-events-none" viewBox="0 0 100 100" preserveAspectRatio="none">
         </svg>

      <div id="mapHero" class="absolute z-50 pointer-events-none flex flex-col items-center opacity-0" style="transform: translate(-50%, -110%) scale(0.35); transform-origin: bottom center; top: 90.5%; left: 42.5%;">
         <div class="anim-robot-body flex flex-col items-center drop-shadow-2xl">
             <div class="anim-antenna flex flex-col items-center">
                 <div class="w-5 h-5 md:w-6 md:h-6 bg-yellow-400 rounded-full border-2 border-yellow-600 shadow-[0_0_10px_yellow] z-10 -mb-1"></div>
                 <div class="w-2 h-8 md:w-2 md:h-10 bg-gray-400 border-x-2 border-gray-600"></div>
             </div>
             <div class="w-32 h-24 md:w-40 md:h-28 bg-[#38BDF8] border-8 border-gray-800 rounded-xl relative shadow-inner flex flex-col items-center justify-center overflow-hidden z-20">
                 <div class="absolute top-0 -left-6 w-[200%] h-1/2 bg-white opacity-20 transform -rotate-12 pointer-events-none"></div>
                 <div class="flex gap-4 mb-1 z-10 anim-blink">
                    <div class="w-4 h-8 bg-white border-4 border-blue-900 rounded-sm"></div>
                    <div class="w-4 h-8 bg-white border-4 border-blue-900 rounded-sm"></div>
                 </div>
             </div>
             <div class="w-16 h-4 md:w-20 md:h-6 bg-gray-600 border-x-4 border-gray-800 z-10"></div>
             <div class="w-24 h-12 md:w-28 md:h-14 bg-gray-800 border-4 border-gray-900 rounded-b-xl flex items-center justify-between px-3 z-10">
                 <div class="w-5 h-7 md:w-6 md:h-8 bg-gray-400 rounded-full border-2 border-gray-200"></div>
                 <div class="w-5 h-7 md:w-6 md:h-8 bg-gray-400 rounded-full border-2 border-gray-200"></div>
             </div>
         </div>
         <div class="w-24 h-4 bg-black rounded-full mt-2 blur-[2px] opacity-60"></div>
      </div>

      @php
         $wrapperClass = "absolute z-10 w-[7%] md:w-[7.5%] lg:w-[7.5%] aspect-square transform -translate-x-1/2 -translate-y-1/2";
         $btnClass = "relative w-full h-full flex items-center justify-center rounded-full bg-gray-500 hover:bg-gray-400 border-[3px] md:border-4 border-gray-300 text-gray-200 text-lg md:text-3xl lg:text-5xl font-bold shadow-[0_4px_0_0_#374151] active:translate-y-[4px] active:shadow-none transition-all text-outline cursor-pointer block z-10";
      @endphp

      <div id="node-1" class="{{ $wrapperClass }}" style="top: 90.5%; left: 42.5%;">
         <button id="btn-level-1" onclick="pilihLevel(1)" class="{{ $btnClass }}">1</button>
      </div>
      <div id="node-2" class="{{ $wrapperClass }}" style="top: 83.7%; left: 28.7%;">
         <button id="btn-level-2" onclick="pilihLevel(2)" class="{{ $btnClass }}">2</button>
      </div>
      <div id="node-3" class="{{ $wrapperClass }}" style="top: 77.5%; left: 37%;">
         <button id="btn-level-3" onclick="pilihLevel(3)" class="{{ $btnClass }}">3</button>
      </div>
      <div id="node-4" class="{{ $wrapperClass }}" style="top: 75.5%; left: 71.7%;">
         <button id="btn-level-4" onclick="pilihLevel(4)" class="{{ $btnClass }}">4</button>
      </div>
      <div id="node-5" class="{{ $wrapperClass }}" style="top: 71%; left: 84.5%;">
         <button id="btn-level-5" onclick="pilihLevel(5)" class="{{ $btnClass }}">5</button>
      </div>
      <div id="node-6" class="{{ $wrapperClass }}" style="top: 62%; left: 77.3%;">
         <button id="btn-level-6" onclick="pilihLevel(6)" class="{{ $btnClass }}">6</button>
      </div>
      <div id="node-7" class="{{ $wrapperClass }}" style="top: 58%; left: 52%;">
         <button id="btn-level-7" onclick="pilihLevel(7)" class="{{ $btnClass }}">7</button>
      </div>
      <div id="node-8" class="{{ $wrapperClass }}" style="top: 56.5%; left: 25.5%;">
         <button id="btn-level-8" onclick="pilihLevel(8)" class="{{ $btnClass }}">8</button>
      </div>
      <div id="node-9" class="{{ $wrapperClass }}" style="top: 48.5%; left: 22.8%;">
         <button id="btn-level-9" onclick="pilihLevel(9)" class="{{ $btnClass }}">9</button>
      </div>
      <div id="node-10" class="{{ $wrapperClass }}" style="top: 45%; left: 35%;">
         <button id="btn-level-10" onclick="pilihLevel(10)" class="{{ $btnClass }}">10</button>
      </div>
      <div id="node-11" class="{{ $wrapperClass }}" style="top: 47%; left: 50%;">
         <button id="btn-level-11" onclick="pilihLevel(11)" class="{{ $btnClass }}">11</button>
      </div>
      <div id="node-12" class="{{ $wrapperClass }}" style="top: 46%; left: 64%;">
         <button id="btn-level-12" onclick="pilihLevel(12)" class="{{ $btnClass }}">12</button>
      </div>
      <div id="node-13" class="{{ $wrapperClass }}" style="top: 40%; left: 76%;">
         <button id="btn-level-13" onclick="pilihLevel(13)" class="{{ $btnClass }}">13</button>
      </div>
      <div id="node-14" class="{{ $wrapperClass }}" style="top: 37.5%; left: 64%;">
         <button id="btn-level-14" onclick="pilihLevel(14)" class="{{ $btnClass }}">14</button>
      </div>
      <div id="node-15" class="{{ $wrapperClass }}" style="top: 34.5%; left: 50%;">
         <button id="btn-level-15" onclick="pilihLevel(15)" class="{{ $btnClass }}">15</button>
      </div>
      <div id="node-16" class="{{ $wrapperClass }}" style="top: 31%; left: 37%;">
         <button id="btn-level-16" onclick="pilihLevel(16)" class="{{ $btnClass }}">16</button>
      </div>
      <div id="node-17" class="{{ $wrapperClass }}" style="top: 25.3%; left: 34.5%;">
         <button id="btn-level-17" onclick="pilihLevel(17)" class="{{ $btnClass }}">17</button>
      </div>
      <div id="node-18" class="{{ $wrapperClass }}" style="top: 24.5%; left: 51%;">
         <button id="btn-level-18" onclick="pilihLevel(18)" class="{{ $btnClass }}">18</button>
      </div>
      <div id="node-19" class="{{ $wrapperClass }}" style="top: 21%; left: 62%;">
         <button id="btn-level-19" onclick="pilihLevel(19)" class="{{ $btnClass }}">19</button>
      </div>
      <div id="node-20" class="{{ $wrapperClass }}" style="top: 17.5%; left: 50%;">
         <button id="btn-level-20" onclick="pilihLevel(20)" class="{{ $btnClass }}">20</button>
      </div>
   </div>

   <script>
      let currentPositionLevel = 1;

      // ===================================================
      // PERBAIKAN JAVASCRIPT: Ganti Garis Lurus (line) dengan Jalur Lengkung (path)
      // ===================================================
      function drawMapPaths(highestLevel) {
          const svg = document.getElementById('pathLayer');
          svg.innerHTML = '';

          for(let i = 1; i < 20; i++) {
              const startNode = document.getElementById(`node-${i}`);
              const endNode = document.getElementById(`node-${i+1}`);

              if(startNode && endNode) {
                  const x1 = parseFloat(startNode.style.left);
                  const y1 = parseFloat(startNode.style.top);
                  const x2 = parseFloat(endNode.style.left);
                  const y2 = parseFloat(endNode.style.top);

                  // Ganti 'line' dengan 'path' untuk lekukan
                  const path = document.createElementNS('http://www.w3.org/2000/svg', 'path');

                  // Hitung koordinat lengkungan Cubic Bezier (Curved S-shape)
                  //offsetX digunakan untuk membuat lengkungan melingkar di antara dua titik
                  const offsetX = 10;

                  // Perhitungan jalur: M (Move to) P1, C (Cubic Bezier) P1+off, P2-off, P2
                  const d = `M ${x1} ${y1} C ${x1 + offsetX} ${y1}, ${x2 - offsetX} ${y2}, ${x2} ${y2}`;

                  path.setAttribute('d', d);

                  if(i < highestLevel) {
                      path.setAttribute('class', 'active-path');
                  } else {
                      path.setAttribute('class', 'locked-path');
                  }

                  svg.appendChild(path);
              }
          }
      }

      document.addEventListener('DOMContentLoaded', () => {
         const currentLang = localStorage.getItem('jumpjump_language');

         if (!currentLang) {
            window.location.href = '/';
            return;
         }

         const storageKey = `jumpjump_highest_level_${currentLang.toUpperCase()}`;
         let highestLevel = parseInt(localStorage.getItem(storageKey)) || 1;

         // 1. Gambar Jalur Lengkung SVG yang diperbarui
         drawMapPaths(highestLevel);

         currentPositionLevel = highestLevel;
         const hero = document.getElementById('mapHero');
         const startNode = document.getElementById(`node-${highestLevel}`);

         if(startNode) {
             hero.style.transition = 'none';
             hero.style.top = startNode.style.top;
             hero.style.left = startNode.style.left;

             setTimeout(() => {
                 hero.style.transition = 'top 0.6s ease-in-out, left 0.6s ease-in-out, opacity 0.3s ease';
                 hero.style.opacity = '1';
             }, 50);
         }

         for (let i = 1; i <= 20; i++) {
            const btn = document.getElementById(`btn-level-${i}`);
            const nodeWrapper = document.getElementById(`node-${i}`);

            if (btn && nodeWrapper) {
                if (i <= highestLevel) {
                    btn.style.cursor = "pointer";
                    btn.classList.remove('bg-gray-500', 'hover:bg-gray-400', 'border-gray-300', 'text-gray-200', 'shadow-[0_4px_0_0_#374151]');
                    btn.classList.add('bg-[#ff6b4a]', 'hover:bg-[#ff522c]', 'border-[#ffb39e]', 'text-white', 'shadow-[0_4px_0_0_#b52a10]');

                    const glow = document.createElement('div');
                    glow.className = 'unlocked-node-glow';
                    nodeWrapper.appendChild(glow);

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
             const targetNode = document.getElementById(`node-${currentPositionLevel}`);
             if (targetNode) {
                 targetNode.scrollIntoView({ behavior: 'smooth', block: 'center' });
             } else {
                 window.scrollTo({
                     top: document.body.scrollHeight,
                     behavior: 'smooth'
                 });
             }
         }, 300);
      };

      async function pilihLevel(level) {
         const selectedLang = localStorage.getItem("jumpjump_language") || "C++";
         const storageKey = `jumpjump_highest_level_${selectedLang.toUpperCase()}`;
         let highestLevel = parseInt(localStorage.getItem(storageKey)) || 1;

         if (level > highestLevel) {
            return window.showCustomAlert(`STAGE TERKUNCI! Selesaikan stage sebelumnya.`, 'warning');
         }

         const hero = document.getElementById('mapHero');
         const targetNode = document.getElementById(`node-${level}`);

         if (hero && targetNode) {
             hero.classList.add('is-jumping');
             hero.style.top = targetNode.style.top;
             hero.style.left = targetNode.style.left;
         }

         setTimeout(async () => {
             if (hero) hero.classList.remove('is-jumping');

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
         }, 600);
      }
   </script>
</body>
</html>
