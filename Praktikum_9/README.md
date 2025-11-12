# Laporan Praktikum 9
---

## Informasi

**Nama:** Ibnu Shabill Al Zahari  
**NIM:** 2411102441264  
**Mata Kuliah:** Praktikum Pemrograman Web  
**Tanggal:** 12 November 2025

---

## 1. Pendahuluan

Praktikum kali ini membahas tentang statemen kontrol kondisional dalam PHP yang merupakan salah satu konsep fundamental dalam pemrograman. Statemen kontrol kondisional memungkinkan program untuk membuat keputusan dan mengeksekusi kode yang berbeda berdasarkan kondisi tertentu yang dievaluasi pada saat runtime. Dalam pemrograman web, kemampuan untuk membuat keputusan berdasarkan input pengguna, data dari database, atau kondisi lainnya sangat penting untuk menciptakan aplikasi yang dinamis dan interaktif. PHP menyediakan beberapa struktur kontrol kondisional seperti IF, ELSE, ELSEIF, dan SWITCH yang masing-masing memiliki karakteristik dan kasus penggunaan yang berbeda.

---

## 2. Statemen Kontrol Kondisional dalam PHP

Statemen kontrol kondisional dalam PHP merupakan struktur yang memungkinkan program untuk mengeksekusi blok kode tertentu berdasarkan evaluasi ekspresi boolean yang menghasilkan nilai TRUE atau FALSE. Struktur IF adalah yang paling dasar dimana kode di dalam blok IF hanya akan dieksekusi jika kondisi bernilai TRUE, dan dapat diperluas dengan ELSE untuk menangani kondisi FALSE, serta ELSEIF untuk mengevaluasi beberapa kondisi secara berurutan. Operator perbandingan seperti sama dengan, lebih besar dari, lebih kecil dari, dan operator logika seperti AND, OR, NOT dapat digunakan untuk membuat kondisi yang kompleks. Statemen IF-ELSE sangat cocok untuk situasi dimana terdapat dua atau beberapa kemungkinan hasil berdasarkan kondisi yang dievaluasi, seperti validasi input pengguna, pengecekan hak akses, atau perhitungan dengan aturan berbeda.

Selain IF-ELSE, PHP juga menyediakan struktur SWITCH yang lebih efisien dan readable untuk menangani multiple conditions dimana satu variabel dibandingkan dengan banyak nilai yang berbeda. Struktur SWITCH mengevaluasi ekspresi sekali dan kemudian membandingkan hasilnya dengan nilai di setiap CASE, mengeksekusi blok kode yang sesuai ketika ada kecocokan. Setiap CASE harus diakhiri dengan statement BREAK untuk mencegah fall-through ke case berikutnya, dan dapat memiliki default case yang akan dieksekusi jika tidak ada case yang cocok. SWITCH lebih cocok digunakan untuk situasi seperti menu selection, status checking, atau mapping nilai ke label tertentu dimana variabel dibandingkan dengan nilai-nilai diskrit yang sudah diketahui, memberikan kode yang lebih bersih dan mudah dimaintain dibandingkan banyak IF-ELSEIF berturut-turut.

---

## 3. Latihan Praktikum PHP

### 3.1 Soal 1
Buatlah form untuk memasukkan bilangan yang menyatakan tahun. Setelah form tersebut disubmit, maka akan muncul apakah tahun tersebut termasuk tahun kabisat atau tidak. Gunakan script PHP untuk membuat hal ini.

#### Penjelasan
Permasalahan ini meminta implementasi pengecekan tahun kabisat menggunakan logika kondisional. Algoritma tahun kabisat memiliki tiga aturan utama yaitu tahun yang habis dibagi 4 adalah kabisat, kecuali tahun yang habis dibagi 100 bukan kabisat, namun tahun yang habis dibagi 400 tetap kabisat. Implementasi menggunakan operator modulus untuk pengecekan divisibilitas dan struktur kondisional bersarang untuk evaluasi aturan secara berurutan.

Pada file `soal_1.php`, fungsi ini TahunKabisat menerima parameter integer tahun dan mengembalikan boolean dengan logika kondisional bertingkat. Pertama dicek apakah tahun tidak habis dibagi 4 maka langsung return FALSE, kemudian jika tahun tidak habis dibagi 100 maka return TRUE karena memenuhi syarat kabisat, dan terakhir dicek apakah tahun habis dibagi 400 untuk kasus century year. Validasi input memastikan tahun harus berupa angka antara 1000 hingga 9999 untuk menghindari input yang tidak valid seperti tahun satu digit atau tahun negatif.

