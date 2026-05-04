<!-- MODAL POP-UP PILIH BAHASA -->
<div id="bahasaModal" class="hidden fixed inset-0 z-50 flex items-center justify-center backdrop-blur-sm transition-opacity">

    <!-- Kotak Modal -->
    <div class="bg-white border-4 border-gray-800 rounded-2xl md:rounded-3xl p-6 md:p-10 w-[90%] max-w-lg shadow-[8px_8px_0_0_rgba(0,0,0,0.7)] md:shadow-[12px_12px_0_0_rgba(0,0,0,0.7)] transform scale-90 transition-transform duration-300 relative text-left">

        <button onclick="closeBahasaModal()" class="absolute top-2 right-4 md:top-4 md:right-6 text-gray-500 hover:text-red-500 text-2xl md:text-3xl font-bold cursor-pointer">
            &times;
        </button>

        <!-- Judul -->
        <h2 class="text-xl md:text-2xl text-gray-800 mb-8 tracking-wide">
            Pilih bahasa pemprograman <span class="text-gray-800">*</span>
        </h2>

        <!-- Pilihan Bahasa Pemrograman -->
        <div class="flex flex-col gap-5 pl-2 mb-10">

            <!-- Opsi C++ -->
            <label class="flex items-center gap-4 cursor-pointer group">
                <input type="radio" name="programming_language" value="C++" class="hidden peer" checked>
                <div class="w-7 h-7 rounded-full border-4 border-gray-300 peer-checked:border-red-500 flex items-center justify-center bg-white relative transition-colors">
                    <div class="w-3 h-3 rounded-full bg-red-500 opacity-0 peer-checked:opacity-100 transition-opacity"></div>
                </div>
                <span class="text-xl md:text-2xl text-gray-800 uppercase">C++</span>
            </label>

            <!-- Opsi HTML -->
            <label class="flex items-center gap-4 cursor-pointer group">
                <input type="radio" name="programming_language" value="HTML" class="hidden peer">
                <div class="w-7 h-7 rounded-full border-4 border-gray-300 peer-checked:border-red-500 flex items-center justify-center bg-white relative transition-colors">
                    <div class="w-3 h-3 rounded-full bg-red-500 opacity-0 peer-checked:opacity-100 transition-opacity"></div>
                </div>
                <span class="text-xl md:text-2xl text-gray-800 uppercase">HTML</span>
            </label>

            <!-- Opsi PYTHON -->
            <label class="flex items-center gap-4 cursor-pointer group">
                <input type="radio" name="programming_language" value="Python" class="hidden peer">
                <div class="w-7 h-7 rounded-full border-4 border-gray-300 peer-checked:border-red-500 flex items-center justify-center bg-white relative transition-colors">
                    <div class="w-3 h-3 rounded-full bg-red-500 opacity-0 peer-checked:opacity-100 transition-opacity"></div>
                </div>
                <span class="text-xl md:text-2xl text-gray-800 uppercase">PYTHON</span>
            </label>

        </div>

        <!-- Tombol NEXT -->
        <div class="flex justify-end">
            <button onclick="goToGameMap()" class="bg-[#ff6b4a] hover:bg-[#ff522c] border-4 border-[#ffb39e] text-white text-xl md:text-2xl px-10 py-2 rounded-full shadow-[0_4px_0_0_#b52a10] active:translate-y-[4px] active:shadow-none transition-all tracking-widest cursor-pointer">
                NEXT
            </button>
        </div>

    </div>
</div>

@push('scripts')
<script>
    const bahasaModal = document.getElementById('bahasaModal');

    function openBahasaModal() {
        bahasaModal.classList.remove('hidden');
        setTimeout(() => {
            bahasaModal.children[0].classList.remove('scale-90');
            bahasaModal.children[0].classList.add('scale-100');
        }, 50);
    }

    function closeBahasaModal() {
        bahasaModal.children[0].classList.remove('scale-100');
        bahasaModal.children[0].classList.add('scale-90');
        setTimeout(() => {
            bahasaModal.classList.add('hidden');
        }, 300);
    }

    function goToGameMap() {
        const selectedLanguage = document.querySelector('input[name="programming_language"]:checked').value;
        const savedName = localStorage.getItem("jumpjump_username");

        console.log("Mulai Game:", {
            nama: savedName,
            bahasa: selectedLanguage
        });

        localStorage.setItem("jumpjump_language", selectedLanguage);

        alert(`Selamat datang ${savedName}! Memulai petualangan logika dengan bahasa ${selectedLanguage}.`);

        window.location.href = '/map';
    }
</script>
@endpush
