<!-- KOMPONEN CUSTOM ALERT GLOBAL -->
<div id="jsAlert" class="fixed top-10 left-1/2 transform -translate-x-1/2 px-6 py-3 rounded-xl z-50 text-xl md:text-3xl tracking-widest flex items-center gap-3 transition-all duration-300 opacity-0 pointer-events-none scale-90" style="font-family: 'VT323', monospace;">
    <span id="jsAlertIcon"></span>
    <span id="jsAlertText"></span>
</div>

<script>
    // Menambahkan fungsi ini ke 'window' agar bisa dipanggil dari file mana saja
    window.showCustomAlert = function(pesan, tipe = 'error') {
        const box = document.getElementById('jsAlert');
        const icon = document.getElementById('jsAlertIcon');
        const text = document.getElementById('jsAlertText');

        box.className = "fixed top-10 left-1/2 transform -translate-x-1/2 px-6 py-3 rounded-xl z-50 text-xl md:text-3xl tracking-widest flex items-center gap-3 transition-all duration-300 animate-bounce shadow-lg";

        if (tipe === 'error') {
            box.classList.add('bg-red-600', 'border-4', 'border-red-900', 'text-white', 'shadow-[0_6px_0_0_#450a0a]');
            icon.innerText = "❌";
        } else if (tipe === 'warning') {
            box.classList.add('bg-yellow-400', 'border-4', 'border-yellow-700', 'text-gray-900', 'shadow-[0_6px_0_0_#a16207]');
            icon.innerText = "⚠️";
        } else if (tipe === 'success') {
            box.classList.add('bg-green-500', 'border-4', 'border-green-800', 'text-white', 'shadow-[0_6px_0_0_#14532d]');
            icon.innerText = "✅";
        }

        text.innerText = pesan;
        box.classList.remove('opacity-0', 'pointer-events-none', 'scale-90');
        box.classList.add('opacity-100', 'scale-100');

        setTimeout(() => {
            box.classList.remove('opacity-100', 'scale-100');
            box.classList.add('opacity-0', 'pointer-events-none', 'scale-90');
        }, 3000);
    };
</script>