Hasil pengecekan ditampilkan dengan indikator visual yang berbeda menggunakan conditional styling dimana tahun kabisat ditampilkan dengan warna hijau dan icon check, sedangkan bukan kabisat dengan warna biru dan icon calendar. Informasi tambahan berupa penjelasan aturan tahun kabisat juga ditampilkan untuk memberikan edukasi kepada pengguna. Implementasi ini mendemonstrasikan penggunaan struktur kondisional nested dan operator modulus untuk membuat keputusan berdasarkan aturan matematis yang kompleks.

### 3.2 Soal 2
Karyawan honorer di perusahan XXX digaji berdasarkan jumlah jam kerjanya selama satu minggu. Upah per jamnya adalah Rp. 2.000,-. Bila jumlah jam kerja selama satu minggunya lebih besar dari 48 jam, maka sisanya dianggap jam lembur dengan upah per jam lemburnya adalah Rp. 3.000,-. Buatlah form untuk memasukkan jumlah jam kerja selama satu minggu seorang karyawan. Setelah form disubmit, maka akan tampil jumlah upah yang diterima karyawan tersebut. Gunakan script PHP untuk membuat hal ini.

#### Penjelasan
Permasalahan ini mengimplementasikan sistem penggajian karyawan dengan dua rate berbeda untuk jam normal dan jam lembur menggunakan struktur kondisional IF-ELSE. Logika bisnis yang diterapkan adalah jam kerja hingga 48 jam dihitung dengan upah normal Rp. 2.000 per jam, sedangkan kelebihan jam kerja di atas 48 jam dihitung sebagai lembur dengan upah Rp. 3.000 per jam yang lebih tinggi untuk memberikan kompensasi ekstra kepada karyawan yang bekerja overtime.

Fungsi hitungGaji pada `soal_2.php` menerima parameter jam kerja, upah per jam, upah lembur, dan batas jam untuk menghitung total gaji dengan return berupa array asosiatif yang berisi total gaji dan jam lembur. Struktur kondisional IF-ELSE digunakan dimana jika jam kerja kurang dari atau sama dengan 48 jam maka total gaji adalah jam kerja dikali upah per jam, namun jika lebih dari 48 jam maka dihitung dua komponen yaitu 48 jam pertama dengan upah normal dan sisanya dengan upah lembur. Validasi input memastikan jam kerja berupa angka antara 0 hingga 168 jam karena satu minggu maksimal memiliki 168 jam.

Hasil perhitungan ditampilkan dalam format terstruktur dengan breakdown detail mencakup jumlah jam kerja normal, jam lembur jika ada, upah per jam untuk masing-masing kategori, dan total gaji yang diterima menggunakan fungsi formatRupiah untuk format mata uang Indonesia. Implementasi ini menunjukkan penerapan conditional logic dalam perhitungan payroll dengan aturan bisnis yang berbeda untuk kondisi normal dan overtime sesuai dengan praktik umum di dunia kerja.

### 3.3 Soal 3
Soal analog no. 2, namun dalam hal ini terdapat 4 jenis upah perjam nya mdibedakan berdasarkan golongan:
Golongan Upah perjam
- A = Rp. 4.000,-
- B = Rp. 5.000,-
- C = Rp. 6.000,-
- D = Rp. 7.500,-

Sedangkan upah lemburnya dihitung sama untuk setiap golongan, yaitu Rp. 3.000,- per jamnya. Buatlah form untuk mengisikan jumlah jam kerja selama seminggu, dan juga memilih golongan karyawannya (gunakan combo box). Apabila form tersebut disubmit maka akan muncul jumlah upah yang diperoleh karyawan.

#### Penjelasan
Permasalahan ini merupakan pengembangan dari soal sebelumnya dengan menambahkan variabel golongan karyawan yang mempengaruhi upah per jam normal namun upah lembur tetap sama untuk semua golongan. Implementasi menggunakan struktur SWITCH untuk mapping golongan ke upah per jam yang mendemonstrasikan penggunaan SWITCH sebagai alternatif yang lebih efisien dibandingkan multiple IF-ELSEIF untuk kasus dimana satu variabel dibandingkan dengan beberapa nilai diskrit.

Fungsi upahPerJam pada `soal_3.php` menggunakan struktur SWITCH-CASE untuk mengembalikan upah berdasarkan parameter golongan dimana case A return 4000, case B return 5000, case C return 6000, case D return 7500, dan default return 0 untuk golongan yang tidak valid. Setelah mendapatkan upah per jam dari golongan, logika perhitungan gaji menggunakan fungsi hitungGaji yang sama seperti soal sebelumnya dengan membedakan jam normal dan jam lembur berdasarkan batas 48 jam. Validasi input memastikan golongan harus salah satu dari A, B, C, atau D menggunakan fungsi in_array dan jam kerja harus valid antara 0 hingga 168 jam.

