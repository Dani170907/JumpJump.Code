<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>JUMPJUMP.CODE</title>
    <style>
        body {
            font-family: 'Press Start 2P', cursive;
        }
    </style>
</head>
<!-- MODAL POP-UP input nama -->
<div id="nameModal" class="fixed inset-0 z-50 flex items-center justify-center backdrop-blur-xs transition-opacity">

    <!-- Kotak Modal -->
    <div class="bg-white border-4 border-gray-800 rounded-2xl md:rounded-3xl p-6 md:p-10 w-[90%] max-w-lg text-center shadow-[8px_8px_0_0_rgba(0,0,0,0.7)] md:shadow-[12px_12px_0_0_rgba(0,0,0,0.7)] transform scale-100 transition-transform duration-300 relative">

        <!-- Tombol Close -->
        <button onclick="closeModal()" class="absolute top-2 right-4 md:top-4 md:right-6 text-gray-500 hover:text-red-500 text-2xl md:text-3xl font-bold cursor-pointer">
            &times;
        </button>

        <!-- Judul -->
        <h2 class="text-lg md:text-xl text-gray-800 mb-4 md:mb-6 tracking-wide mt-2 md:mt-0">
            Masukan nama anda <span class="text-red-500">*</span>
        </h2>

        <!-- Input Field -->
        <input type="text" id="usernameInput" placeholder="input username"
               class="w-full bg-gray-200 border-4 border-gray-300 p-3 md:p-4 rounded-xl text-lg md:text-2xl mb-6 md:mb-8 focus:outline-none focus:border-blue-500 focus:bg-white transition-colors text-center text-gray-700">

        <!-- Tombol NEXT -->
        <button onclick="goToNextStep()" class="bg-[#ff6b4a] hover:bg-[#ff522c] border-4 border-[#ffb39e] text-white text-xl md:text-3xl px-8 md:px-12 py-2 md:py-3 rounded-full shadow-[0_4px_0_0_#b52a10] md:shadow-[0_6px_0_0_#b52a10] active:translate-y-[4px] md:active:translate-y-[6px] active:shadow-none transition-all tracking-widest cursor-pointer w-full md:w-auto">
            NEXT
        </button>
    </div>
</div>

<script>
    const modal = document.getElementById('nameModal');
    const inputField = document.getElementById('usernameInput');

    // Fungsi membuka modal (Panggil ini di tombol START)
    function openModal() {
        modal.classList.remove('hidden');
        // Sedikit delay agar animasi munculnya terasa
        setTimeout(() => {
            modal.children[0].classList.remove('scale-90');
            modal.children[0].classList.add('scale-100');
            inputField.focus(); // Langsung arahkan kursor ke inputan
        }, 50);
    }

    // Fungsi menutup modal
    function closeModal() {
        modal.classList.add('hidden');
        modal.children[0].classList.remove('scale-100');
        modal.children[0].classList.add('scale-95');
    }

    // Fungsi saat tombol NEXT ditekan
    function goToNextStep() {
        const username = inputField.value.trim();
        if (username === "") {
            alert("Nama tidak boleh kosong!");
            return;
        }

        // Simpan nama sementara di browser (Local Storage)
        localStorage.setItem("jumpjump_username", username);

        // Nanti ganti alert ini dengan fungsi membuka pop-up "Pilih Bahasa Pemrograman"
        alert("Halo " + username + ", siap bertualang?");
    }
</script>
<body>
    <body class="bg-blue-300 min-h-screen flex items-center justify-center bg-cover bg-center" style="background-image: url('{{ asset('images/bg-main.png') }}');">

    <div class="text-center w-full max-w-5xl px-4">

        <!-- Judul/Banner -->
        <div class="bg-blue-600 border-4 border-blue-800 p-6 rounded-lg shadow-[8px_8px_0_0_rgba(0,0,0,0.5)] mb-32 transform hover:scale-105 transition-transform">
            <h1 class="text-white text-xl md:text-2xl leading-relaxed tracking-wider">
                BELAJAR CODING: PETUALANGAN LOGIKA
            </h1>
        </div>

        <!-- Tombol Menu -->
        <div class="flex flex-col md:flex-row justify-center items-center gap-10">
            <!-- Tombol Start -->
            <button onclick="openModal()" class="w-80 py-6 bg-red-500 hover:bg-red-600 text-white text-3xl border-4 border-red-800 rounded-full shadow-[6px_6px_0_0_rgba(0,0,0,0.4)] active:translate-y-1 active:shadow-none transition-all">
                START
            </button>

            <!-- Tombol Setting -->
            <button class="w-80 py-6 bg-teal-400 hover:bg-teal-500 text-white text-3xl border-4 border-teal-800 rounded-full shadow-[6px_6px_0_0_rgba(0,0,0,0.4)] active:translate-y-1 active:shadow-none transition-all">
                SETTING
            </button>
        </div>

    </div>
</body>
</html>
