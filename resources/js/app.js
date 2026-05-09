window.showCustomAlert = function(message, type, duration = 3000) {
            const box = document.getElementById('jsAlert');
            const icon = document.getElementById('jsAlertIcon');
            const text = document.getElementById('jsAlertText');

            if (!box || !icon || !text) return;

            // Hapus class warna yang lama agar tidak numpuk
            box.classList.remove('bg-red-600', 'border-red-900', 'bg-yellow-400', 'border-yellow-700', 'bg-green-500', 'border-green-800', 'bg-blue-500', 'border-blue-800');

            box.className = "fixed top-10 left-1/2 transform -translate-x-1/2 px-6 py-3 rounded-xl z-[9999] text-xl md:text-3xl tracking-widest flex items-center gap-3 transition-all duration-300 animate-bounce shadow-lg";

            // Menggunakan variabel 'type' (bahasa inggris), bukan 'tipe'
            if (type === 'error') {
                box.classList.add('bg-red-600', 'border-4', 'border-red-900', 'text-white', 'shadow-[0_6px_0_0_#450a0a]');
                icon.innerText = "❌";
            } else if (type === 'warning') {
                box.classList.add('bg-yellow-400', 'border-4', 'border-yellow-700', 'text-gray-900', 'shadow-[0_6px_0_0_#a16207]');
                icon.innerText = "⚠️";
            } else if (type === 'success') {
                box.classList.add('bg-green-500', 'border-4', 'border-green-800', 'text-white', 'shadow-[0_6px_0_0_#14532d]');
                icon.innerText = "✅";
            } else if (type === 'info') {
                box.classList.add('bg-blue-500', 'border-4', 'border-blue-800', 'text-white', 'shadow-[0_6px_0_0_#1e3a8a]');
                icon.innerText = "🤖";
            }

            // Menggunakan variabel 'message', bukan 'pesan'
            text.innerText = message;
            box.classList.remove('opacity-0', 'pointer-events-none', 'scale-90');
            box.classList.add('opacity-100', 'scale-100');

            // Timer durasi dinamis
            setTimeout(() => {
                box.classList.remove('opacity-100', 'scale-100');
                box.classList.add('opacity-0', 'pointer-events-none', 'scale-90');
            }, duration);
        };