Hasil perhitungan menampilkan informasi lengkap termasuk golongan karyawan, total jam kerja, breakdown jam normal dan jam lembur, upah per jam sesuai golongan, upah lembur, dan total gaji yang diterima dalam format rupiah. Implementasi ini menunjukkan kombinasi struktur SWITCH untuk selection logic dan IF-ELSE untuk computational logic dalam satu aplikasi, memberikan solusi yang clean dan maintainable untuk sistem penggajian dengan multiple employee grades.

### 3.4 Soal 4
Dengan menggunakan konsep SWITCH, buatlah script untuk membaca bulan saat ini dan tampilkan jumlah hari dalam bulan tersebut.

#### Penjelasan
Permasalahan ini meminta implementasi untuk menampilkan informasi bulan saat ini dan jumlah harinya menggunakan struktur SWITCH yang merupakan best practice untuk mapping nilai numerik ke label dan atribut terkait. Fungsi date dengan parameter n digunakan untuk mendapatkan nomor bulan saat ini dalam format numerik 1 hingga 12 tanpa leading zero, kemudian SWITCH digunakan untuk mapping nomor bulan ke nama bulan dalam bahasa Indonesia dan menentukan jumlah hari dalam bulan tersebut.

Implementasi pada `soal_4.php` membuat dua fungsi yaitu getMonthName dan getDaysInMonth yang keduanya menggunakan struktur SWITCH-CASE. Fungsi getMonthName memiliki 12 case untuk mapping angka 1 hingga 12 ke nama bulan dalam bahasa Indonesia dengan default case untuk bulan tidak valid. Fungsi getDaysInMonth menggunakan SWITCH dengan case yang dikelompokkan dimana bulan-bulan dengan 31 hari yaitu Januari, Maret, Mei, Juli, Agustus, Oktober, dan Desember dikelompokkan dalam satu return statement, bulan dengan 30 hari yaitu April, Juni, September, dan November dikelompokkan dalam return statement lainnya, dan Februari diasumsikan memiliki 28 hari untuk tahun biasa sesuai requirement soal tanpa memperhitungkan tahun kabisat.

Hasil ditampilkan dengan informasi tanggal lengkap saat ini menggunakan fungsi date, nama bulan hasil mapping dari SWITCH, dan jumlah hari dalam bulan tersebut dengan visual yang menarik menggunakan icon calendar. Implementasi ini mendemonstrasikan penggunaan SWITCH untuk constant mapping dan grouping cases dengan fall-through behavior dimana multiple cases dapat share satu block of code, serta menunjukkan bagaimana SWITCH lebih readable dan maintainable dibandingkan long chain of IF-ELSEIF untuk kasus seperti ini.

---

## 4. Kesimpulan

Praktikum ini memberikan pemahaman mendalam tentang statemen kontrol kondisional dalam PHP yaitu struktur IF-ELSE dan SWITCH yang merupakan fondasi dalam membuat aplikasi web yang dinamis dan dapat membuat keputusan berdasarkan kondisi tertentu. Struktur IF-ELSE cocok untuk evaluasi kondisi boolean yang kompleks dengan operator perbandingan dan logika, sedangkan SWITCH lebih efisien dan readable untuk situasi dimana satu variabel dibandingkan dengan banyak nilai diskrit yang sudah diketahui. Melalui empat soal praktikum, berhasil diimplementasikan aplikasi pengecekan tahun kabisat dengan conditional logic bersarang, sistem perhitungan gaji karyawan dengan rate berbeda untuk jam normal dan lembur, sistem penggajian dengan multiple employee grades menggunakan kombinasi SWITCH dan IF-ELSE, serta aplikasi informasi kalender menggunakan SWITCH untuk mapping dan grouping cases. Pemahaman tentang kapan menggunakan IF-ELSE versus SWITCH, bagaimana membuat kondisi yang efisien, dan best practices dalam penulisan conditional statements sangat penting untuk pengembangan aplikasi web yang robust, maintainable, dan mengikuti coding standards yang baik.


---


## 5. Daftar pustaka
GeeksforGeeks. (2017, 10 13). PHP | Decision Making. Retrieved from GeeksforGeeks: https://www.geeksforgeeks.org/php/php-decision-making/

Ridwan, E. (2024, 2 29). Apa Itu Tahun Kabisat? Begini Arti, Sejarah, hingga Cara Menghitungnya. Retrieved from detiksulsel: https://www.detik.com/sulsel/berita/d-7217979/apa-itu-tahun-kabisat-begini-arti-sejarah-hingga-cara-menghitungnya

