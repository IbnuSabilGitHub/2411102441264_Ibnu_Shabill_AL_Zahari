# Laporan Praktikum 6
---

## Informasi

**Nama:** Ibnu Shabill Al Zahari  
**NIM:** 2411102441264  
**Mata Kuliah:** Praktikum Pemrograman Web  
**Tanggal:** 17 Oktober 2025

---

## 1. Pendahuluan

Praktikum kali ini membahas tentang dasar-dasar pemrograman PHP (Hypertext Preprocessor) yang merupakan bahasa pemrograman yang dapat disematkan ke dalam kode HTML, atau dapat digunakan dalam kombinasi dengan berbagai sistem templat web, sistem manajemen konten web, dan kerangka kerja web. Dalam praktikum ini, saya akan mempelajari struktur dasar PHP, penggunaan statement echo, variabel, komentar, dan integrasi PHP dengan HTML.

PHP berbeda dengan HTML dan JavaScript karena kode PHP dijalankan di sisi server, bukan di browser. Hal ini memungkinkan kita untuk membuat halaman web yang dinamis dan interaktif dengan kemampuan akses database, manipulasi file, dan pengolahan data yang lebih kompleks.

---

## 2. Persiapan Lingkungan Pengembangan PHP

Sebelum itu, kita perlu menyiapkan lingkungan pengembangan PHP dengan menggunakan XAMPP.

### Langkah-langkah Instalasi dan Konfigurasi XAMPP

#### 2.1 Menjalankan XAMPP Control Panel
- Buka XAMPP Control Panel sebagai Administrator
- Klik tombol "Start" pada modul Apache untuk menjalankan web server
- Tunggu hingga Apache berwarna hijau dan menunjukkan port yang digunakan (biasanya port 80 dan 443)
- MySQL juga bisa dijalankan jika diperlukan untuk praktikum database

#### 2.2 Membuat Folder Project
- Buka folder `C:\xampp\htdocs\` menggunakan File Explorer
- Buat folder baru untuk project praktikum, misal: `Web-php`
- Semua file PHP harus disimpan di dalam folder `htdocs` atau subfolder-nya
- Struktur folder: `C:\xampp\htdocs\Web-php\01_struktur_dasar\`

#### 2.3 Membuat File PHP
- Buat file PHP menggunakan text editor
- Simpan file dengan ekstensi `.php` (contoh: `test1.php`)
- Pastikan file disimpan dalam folder `htdocs` atau subfoldernya

#### 2.4 Mengakses File PHP melalui Browser
- Buka browser (Chrome, Firefox, Edge, atau browser lainnya)
- Ketik URL: `http://localhost/Web-php/01_struktur_dasar/test1.php`
- Format URL: `http://localhost/<namaFolder>/<namaSubfolder>/<file.php>`
- PHP akan diproses oleh server dan hasilnya ditampilkan di browser

---

## 3. Latihan Praktikum PHP

### 3.1 Struktur Dasar PHP (test1.php)

File `test1.php` mendemonstrasikan struktur dasar PHP dengan penggunaan tag pembuka `<?php` dan penutup `?>`. `echo` digunakan untuk menampilkan output ke browser. 

Dua echo pertama tidak memiliki `<br />`, sehingga teksnya tampil bersebelahan. Dua echo terakhir menggunakan `<br />` sehingga membuat baris baru.


### 3.2 Analisis Error pada (test2.php)

File `test2.php` error pada baris 2 dimana penulisan statement `cho "Hello, World";` seharusnya `echo "Hello, World";`. Kesalahan ini merupakan ``Syntax Error (Fatal Error)`` yang menyebabkan PHP tidak dapat mengeksekusi script.

Ketika file dijalankan, browser akan menampilkan pesan error seperti `Parse error: syntax error, unexpected double-quoted string "Hello, World" in C:\xampp\htdocs\Web-php\01_struktur_dasar\test2.php on line 2`. Error ini terjadi karena PHP interpreter mencari fungsi bernama `cho()` yang tidak exist dalam standar PHP. Meskipun `echo` bisa ditulis dengan berbagai kapitalisasi (`ECHO`, `Echo`, `echo`), namun huruf-hurufnya harus lengkap  `cho` adalah identifier yang berbeda dengan `echo`.


