d<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stage {{ $level }} - JUMPJUMP.CODE</title>
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'VT323', monospace; }
        /* Efek garis kedip khas game retro */
        .scanlines::before {
            content: " ";
            display: block;
            position: absolute;
            top: 0; left: 0; bottom: 0; right: 0;
            background: linear-gradient(rgba(18, 16, 16, 0) 50%, rgba(0, 0, 0, 0.25) 50%), linear-gradient(90deg, rgba(255, 0, 0, 0.06), rgba(0, 255, 0, 0.02), rgba(0, 0, 255, 0.06));
            z-index: 50; background-size: 100% 2px, 3px 100%; pointer-events: none;
        }
    </style>
</head>
<body class="bg-gray-900 h-screen w-screen overflow-hidden flex flex-col relative scanlines">
    <x-alert />

    <!-- TOP BAR: Status Pemain -->
    <div class="h-16 md:h-20 bg-gray-800 border-b-4 border-gray-950 flex items-center justify-between px-6 shadow-md z-10">
        <a href="/map" class="text-white hover:text-red-400 text-2xl tracking-widest transition-colors cursor-pointer text-shadow">&larr; RUN (ESCAPE)</a>

        <div class="flex items-center gap-6">
            <div class="bg-gray-900 border-2 border-gray-600 px-4 py-1 rounded text-yellow-400 text-xl tracking-widest">
                STAGE <span class="text-white">{{ $level }}</span>
            </div>
            <!-- Render bahasa langsung dari Laravel -->
            <div class="bg-blue-900 border-2 border-blue-500 px-4 py-1 rounded text-blue-100 text-xl tracking-widest uppercase">
                {{ $language }}
            </div>
        </div>
    </div>

    <!-- AREA VISUAL (Atas): Tempat menaruh karakter/musuh nantinya -->
    <div class="flex-1 bg-gradient-to-b from-gray-700 to-gray-900 flex items-end justify-center pb-10 relative">
        <div class="w-32 h-32 bg-gray-500 rounded-full animate-bounce opacity-20 border-4 border-dashed border-gray-400 flex items-center justify-center text-gray-300 text-center">
            (Area Animasi Karakter)
        </div>
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
                <!-- Looping opsi JSON dari Database -->
                @foreach($question->options as $index => $opsi)
                <label class="flex items-center p-3 border-2 border-gray-600 bg-gray-800 hover:bg-gray-700 cursor-pointer group rounded transition-colors">
                    <!-- Value radio button menggunakan angka index (0, 1, 2, 3) -->
                    <input type="radio" name="jawaban" value="{{ $index }}" class="hidden peer">
                    <div class="w-5 h-5 border-2 border-gray-400 peer-checked:bg-red-500 peer-checked:border-red-500 flex items-center justify-center mr-3 flex-shrink-0 rounded-sm transition-all"></div>
                    <span class="text-xl md:text-2xl text-gray-200 group-hover:text-white tracking-widest">{{ $opsi }}</span>
                </label>
                @endforeach
            </div>

            <!-- Tombol Execute/Lock -->
            <button onclick="lockAnswer()" class="mt-4 w-full bg-[#ff6b4a] hover:bg-[#ff522c] border-4 border-[#ffb39e] text-white text-2xl md:text-3xl py-2 rounded shadow-[0_4px_0_0_#b52a10] active:translate-y-[4px] active:shadow-none transition-all tracking-widest cursor-pointer uppercase">
                EXECUTE CODE
            </button>
        </div>

    </div>

    <script>
    // Ambil kunci jawaban (index array) dari Database
    const kunciJawaban = "{{ $question->correct_answer }}";
    const currentLevel = {{ $level }};
    const selectedLang = "{{ $language }}";

    function lockAnswer() {
        const selectedOption = document.querySelector('input[name="jawaban"]:checked');

        // JIKA BELUM MEMILIH
        if (!selectedOption) {
            return showCustomAlert("Pilih aksi di Action Menu terlebih dahulu!", "warning");
        }

        // JIKA JAWABAN BENAR
        if (selectedOption.value === kunciJawaban) {
            showCustomAlert("BENAR! Code Executed Perfectly.", "success");

            const storageKey = `jumpjump_highest_level_${selectedLang}`;
            let highestLevel = parseInt(localStorage.getItem(storageKey)) || 1;

            if(currentLevel >= highestLevel) {
                localStorage.setItem(storageKey, currentLevel + 1);
            }

            // Beri jeda 1.5 detik agar pemain bisa melihat pesan "BENAR!" sebelum pindah peta
            setTimeout(() => {
                window.location.href = '/map';
            }, 1500);

        } else {
            // JIKA JAWABAN SALAH
            showCustomAlert("SALAH! Syntax Incorrect.", "error");
        }
    }
    </script>
    </script>
</body>
</html>
