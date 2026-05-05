<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                'language' => 'C++', 'level' => 1,
                'question_text' => 'Bagaimana cara mencetak teks \'Belajar C++\' ke layar di bahasa C++?',
                'options' => json_encode([
                    'Cetak teks dengan cout << "Belajar C++";',
                    'Cetak teks dengan printf("Belajar C++");',
                    'Cetak teks dengan write("Belajar C++");',
                    'Cetak teks dengan print("Belajar C++");'
                    ]),
                'correct_answer' => '0',
                'penjelasan' => 'Di C++, untuk mencetak teks ke layar, kita menggunakan objek cout dengan operator <<. Jadi, sintaks yang benar adalah cout << "Belajar C++";'
            ],
            
            [
                'language' => 'HTML', 'level' => 1,
                'question_text' => 'Tag HTML mana yang digunakan untuk membuat judul utama?',
                'options' => json_encode([
                    '<p>', '<div>', '<h1>', '<span>'
                    ]),
                'correct_answer' => '2',
                'penjelasan' => 'Tag <h1> digunakan untuk membuat judul utama'
            ],
            [
                'language' => 'HTML', 'level' => 1,
                'question_text' => 'Tag HTML mana yang digunakan untuk membuat paragraf?',
                'options' => json_encode([
                    '<p>', '<div>', '<span>', '<h1>'
                    ]),
                'correct_answer' => '0',
                'penjelasan' => 'Tag <p> digunakan untuk membuat paragraf dalam HTML.'
            ],
            [
                'language' => 'HTML', 'level' => 1,
                'question_text' => 'Tag HTML mana yang digunakan untuk membuat daftar tidak berurutan?',
                'options' => json_encode([
                    '<ul>', '<ol>', '<li>', '<dl>'
                    ]),
                'correct_answer' => '0',
                'penjelasan' => 'Tag <ul> digunakan untuk membuat daftar tidak berurutan (unordered list) dalam HTML.'
            ],
            [
                'language' => 'HTML', 'level' => 2,
                'question_text' => 'Lengkapi tag berikut untuk membuat gambar! <img ____="gambar.jpg" alt="Deskripsi Gambar">',
                'options' => null,
                'correct_answer' => 'src',
                'penjelasan' => 'Atribut src digunakan untuk menentukan path gambar yang ingin ditampilkan.'
            ],
            [
                'language' => 'HTML', 'level' => 2,
                'question_text' => 'Lengkapi atribut berikut untuk membuat link! <a ____="https://web.com">Klik</a>',
                'options' => null,
                'correct_answer' => 'href', // Jawaban yang harus diketik pemain
                'penjelasan' => 'Atribut href digunakan untuk menentukan URL tujuan link.'
            ],

            [
                'language' => 'PYTHON', 'level' => 1,
                'question_text' => 'Bagaimana cara mendefinisikan fungsi di Python?',
                'options' => json_encode([
                    'def nama_fungsi():', 'function nama_fungsi() { }',
                    'func nama_fungsi() { }', 'function nama_fungsi():'
                    ]),
                'correct_answer' => '0',
                'penjelasan' => 'Di Python, fungsi didefinisikan menggunakan kata kunci def diikuti dengan nama fungsi dan tanda kurung. Jadi, sintaks yang benar adalah def nama_fungsi():'
            ],
        ];
        DB::table('questions')->insert($questions);
    }
}
