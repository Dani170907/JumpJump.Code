<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Question;

class GenerateQuestions extends Command
{
    protected $signature = 'generate:questions {language} {start_level} {end_level}';
    protected $description = 'Generate soal kuis massal dengan jeda waktu agar tidak limit';

    public function handle()
    {
        $language = $this->argument('language');
        $startLevel = (int) $this->argument('start_level');
        $endLevel = (int) $this->argument('end_level');

        $apiKey = env('GEMINI_API_KEY');
        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key={$apiKey}";

        $this->info("🚀 Memulai proses generate soal {$language} dari Level {$startLevel} sampai {$endLevel}...");

        for ($level = $startLevel; $level <= $endLevel; $level++) {
            $this->info("⏳ Meminta soal untuk Level {$level}...");

            $prompt = "Kamu adalah ahli pembuat soal kuis pemrograman.
Buatkan TEPAT 3 soal untuk bahasa {$language} di tingkat kesulitan setara level {$level} (skala 1-20).

PANDUAN KESULITAN:
- Level 1-5: Sangat Mudah (Sintaks dasar, output, variabel).
- Level 6-10: Menengah (If/else, perulangan for/while).
- Level 11-15: Lanjutan (Array, List, Fungsi).
- Level 16-20: Sulit (OOP, algoritma kompleks).

KOMPOSISI SOAL (WAJIB):
- Tepat 2 soal bertipe \"pilihan_ganda\".
- Tepat 1 soal bertipe \"isian\" (melengkapi sintaks yang hilang dengan tanda ___).

ATURAN FORMAT KODE (SANGAT PENTING):
1. Jika soal mengandung potongan kode, KAMU WAJIB memisahkannya dari teks utama dengan DUA BARIS BARU (\\n\\n).
2. Potongan kode WAJIB dibungkus dengan sintaks Markdown (contoh: ```{$language} ...kode... ```).

ATURAN OUTPUT JSON MURNI:
Keluarkan HANYA array JSON murni. Escape tanda kutip ganda dengan \\\".
Format WAJIB seperti ini:
[
  {
    \"language\": \"{$language}\",
    \"level\": {$level},
    \"type\": \"pilihan_ganda\",
    \"question_text\": \"Apa output dari program ini?\\n\\n```{$language}\\nint a = 5;\\ncout << a;\\n```\",
    \"options\": [\"5\", \"2\", \"7\", \"Error\"],
    \"correct_answer\": \"0\",
    \"penjelasan\": \"Karena nilai a adalah 5.\"
  },
  {
    \"language\": \"{$language}\",
    \"level\": {$level},
    \"type\": \"isian\",
    \"question_text\": \"Lengkapi kode berikut agar mencetak 'Halo':\\n\\n```{$language}\\n___ << \\\"Halo\\\";\\n```\",
    \"options\": [],
    \"correct_answer\": \"cout\",
    \"penjelasan\": \"Fungsi dasar untuk menampilkan teks ke layar adalah cout.\"
  }
]";

            try {
                $response = Http::withHeaders([
                    'Content-Type' => 'application/json',
                ])->post($url, [
                    'contents' => [
                        ['parts' => [['text' => $prompt]]]
                    ]
                ]);

                if ($response->successful()) {
                    $responseText = $response->json()['candidates'][0]['content']['parts'][0]['text'];

                    // PERBAIKAN BUG UTAMA ADA DI SINI:
                    // Hanya buang ```json di awal dan ``` di akhir, JANGAN pakai Str::replace global!
                    $cleanJson = preg_replace('/^```json\s*/i', '', trim($responseText));
                    $cleanJson = preg_replace('/^```\s*/i', '', $cleanJson);
                    $cleanJson = preg_replace('/```\s*$/i', '', $cleanJson);
                    $cleanJson = trim($cleanJson);

                    $questions = json_decode($cleanJson, true);

                    if (is_array($questions)) {
                        foreach ($questions as $q) {
                            Question::create([
                                'language' => $q['language'],
                                'level' => $q['level'],
                                'type' => $q['type'] ?? 'pilihan_ganda',
                                'question_text' => $q['question_text'],
                                'options' => $q['options'],
                                'correct_answer' => $q['correct_answer'],
                                'penjelasan' => $q['penjelasan']
                            ]);
                        }
                        $this->info("✅ Sukses! Soal Level {$level} tersimpan.");
                    } else {
                        $this->error("❌ Gagal mem-parsing JSON di Level {$level}. AI merusak format.");
                    }
                } else {
                    $this->error("❌ API Error di Level {$level}: " . $response->status());
                }
            } catch (\Exception $e) {
                $this->error("❌ Terjadi kesalahan sistem di Level {$level}: " . $e->getMessage());
            }

            if ($level < $endLevel) {
                $this->info("💤 Istirahat 8 detik agar tidak diblokir server Google...");
                sleep(8);
            }
        }

        $this->info("🎉 Proses Mass-Generate Selesai!");
    }
}