### 3.3 Variabel dalam PHP (helloworld.php)

File `helloworld.php` mendemonstrasikan penggunaan variabel dalam PHP. Variabel di PHP diawali dengan tanda `$` dan bersifat loosely typed, artinya tidak perlu deklarasi tipe data secara eksplisit. Variabel dapat menyimpan berbagai tipe data seperti string, integer, float, boolean, array, dan object.

Dalam file ini, variabel `$teks` menyimpan string "Hello World!", `$sebuah_bilangan` menyimpan integer 4, dan `$bilanganYangLain` menyimpan float 8.567. Operator `.` (dot) digunakan untuk concatenation (penggabungan string dengan variabel lain). Escape character `\$` digunakan agar tanda `$` ditampilkan sebagai teks literal, bukan sebagai penanda variabel.


### 3.4 Komentar dalam PHP (komentar.php)

File `komentar.php` mendemonstrasikan berbagai jenis komentar yang didukung oleh PHP. PHP mendukung tiga jenis komentar: single-line comment dengan `//` yang cocok untuk komentar singkat dari posisi `//` hingga akhir baris, single-line comment dengan `#` yang merupakan style Unix/Perl dengan fungsi sama seperti `//`, dan multi-line comment dengan `/* */` yang dapat mencakup beberapa baris dan berguna untuk dokumentasi yang lebih panjang.

Komentar sangat penting dalam pemrograman untuk mendokumentasikan kode, menjelaskan logika kompleks, atau temporary menonaktifkan kode.


### 3.5 Penggunaan Warna dengan HTML Tag (color.php)

File `color.php` mendemonstrasikan kemampuan PHP untuk menghasilkan output HTML dengan tag dan atribut. Dalam contoh ini, statement `echo` digunakan untuk menampilkan teks dengan warna berbeda menggunakan tag HTML `<font>`.

PHP fleksibel dalam penggunaan tanda kutip single quote (`'`) dan double quote (`"`) dapat digunakan untuk mendefinisikan string. Ketika menggunakan double quote di dalam string yang juga menggunakan double quote, maka quote inner harus di-escape dengan backslash (`\"`).


### 3.6 Integrasi PHP dengan HTML (test3.php)

File `test3.php` mendemonstrasikan bagaimana PHP dapat disisipkan di antara kode HTML standar. File PHP dapat berisi campuran HTML dan PHP, dimana tag `<?php ?>` digunakan untuk menandai bagian yang akan diproses oleh PHP interpreter.


### 3.7 PHP dalam Tag HTML (test4.php)

File `test4.php` mendemonstrasikan fleksibilitas penggunaan PHP dalam menghasilkan berbagai elemen HTML. PHP dapat di-embed di berbagai bagian dokumen HTML termasuk di dalam tag `<head>` untuk menghasilkan `<title>`, di dalam `<body>` untuk menghasilkan konten, atau di manapun yang diperlukan.


---

## 4. Kesimpulan

Praktikum ini memberikan pemahaman dasar tentang penggunaan PHP sebagai bahasa pemrograman server-side. Saya belajar tentang struktur dasar PHP, penggunaan statement echo untuk output, cara mendefinisikan dan menggunakan variabel, serta komentar dalam kode. Selain itu, saya juga memahami bagaimana PHP dapat diintegrasikan dengan HTML untuk membuat halaman web yang dinamis. PHP menawarkan fleksibilitas dalam penulisan kode dan kemampuan untuk menghasilkan konten web yang interaktif dan menarik.

---

## Referensi

EKo Siswanto, S. M. (2021). PHP Uncover (Kupas Tuntas Pemprograman PHP). Jln Majapahit No 605 Semarang: YAYASAN PRIMA AGUS TEKNIK.

PHP. (2025). PHP: PHP Manual - Manual. Retrieved from Php.net: https://www.php.net/manual/en/


---
