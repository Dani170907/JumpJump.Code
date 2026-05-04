<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Level {{ $level }} - JUMPJUMP.CODE</title>
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'VT323', monospace; }
    </style>
</head>
<body class="bg-gray-500 h-screen w-screen flex items-center justify-center p-4 relative">

    <!-- Tombol Back ke Map (Opsional tapi penting untuk navigasi) -->
    <a href="/map" class="absolute top-6 left-8 bg-red-500 hover:bg-red-600 border-4 border-red-800 text-white px-6 py-2 rounded-full text-xl md:text-2xl z-10 shadow-[0_4px_0_0_#b52a10] active:translate-y-[4px] active:shadow-none transition-all cursor-pointer">
        &larr; MAP
    </a>

    <!-- KOTAK KUIS -->
    <div class="bg-white border-4 border-gray-800 rounded-3xl p-6 md:p-10 w-full max-w-3xl shadow-[12px_12px_0_0_rgba(0,0,0,0.7)] relative flex flex-col">

        <!-- Label Level & Bahasa Dinamis -->
        <div class="flex justify-center mb-6 gap-4">
            <span class="border-2 border-gray-400 rounded-xl px-6 py-1 text-gray-700 text-xl md:text-2xl tracking-widest bg-white shadow-sm">
                Soal {{ $level }}
            </span>
            <span id="labelBahasa" class="border-2 border-blue-400 rounded-xl px-6 py-1 text-blue-700 text-xl md:text-2xl tracking-widest bg-blue-50 shadow-sm">
                Loading...
            </span>
        </div>

        <!-- Teks Pertanyaan Kosong (Akan diisi JS) -->
        <h2 id="teksPertanyaan" class="text-2xl md:text-4xl text-center text-gray-900 font-bold mb-10 leading-relaxed tracking-wide min-h-[5rem]">
            Memuat soal...
        </h2>

        <!-- Wadah Pilihan Ganda Kosong (Akan diisi JS) -->
        <div id="wadahPilihan" class="flex flex-col gap-5 pl-2 md:pl-8 mb-12">
            <!-- Pilihan akan disuntikkan ke sini -->
        </div>

        <!-- Tombol LOCK -->
        <div class="flex justify-end">
            <button onclick="lockAnswer()" class="bg-[#ff6b4a] hover:bg-[#ff522c] border-4 border-[#ffb39e] text-white text-2xl md:text-3xl px-12 py-2 rounded-full shadow-[0_6px_0_0_#b52a10] active:translate-y-[6px] active:shadow-none transition-all tracking-widest cursor-pointer">
                LOCK
            </button>
        </div>

    </div>

    <!-- SCRIPT LOGIKA KUIS STATIS -->
    <script>
        // 1. Ambil data Level dari Laravel dan Bahasa dari Local Storage
        const currentLevel = {{ $level }};
        const selectedLang = localStorage.getItem("jumpjump_language") || "C++";

        // Tampilkan bahasa di label atas
        document.getElementById('labelBahasa').innerText = selectedLang;

        // 2. "Database Statis" menggunakan Object JavaScript
        // 2. "Database Statis" menggunakan Object JavaScript
        const bankSoal = {

            // KATEGORI 1: C++
            "C++": {
                1: {
                    tanya: "Bagaimana cara mencetak teks 'Belajar C++' ke layar di bahasa C++?",
                    opsi: [
                        { id: "a", teks: "console.log(\"Belajar C++\");" },
                        { id: "b", teks: "cout << \"Belajar C++\";" },
                        { id: "c", teks: "System.out.println(\"Belajar C++\");" },
                        { id: "d", teks: "print(\"Belajar C++\");" }
                    ],
                    jawabanBenar: "b"
                },
                2: {
                    tanya: "Tipe data apa yang digunakan untuk menyimpan angka bulat di C++?",
                    opsi: [
                        { id: "a", teks: "float" },
                        { id: "b", teks: "string" },
                        { id: "c", teks: "int" },
                        { id: "d", teks: "boolean" }
                    ],
                    jawabanBenar: "c"
                }
            },

            // KATEGORI 2: HTML
            "HTML": {
                1: {
                    tanya: "Tag HTML apa yang digunakan untuk membuat paragraf?",
                    opsi: [
                        { id: "a", teks: "<paragraph>" },
                        { id: "b", teks: "<p>" },
                        { id: "c", teks: "<pg>" },
                        { id: "d", teks: "<text>" }
                    ],
                    jawabanBenar: "b"
                },
                2: {
                    tanya: "Atribut apa yang digunakan untuk memasukkan tautan (link) ke dalam tag <a>?",
                    opsi: [
                        { id: "a", teks: "src" },
                        { id: "b", teks: "link" },
                        { id: "c", teks: "href" },
                        { id: "d", teks: "url" }
                    ],
                    jawabanBenar: "c"
                }
            },

            // KATEGORI 3: PYTHON
            "Python": {
                1: {
                    tanya: "Bagaimana cara menampilkan teks di Python?",
                    opsi: [
                        { id: "a", teks: "echo \"Halo\";" },
                        { id: "b", teks: "console.log(\"Halo\");" },
                        { id: "c", teks: "print(\"Halo\")" },
                        { id: "d", teks: "printf(\"Halo\");" }
                    ],
                    jawabanBenar: "c"
                },
                2: {
                    tanya: "Bagaimana cara membuat komentar satu baris di Python?",
                    opsi: [
                        { id: "a", teks: "// Ini komentar" },
                        { id: "b", teks: "/* Ini komentar */" },
                        { id: "c", teks: "<!-- Ini komentar -->" },
                        { id: "d", teks: "# Ini komentar" }
                    ],
                    jawabanBenar: "d"
                }
            }
        };

        // Variabel untuk menyimpan jawaban benar saat ini
        let kunciJawabanSaatIni = "";

        // 3. Fungsi untuk merender (menampilkan) soal ke layar
        function renderSoal() {
            // Cek apakah bahasa dan level ada di bank soal
            if(bankSoal[selectedLang] && bankSoal[selectedLang][currentLevel]) {
                const dataSoal = bankSoal[selectedLang][currentLevel];
                kunciJawabanSaatIni = dataSoal.jawabanBenar;

                // Masukkan teks pertanyaan
                document.getElementById('teksPertanyaan').innerText = dataSoal.tanya;

                // Bersihkan wadah pilihan lalu buat ulang
                const wadah = document.getElementById('wadahPilihan');
                wadah.innerHTML = "";

                dataSoal.opsi.forEach(pilihan => {
                    // Membuat elemen HTML untuk radio button persis seperti desainmu
                    const teksAman = pilihan.teks.replace(/</g, "&lt;").replace(/>/g, "&gt;");

                    // Membuat elemen HTML untuk radio button
                    const htmlOpsi = `
                        <label class="flex items-center gap-4 cursor-pointer group">
                            <input type="radio" name="jawaban" value="${pilihan.id}" class="hidden peer">
                            <div class="w-6 h-6 rounded-full border-4 border-gray-300 peer-checked:border-red-500 flex items-center justify-center bg-white transition-colors flex-shrink-0 relative">
                                <div class="w-2.5 h-2.5 rounded-full bg-red-500 opacity-0 peer-checked:opacity-100 transition-opacity"></div>
                            </div>
                            <!-- Gunakan variabel teksAman di sini 👇 -->
                            <span class="text-xl md:text-3xl text-gray-800 tracking-wider">${teksAman}</span>
                        </label>
                    `;
                    wadah.innerHTML += htmlOpsi;
                });
            } else {
                document.getElementById('teksPertanyaan').innerText = "Wah, soal untuk level ini belum dibuat!";
                document.getElementById('wadahPilihan').innerHTML = "";
            }
        }

        // Panggil fungsi render saat halaman selesai dimuat
        renderSoal();

        // 4. Fungsi saat tombol LOCK ditekan
        // 4. Fungsi saat tombol LOCK ditekan
        function lockAnswer() {
            const selectedOption = document.querySelector('input[name="jawaban"]:checked');

            if (!selectedOption) {
                alert("Pilih jawaban terlebih dahulu sebelum melakukan LOCK!");
                return;
            }

            if (selectedOption.value === kunciJawabanSaatIni) {
                alert("BENAR! Logika Anda tajam.");

                // ==========================================
                // SIMPAN PROGRES SECARA SPESIFIK PER BAHASA
                // ==========================================
                const storageKey = `jumpjump_highest_level_${selectedLang}`;
                let highestLevel = parseInt(localStorage.getItem(storageKey)) || 1;

                if(currentLevel >= highestLevel) {
                    // Simpan ke kunci yang spesifik, misal: jumpjump_highest_level_Python
                    localStorage.setItem(storageKey, currentLevel + 1);
                }

                // Kembali ke peta untuk memilih level berikutnya
                window.location.href = '/map';
            } else {
                alert("SALAH! Jangan menyerah, coba lagi!");
            }
        }
    </script>
</body>
</html>
