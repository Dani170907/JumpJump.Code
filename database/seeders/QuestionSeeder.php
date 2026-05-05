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
                'correct_answer' => '0'
            ],
            [
                'language' => 'HTML', 'level' => 1,
                'question_text' => 'Tag HTML mana yang digunakan untuk membuat paragraf?',
                'options' => json_encode([
                    '<p>', '<div>', '<span>', '<h1>'
                    ]),
                'correct_answer' => '0'
            ],
            [
                'language' => 'PYTHON', 'level' => 1,
                'question_text' => 'Bagaimana cara mendefinisikan fungsi di Python?',
                'options' => json_encode([
                    'def nama_fungsi():', 'function nama_fungsi() { }',
                    'func nama_fungsi() { }', 'function nama_fungsi():'
                    ]),
                'correct_answer' => '0'
            ],
        ];
        DB::table('questions')->insert($questions);
    }
}
