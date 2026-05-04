<!-- MODAL POP-UP SETTING -->
<div id="settingModal" class="hidden fixed inset-0 z-50 flex items-center justify-center backdrop-blur-xs transition-opacity">

    <!-- Kotak Modal -->
    <div class="bg-white border-4 border-gray-800 rounded-2xl md:rounded-3xl p-6 md:p-8 w-[90%] max-w-lg shadow-[8px_8px_0_0_rgba(0,0,0,0.7)] md:shadow-[12px_12px_0_0_rgba(0,0,0,0.7)] transform scale-90 transition-transform duration-300 relative text-left">

        <!-- Tombol Close -->
        <button onclick="closeSettingModal()" class="absolute top-2 right-4 md:top-4 md:right-6 text-gray-500 hover:text-red-500 text-2xl md:text-3xl font-bold cursor-pointer">
            &times;
        </button>

        <!-- 1. Section Bahasa -->
        <div class="mb-8">
            <h3 class="text-xl md:text-2xl text-gray-800 mb-4 tracking-wide">Bahasa</h3>
            <div class="flex flex-col gap-3 pl-2">
                <!-- Pilihan Bahasa English -->
                <label class="flex items-center gap-3 cursor-pointer group">
                    <input type="radio" name="language" value="english" class="hidden peer">
                    <!-- Custom Radio Button Circle -->
                    <div class="w-6 h-6 rounded-full border-4 border-gray-300 peer-checked:border-red-500 flex items-center justify-center bg-white relative transition-colors">
                        <div class="w-2.5 h-2.5 rounded-full bg-red-500 opacity-0 peer-checked:opacity-100 transition-opacity"></div>
                    </div>
                    <span class="text-lg md:text-xl text-gray-700">Bahasa English</span>
                </label>

                <!-- Pilihan Bahasa Indonesia -->
                <label class="flex items-center gap-3 cursor-pointer group">
                    <input type="radio" name="language" value="indonesia" class="hidden peer" checked>
                    <!-- Custom Radio Button Circle -->
                    <div class="w-6 h-6 rounded-full border-4 border-gray-300 peer-checked:border-red-500 flex items-center justify-center bg-white relative transition-colors">
                        <div class="w-2.5 h-2.5 rounded-full bg-red-500 opacity-0 peer-checked:opacity-100 transition-opacity"></div>
                    </div>
                    <span class="text-lg md:text-xl text-gray-700">Bahasa Indonesia</span>
                </label>
            </div>
        </div>

        <!-- 2. Section Audio (Toggle) -->
        <div class="mb-8 flex items-center justify-between pr-2">
            <h3 class="text-xl md:text-2xl text-gray-800 tracking-wide">Audio</h3>
            <label class="relative inline-flex items-center cursor-pointer">
                <!-- hidden checkbox as toggle driver -->
                <input type="checkbox" id="audioToggle" class="sr-only peer" checked>
                <!-- Toggle Track & Circle -->
                <div class="w-16 h-8 bg-gray-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:bg-red-500 after:content-[''] after:absolute after:top-[4px] after:left-[4px] after:bg-white after:rounded-full after:h-6 after:w-6 after:transition-all after:duration-300 after:shadow-sm"></div>
            </label>
        </div>

        <!-- 3. Section Volume (Slider) -->
        <div class="mb-8">
            <h3 class="text-xl md:text-2xl text-gray-800 mb-4 tracking-wide">Volume</h3>
            <div class="flex items-center w-full px-2">
                 <input type="range" min="0" max="100" value="50" class="w-full" id="volumeSlider">
            </div>
        </div>

        <!-- Tombol SAVE (Align Kanan) -->
        <div class="flex justify-end mt-4">
            <button onclick="saveSettings()" class="bg-[#ff6b4a] hover:bg-[#ff522c] border-4 border-[#ffb39e] text-white text-xl md:text-2xl px-8 py-2 rounded-full shadow-[0_4px_0_0_#b52a10] active:translate-y-[4px] active:shadow-none transition-all tracking-widest cursor-pointer">
                SAVE
            </button>
        </div>

    </div>
</div>

@push('scripts')
<script>
    const settingModal = document.getElementById('settingModal');

    function openSettingModal() {
        settingModal.classList.remove('hidden');
        setTimeout(() => {
            settingModal.children[0].classList.remove('scale-90');
            settingModal.children[0].classList.add('scale-100');
        }, 50);
    }

    function closeSettingModal() {
        settingModal.children[0].classList.remove('scale-100');
        settingModal.children[0].classList.add('scale-90');
        setTimeout(() => {
            settingModal.classList.add('hidden');
        }, 300);
    }

    function saveSettings() {
        const language = document.querySelector('input[name="language"]:checked').value;
        const isAudioOn = document.getElementById('audioToggle').checked;
        const volume = document.getElementById('volumeSlider').value;

        console.log("Settings Saved:", { language, isAudioOn, volume });
        closeSettingModal();
    }
</script>
@endpush
