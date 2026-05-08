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
            // PANDUAN KESULITAN:
            // - Level 1-5: Sangat Mudah (Sintaks dasar, output, variabel).
            // - Level 6-10: Menengah (If/else, perulangan for/while).
            // - Level 11-15: Lanjutan (Array, List, Fungsi).
            // - Level 16-20: Sulit (OOP, algoritma kompleks).
            [
            'language' => 'C++',
            'level' => 1,
            'type' => 'pilihan_ganda',
            'question_text' => "Apa output dari kode berikut?\n\n```cpp\n#include <iostream>\nusing namespace std;\n\nint main() {\n    int a = 5;\n    cout << a;\n    return 0;\n}\n```",
            'options' => json_encode(['A. 5', 'B. 0', 'C. Error', 'D. 10']),
            'correct_answer' => '0',
            'penjelasan' => 'Variabel a diinisialisasi dengan nilai 5, sehingga outputnya adalah 5.'
            ],
            [
            'language' => 'C++',
            'level' => 2,
            'type' => 'isian',
            'question_text' => "Lengkapi kode berikut agar mencetak 'Hello, World!':\n\n```cpp\n#include <iostream>\nusing namespace std;\n\nint main() {\n    cout << ___;\n    return 0;\n}\n```",
            'options' => json_encode([]),
            'correct_answer' => '"Hello, World!"',
            'penjelasan' => 'Untuk mencetak teks dalam C++, kita menggunakan cout << diikuti oleh teks yang ingin dicetak dalam tanda kutip.'
            ],
            [
            'language' => 'C++',
            'level' => 3,
            'type' => 'pilihan_ganda',
            'question_text' => "Apa output dari kode berikut?\n\n```cpp\n#include <iostream>\nusing namespace std;\n\nint main() {\n    int x = 10;\n    int y = 20;\n    cout << x + y;\n    return 0;\n}\n```",
            'options' => json_encode(['A. 30', 'B. 10', 'C. 20', 'D. Error']),
            'correct_answer' => '0',
            'penjelasan' => 'Operator + digunakan untuk penjumlahan. 10 + 20 menghasilkan 30.'
            ],
            [
            'language' => 'C++',
            'level' => 4,
            'type' => 'isian',
            'question_text' => "Perhatikan kode berikut. Lengkapi bagian yang kosong (___) agar program mencetak 'Even' jika x adalah bilangan genap dan 'Odd' jika x adalah bilangan ganjil:\n\n```cpp\n#include <iostream>\nusing namespace std;\n\nint main() {\n    int x = 7;\n    if (x % 2 == 0) {\n        cout << \"Even\";\n    } else {\n        cout << ___;\n    }\n    return 0;\n}\n```",
            'options' => json_encode([]),
            'correct_answer' => '"Odd"',
            'penjelasan' => 'Jika x tidak habis dibagi 2, maka itu adalah bilangan ganjil, sehingga kita mencetak "Odd".'
            ],
            [
            'language' => 'C++',
            'level' => 5,
            'type' => 'pilihan_ganda',
            'question_text' => "Apa output dari kode berikut?\n\n```cpp\n#include <iostream>\nusing namespace std;\n\nint main() {\n    for (int i = 0; i < 5; i++) {\n        cout << i << \" \n\";\n    }\n    return 0;\n}\n```",
            'options' => json_encode(['A. 0 1 2 3 4', 'B. 1 2 3 4 5', 'C. 0 1   2 3 4 5', 'D. Error']),
            'correct_answer' => '0',
            'penjelasan' => 'Perulangan for dimulai dari 0 hingga kurang dari 5, sehingga outputnya adalah 0 1 2 3 4.'
            ],
            // - Level 6-10: Menengah (If/else, perulangan for/while).
            [
            'language' => 'C++',
            'level' => 6,
            'type' => 'isian',
            'question_text' => "Buatlah kode C++ yang menggunakan perulangan while untuk mencetak angka dari 1 hingga 5:\n\n```cpp\n#include <iostream>\nusing namespace std;\n\nint main() {\n    int i = 1;\n    while (i <= 5) {\n        cout << i << \" \";\n        ___;\n    }\n    return 0;\n}\n```",
            'options' => json_encode([]),
            'correct_answer' => 'i++',
            'penjelasan' => 'Untuk meningkatkan nilai i dalam perulangan while, kita menggunakan i++. Ini akan memastikan bahwa perulangan berjalan dengan benar dan mencetak angka dari 1 hingga 5.'
            ],
            [
            'language' => 'C++',
            'level' => 7,
            'type' => 'pilihan_ganda',
            'question_text' => "Kenapa hasil output dari kode berikut adalah 10?\n\n```cpp\n#include <iostream>\nusing namespace std;\n\nint main() {\n    int sum = 0;\n    for (int i = 1; i <= 4; i++) {\n        sum += i;\n    }\n    cout << sum;\n    return 0;\n}\n```",
            'options' => json_encode(['A. Karena sum diinisialisasi dengan 10', 'B. Karena perulangan menjumlahkan angka dari 1 hingga 4', 'C. Karena sum direset setiap iterasi', 'D. Karena ada kesalahan dalam kode']),
            'correct_answer' => '1',
            'penjelasan' => 'Perulangan for menjumlahkan angka dari 1 hingga 4 (1 + 2 + 3 + 4), sehingga hasil akhirnya adalah 10.'
            ],
            [
            'language' => 'C++',
            'level' => 8,
            'type' => 'isian',
            'question_text' => "Lengkapi kode berikut agar mencetak 'Positive' jika x adalah bilangan positif, 'Negative' jika x adalah bilangan negatif, dan 'Zero' jika x adalah nol:\n\n```cpp\n#include <iostream>\nusing namespace std;\n\nint main() {\n    int x = -3;\n    if (x > 0) {\n        cout << \"Positive\";\n    } else if (x < 0) {\n        cout << ___;\n    } else {\n        cout << \"Zero\";\n    }\n    return 0;\n}\n```",
            'options' => json_encode([]),
            'correct_answer' => '"Negative"',
            'penjelasan' => 'Jika x kurang dari 0, maka itu adalah bilangan negatif, sehingga kita mencetak "Negative".'
            ],
            [
            'language' => 'C++',
            'level' => 9,
            'type' => 'pilihan_ganda',
            'question_text' => "Apa output dari kode berikut?\n\n```cpp\n#include <iostream>\nusing namespace std;\n\nint main() {\n    int a = 5;\n    int b = 10;\n    if (a > b) {\n        cout << \"a is greater\";\n    } else {\n        cout << \"b is greater\";\n    }\n    return 0;\n}\n```",
            'options' => json_encode(['A. a is greater', 'B. b is greater', 'C. a and b are equal', 'D. Error']),
            'correct_answer' => '1',
            'penjelasan' => 'Karena nilai a (5) lebih kecil dari nilai b (10), maka outputnya adalah "b is greater".'
            ],
            [
            'language' => 'C++',
            'level' => 10,
            'type' => 'isian',
            'question_text' => "Perhatikan kode berikut. Lengkapi bagian yang kosong (___) agar program mencetak 'Even' jika x adalah bilangan genap dan 'Odd' jika x adalah bilangan ganjil:\n\n```cpp\n#include <iostream>\nusing namespace std;\n\nint main() {\n    int x = 8;\n    if (x % 2 == 0) {\n        cout << \"Even\";\n    } else {\n        cout << ___;\n    }\n    return 0;\n}\n```",
            'options' => json_encode([]),
            'correct_answer' => '"Odd"',
            'penjelasan' => 'Jika x tidak habis dibagi 2, maka itu adalah bilangan ganjil, sehingga kita mencetak "Odd".'
            ],
            // - Level 11-15: Lanjutan (Array, List, Fungsi).
            [
            'language' => 'C++',
            'level' => 11,
            'type' => 'pilihan_ganda',
            'question_text' => "Apa output dari kode berikut?\n\n```cpp\n#include <iostream>\nusing namespace std;\n\nvoid printArray(int arr[], int size) {\n    for (int i = 0; i < size; i++) {\n        cout << arr[i] << \" \";\n    }\n}\n\nint main() {\n    int myArray[] = {1, 2, 3, 4, 5};\n    printArray(myArray, 5);\n    return 0;\n}\n```",
            'options' => json_encode(['A. 1 2 3 4 5', 'B. Error', 'C. 0 1 2 3 4', 'D. 5 4 3 2 1']),
            'correct_answer' => '0',
            'penjelasan' => 'Fungsi printArray mencetak elemen-elemen dari array myArray, sehingga outputnya adalah 1 2 3 4 5.'
            ],
            [
            'language' => 'C++',
            'level' => 12,
            'type' => 'isian',
            'question_text' => "Lengkapi kode berikut agar fungsi add mengembalikan hasil penjumlahan dua bilangan:\n\n```cpp\n#include <iostream>\nusing namespace std;\n\nint add(int a, int b) {\n    return ___;\n}\n\nint main() {\n    int result = add(3, 4);\n    cout << result;\n    return 0;\n}\n```",
            'options' => json_encode([]),
            'correct_answer' => 'a + b',
            'penjelasan' => 'Fungsi add harus mengembalikan hasil penjumlahan dari a dan b, sehingga kita menggunakan return a + b;'
            ],
            [
            'language' => 'C++',
            'level' => 13,
            'type' => 'pilihan_ganda',
            'question_text' => "Apa output dari kode berikut?\n\n```cpp\n#include <iostream>\nusing namespace std;\n\nint factorial(int n) {\n    if (n == 0) {\n        return 1;\n    } else {\n        return n * factorial(n - 1);\n    }\n}\n\nint main() {\n    int result = factorial(5);\n    cout << result;\n    return 0;\n```",
            'options' => json_encode(['A. 120', 'B. 24', 'C. 5', 'D. Error']),
            'correct_answer' => '0',
            'penjelasan' => 'Fungsi factorial menghitung faktorial dari n secara rekursif. Faktorial dari 5 adalah 5 * 4 * 3 * 2 * 1 = 120.'
            ],
            [
            'language' => 'C++',
            'level' => 14,
            'type' => 'isian',
            'question_text' => "Perhatikan kode berikut. Lengkapi bagian yang kosong (___) agar fungsi swap menukar nilai dari dua variabel:\n\n```cpp\n#include <iostream>\nusing namespace std;\n\nvoid swap(int &a, int &b) {\n    int temp = a;\n    a = b;\n    b = ___;\n}\n\nint main() {\n    int x = 5;\n    int y = 10;\n    swap(x, y);\n    cout << \"x: \" << x << \", y: \" << y;\n    return 0;\n}\n```",
            'options' => json_encode([]),
            'correct_answer' => 'temp',
            'penjelasan' => 'Fungsi swap menggunakan variabel sementara temp untuk menyimpan nilai a sebelum menukarnya dengan b. Setelah a diisi dengan nilai b, kita mengisi b dengan nilai temp untuk menyelesaikan proses penukaran.'
            ],
            [
            'language' => 'C++',
            'level' => 15,
            'type' => 'pilihan_ganda',
            'question_text' => "Apa output dari kode berikut?\n\n```cpp\n#include <iostream>\nusing namespace std;\n\nint main() {\n    int arr[3] = {10, 20, 30};\n    cout << arr[1];\n    return 0;\n}\n```",
            'options' => json_encode(['A. 10', 'B. 20', 'C. 30', 'D. Error']),
            'correct_answer' => '1',
            'penjelasan' => 'Indeks array dimulai dari 0, sehingga arr[1] mengacu pada elemen kedua dari array, yaitu 20.'
            ],
            // - Level 16-20: Sulit (OOP, algoritma kompleks).
            [
            'language' => 'C++',
            'level' => 16,
            'type' => 'isian',
            'question_text' => "Lengkapi kode berikut agar kelas Person memiliki atribut name dan fungsi member introduce yang mencetak perkenalan:\n\n```cpp\n#include <iostream>\nusing namespace std;\n\nclass Person {\npublic:\n    string name;\n    void introduce() {\n        cout << \"Hello, my name is \" << ___ << \".\";\n    }\n};\n\nint main() {\n    Person person;\n    person.name = \"Alice\";\n    person.introduce();\n    return 0;\n}\n```",
            'options' => json_encode([]),
            'correct_answer' => 'name',
            'penjelasan' => 'Fungsi introduce menggunakan atribut name untuk mencetak perkenalan, sehingga kita harus mengisi bagian yang kosong dengan name.'
            ],
            [
            'language' => 'C++',
            'level' => 17,
            'type' => 'pilihan_ganda',
            'question_text' => "Apa output dari kode berikut?\n\n```cpp\n#include <iostream>\nusing namespace std;\n\nclass Rectangle {\npublic:\n    int width;\n    int height;\n    int area() {\n        return width * height;\n    }\n};\n\nint main() {\n    Rectangle rect;\n    rect.width = 5;\n    rect.height = 3;\n    cout << rect.area();\n    return 0;\n}\n```",
            'options' => json_encode(['A. 15', 'B. 8', 'C. 5', 'D. Error']),
            'correct_answer' => '0',
            'penjelasan' => 'Fungsi area menghitung luas persegi panjang dengan mengalikan width dan height. Dalam kasus ini, 5 * 3 menghasilkan 15.'
            ],
            [
            'language' => 'C++',
            'level' => 18,
            'type' => 'isian',
            'question_text' => "Perhatikan kode berikut. Lengkapi bagian yang kosong (___) agar fungsi fibonacci mengembalikan nilai Fibonacci dari n:\n\n```cpp\n#include <iostream>\nusing namespace std;\n\nint fibonacci(int n) {\n    if (n <= 1) {\n        return n;\n    } else {\n        return fibonacci(n - 1) + fibonacci(n - 2);\n    }\n}\n\nint main() {\n    int result = fibonacci(6);\n    cout << result;\n    return 0;\n}\n```",
            'options' => json_encode([]),
            'correct_answer' => 'fibonacci(n - 1) + fibonacci(n - 2)',
            'penjelasan' => 'Fungsi fibonacci menggunakan pendekatan rekursif untuk menghitung nilai Fibonacci. Jika n lebih besar dari 1, fungsi memanggil dirinya sendiri dengan n - 1 dan n - 2, kemudian menjumlahkan hasilnya untuk mendapatkan nilai Fibonacci dari n.'
            ],
            [
            'language' => 'C++',
            'level' => 19,
            'type' => 'pilihan_ganda',
            'question_text' => "Apa output dari kode berikut?\n\n```cpp\n#include <iostream>\nusing namespace std;\n\nclass Animal {\npublic:\n    virtual void makeSound() {\n        cout << \"Animal sound\";\n    }\n};\n\n\nclass Dog : public Animal {\npublic:\n    void makeSound() override {\n        cout << \"Woof\";\n    }\n};\n\nint main() {\n    Animal* animal = new Dog();\n    animal->makeSound();\n    delete animal;\n    return 0;\n}\n```",
            'options' => json_encode(['A. Animal sound', 'B. Woof', 'C. Error', 'D. No output']),
            'correct_answer' => '1',
            'penjelasan' => 'Karena fungsi makeSound() dideklarasikan sebagai virtual di kelas Animal dan di override di kelas Dog, maka ketika kita memanggil makeSound() melalui pointer ke Animal yang sebenarnya menunjuk ke objek Dog, fungsi yang dipanggil adalah versi Dog, sehingga outputnya adalah "Woof".'
            ],
            [
            'language' => 'C++',
            'level' => 20,
            'type' => 'isian',
            'question_text' => "Lengkapi kode berikut agar fungsi isPrime mengembalikan true jika n adalah bilangan prima dan false jika n bukan bilangan prima:\n\n```cpp\n#include <iostream>\nusing namespace std;\n\nbool isPrime(int n) {\n    if (n <= 1) {\n        return false;\n    }\n    for (int i = 2; i <= n / 2; i++) {\n        if (n % i == 0) {\n            return false;\n        }\n    }\n    return true;\n}\n\nint main() {\n    int number = 17;\n    if (isPrime(number)) {\n        cout << number << \" is a prime number.\";\n    } else {\n        cout << number << \" is not a prime number.\";\n    }\n    return 0;\n}\n```",
            'options' => json_encode([]),
            'correct_answer' => 'return false;',
            'penjelasan' => 'Fungsi isPrime memeriksa apakah n adalah bilangan prima dengan memeriksa apakah n habis dibagi oleh angka dari 2 hingga n/2. Jika n habis dibagi oleh salah satu angka tersebut, maka n bukan bilangan prima, sehingga kita mengembalikan false. Jika n tidak habis dibagi oleh angka manapun, maka n adalah bilangan prima, sehingga kita mengembalikan true.'
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
