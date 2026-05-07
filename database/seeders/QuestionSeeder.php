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
            'language' => 'C++',
            'level' => 1,
            'type' => 'isian',
            'question_text' => "Apa output dari kode berikut?\n\n```cpp\n#include <iostream>\nusing namespace std;\n\nint main() {\n    int x = 5;\n    cout << x;\n    return 0;\n}\n```",
            'options' => json_encode([]),
            'correct_answer' => '5',
            'penjelasan' => 'Variabel x diinisialisasi dengan nilai 5, dan cout digunakan untuk mencetak nilai x ke layar.'
            ],

            [
            'language' => 'HTML',
            'level' => 3,
            'type' => 'isian',
            'question_text' => "Apa tag HTML yang digunakan untuk membuat judul?\n\nA. <h1>\nB. <title>\nC. <head>\nD. <header>",
            'options' => json_encode(['A. <h1>', 'B. <title>', 'C. <head>', 'D. <header>']),
            'correct_answer' => '0',
            'penjelasan' => 'Tag <h1> digunakan untuk membuat judul utama dalam HTML.'
            ],
            [
            'language' => 'HTML',
            'level' => 4,
            'type' => 'pilihan_ganda',
            'question_text' => "Tag HTML mana yang digunakan untuk membuat tautan (link)?\n\nA. <a>\nB. <link>\nC. <href>\nD. <url>",
            'options' => json_encode(['A. <a>', 'B. <link>', 'C. <href>', 'D. <url>']),
            'correct_answer' => '0',
            'penjelasan' => 'Tag <a> digunakan untuk membuat tautan (link) dalam HTML.'
            ],
            [
            'language' => 'HTML',
            'level' => 5,
            'type' => 'isian',
            'question_text' => "Perhatikan struktur tabel berikut. Lengkapi bagian yang kosong (___) agar sel 'Data 2' menggabungkan dua kolom sekaligus:\n\n```html\n<table border=\"1\">\n    <thead>\n        <tr>\n            <th>Kolom A</th>\n            <th>Kolom B</th>\n        </tr>\n    </thead>\n    <tbody>\n        <tr>\n            <td>Data 1</td>\n            <td>Data 2</td>\n        </tr>\n        <tr>\n            \n            <td ___=\"2\">Data Gabungan</td>\n        </tr>\n    </tbody>\n</table>\n```",
            'options' => json_encode([]),
            'correct_answer' => 'colspan',
            'penjelasan' => 'Atribut colspan digunakan dalam tag <td> atau <th> untuk menggabungkan beberapa kolom menjadi satu sel.'
            ],

            [
            'language' => 'Python',
            'level' => 1,
            'type' => 'pilihan_ganda',
            'question_text' => "Apa output dari kode berikut?\n\n```python\nx = 3\ny = 4\nprint(x * y)\n```",
            'options' => json_encode(['A. 7', 'B. 12', 'C. 1', 'D. Error']),
            'correct_answer' => '1',
            'penjelasan' => 'Operator * digunakan untuk perkalian. 3 * 4 menghasilkan 12.'
            ],
            [
            'language' => 'Python',
            'level' => 2,
            'type' => 'isian',
            'question_text' => "Lengkapi kode berikut agar mencetak 'Python Rocks!':\n\n```python\n___ = 'Python Rocks!'\nprint(message)\n```",
            'options' => json_encode([]),
            'correct_answer' => 'message',
            'penjelasan' => 'Variabel message diinisialisasi dengan string "Python Rocks!" dan kemudian dicetak menggunakan print.'
            ],
            [
            'language' => 'Python',
            'level' => 3,
            'type' => 'pilihan_ganda',
            'question_text' => "Apa output dari kode berikut?\n\n```python\na = 10\nb = 5\nprint(a + b)\n```",
            'options' => json_encode(['A. 15', 'B. 5', 'C. 10', 'D. Error']),
            'correct_answer' => '0',
            'penjelasan' => 'Operator + digunakan untuk penjumlahan. 10 + 5 menghasilkan 15.'
            ],
        ];
        DB::table('questions')->insert($questions);
    }
}
