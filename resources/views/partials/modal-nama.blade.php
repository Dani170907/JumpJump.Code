<!-- MODAL POP-UP input nama -->
<div id="nameModal" class="hidden fixed inset-0 z-50 flex items-center justify-center backdrop-blur-xs transition-opacity">

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

@push('scripts')
<script>
    const nameModal = document.getElementById('nameModal');
    const inputField = document.getElementById('usernameInput');

    function openModal() {
        nameModal.classList.remove('hidden');
        setTimeout(() => {
            nameModal.children[0].classList.remove('scale-90');
            nameModal.children[0].classList.add('scale-100');
            inputField.focus();
        }, 50);
    }

    function closeModal() {
        nameModal.children[0].classList.remove('scale-100');
        nameModal.children[0].classList.add('scale-90');
        setTimeout(() => {
            nameModal.classList.add('hidden');
        }, 300);
    }

    function goToNextStep() {
        const username = inputField.value.trim();
        if (username === "") {
            alert("Nama tidak boleh kosong!");
            return;
        }

        localStorage.setItem("jumpjump_username", username);

        closeModal();

        setTimeout(() => {
            openBahasaModal();
        }, 300);
    }
</script>
@endpush
