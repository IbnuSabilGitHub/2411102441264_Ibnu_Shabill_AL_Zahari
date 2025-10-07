# Laporan Praktikum 4

## Informasi

**Nama:** Ibnu Shabill Al Zahari  
**NIM:** 2411102441264  
**Mata Kuliah:** Praktikum Pemrograman Web  
**Tanggal:** 6 Oktober 2025

---

## Pendahuluan

Praktikum kali ini membahas tentang implementasi CSS styling dan pembuatan menu dropdown navigation dalam pengembangan web. Dalam praktikum ini, saya akan menganalisis efek dari perubahan link stylesheet pada file HTML dan mengimplementasikan sistem navigasi dropdown yang menghubungkan berbagai materi praktikum yang telah dikerjakan sebelumnya.

Praktikum ini terdiri dari dua bagian utama yaitu analisis perubahan referensi stylesheet dan implementasi menu dropdown navigation yang terintegrasi dengan halaman About Me yang berisi profil personal.

---

## Tugas 1: Analisis Perubahan Link Stylesheet

### Soal

Pada praktikum 4.3, ubahlah script pada baris 5 menjadi:`<link rel="stylesheet" type="text/css" href="#">` Jalankan dibrowser, amati dan jelaskan mengapa hasilnya seperti itu!


### Hasil Pengamatan

Ketika file HTML dijalankan di browser setelah perubahan, tampilan halaman berubah drastis dibandingkan dengan tampilan sebelumnya. Halaman kehilangan semua styling CSS yang sebelumnya diterapkan melalui file `style.css`.

### Analisis Hasil

Kegagalan pemuatan dan penerapan gaya disebabkan oleh penggunaan href="#" pada tautan stylesheet, yang menyebabkan browser tidak dapat menemukan file CSS eksternal yang valid (simbol '#' merujuk ke anchor dalam halaman, bukan file). Akibatnya, semua aturan CSS tidak diterapkan, dan elemen HTML kembali ke tampilan default browser, seperti font, tanpa background image (termasuk yang dari Unsplash), tanpa pewarnaan atau layout yang telah diatur (seperti heading ungu dengan teks rata tengah, serta margin dan warna paragraf yang hilang).

---

## Tugas 2: Implementasi Menu Dropdown Navigation

### Soal

Seperti Latihan pada Praktikum 4.7, buatlah sebuah menu dropdownberikut yang berisi materi praktikum yang sudah dikerjakan dan bisa dibuka melalui menu tersebut. Untuk bagian About Me berisi tentang profil/biodata dilengkapi dengan fotoAnda!

### Struktur Navigation

Menu dropdown yang dikembangkan memiliki struktur hierarkis yang mencakup empat praktikum utama yang telah dikerjakan. Setiap praktikum memiliki submenu yang mengarah ke latihan-latihan spesifik yang telah diselesaikan.

- Praktikum 1 mencakup pembelajaran dasar HTML dengan fokus pada struktur dasar     dokumen, penggunaan heading untuk hierarki konten, implementasi paragraf untuk teks, pembuatan link untuk navigasi, penggunaan gambar, pembuatan list terurut dan tidak terurut, serta penggunaan div sebagai container element.

- Praktikum 2 membahas implementasi CSS dengan berbagai aspek seperti penggunaan CSS eksternal, pemahaman selector CSS, manipulasi properti text, pengaturan warna dan background, konsep box model, dan implementasi layout dasar untuk struktur halaman.

- Praktikum 3 memperkenalkan framework CSS modern yaitu Bootstrap dan Tailwind CSS. Kedua framework ini memberikan pendekatan yang berbeda dalam styling dengan Bootstrap yang component-based dan Tailwind yang utility-first.

- Praktikum 4 merupakan praktikum lanjutan yang mencakup tujuh latihan berbeda, mulai dari implementasi CSS lanjutan hingga pembuatan menu dropdown yang sedang dikerjakan saat ini.

### Implementasi CSS Styling

Sistem styling untuk menu dropdown menggunakan kombinasi teknik CSS yang mencakup pengaturan font family Arial dan Verdana untuk keterbacaan optimal, implementasi display block dan position relative untuk mengatur layout horizontal menu, penggunaan display none untuk menyembunyikan submenu secara default, dan implementasi hover effects.

Warna yang dipilih menggunakan skema hijau dengan background utama menggunakan kode warna #025702 dan efek hover menggunakan #72e364 untuk memberikan feedback visual yang jelas kepada pengguna. Submenu menggunakan background #3b3b3b dengan hover effect yang konsisten.

### Halaman About Me

Halaman About Me dirancang dengan pendekatan modern dan responsif menggunakan CSS Grid dan Flexbox. Halaman ini menampilkan foto profil dengan efek grayscale dan border radius untuk tampilan yang profesional.

Informasi yang disajikan mencakup biodata lengkap seperti nama, tempat tanggal lahir, email, dan nomor telepon yang ditampilkan dalam format badge. Bagian tentang saya memberikan deskripsi singkat tentang latar belakang sebagai mahasiswa Teknik Informatika dengan minat pada web development dan artificial intelligence.

Keterampilan teknis ditampilkan menggunakan icon dari Devicon dan Font Awesome untuk memberikan visualisasi yang menarik. Skills yang ditampilkan mencakup bahasa pemrograman seperti HTML, CSS, JavaScript, TypeScript, C++, dan Python, serta framework dan library seperti React, Next.js, Flask, dan FastAPI.

Bagian pendidikan menampilkan informasi akademis terkini, sedangkan bagian kontak menyediakan berbagai cara untuk menghubungi melalui email, Instagram, dan GitHub dengan styling yang konsisten menggunakan badge




---

## Kesimpulan

Praktikum ini memberikan pemahaman mendalam tentang pentingnya referensi stylesheet yang benar dalam pengembangan web dan implementasi sistem navigasi. Perubahan kecil pada referensi CSS dapat berdampak signifikan pada tampilan keseluruhan halaman web, yang menunjukkan betapa pentingnya manajemen asset dalam web development.
Implementasi menu dropdown navigation memberikan pengalaman pembelajaran yang komprehensif tentang CSS hover effects, positioning, dan strukturing konten.
