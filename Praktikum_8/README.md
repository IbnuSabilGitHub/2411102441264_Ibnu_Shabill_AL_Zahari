# Laporan Praktikum 8
---

## Informasi

**Nama:** Ibnu Shabill Al Zahari  
**NIM:** 2411102441264  
**Mata Kuliah:** Praktikum Pemrograman Web  
**Tanggal:** 5 November 2025

---

## 1. Pendahuluan

Praktikum kali ini membahas tentang metode pengiriman data form dalam PHP menggunakan POST dan GET. Form merupakan salah satu elemen penting dalam aplikasi web yang memungkinkan pengguna untuk mengirimkan data ke server untuk diproses. Dalam pemrograman web, terdapat dua metode utama untuk mengirimkan data form yaitu metode POST dan metode GET, dimana masing-masing memiliki karakteristik, kelebihan, dan kasus penggunaan yang berbeda. Pemahaman yang baik tentang kedua metode ini sangat penting dalam pengembangan aplikasi web karena berkaitan dengan keamanan data, user experience, dan best practices dalam web development, dimana POST umumnya digunakan untuk data sensitif dan GET lebih cocok untuk request yang dapat di-bookmark seperti pencarian atau filtering data.

---

## 2. Metode POST dan GET dalam PHP

Metode POST dan GET merupakan dua cara utama dalam mengirimkan data dari form HTML ke server untuk diproses oleh script PHP. Metode POST mengirimkan data melalui body HTTP request sehingga data tidak terlihat di URL, memberikan tingkat keamanan yang lebih baik untuk data sensitif seperti password, informasi pribadi, atau data keuangan. POST tidak memiliki batasan ukuran data yang signifikan dan cocok untuk mengirim data dalam jumlah besar seperti upload file atau form dengan banyak field. Data yang dikirim melalui POST tidak tersimpan di browser history dan tidak bisa di-bookmark, sehingga lebih aman namun kurang praktis untuk sharing link. Dalam PHP, data POST diakses menggunakan superglobal variable `$_POST` yang berisi array asosiatif dari semua data yang dikirim melalui metode POST.

Metode GET mengirimkan data sebagai query string yang ditambahkan di URL setelah tanda tanya, sehingga semua data terlihat jelas di address bar browser. GET memiliki batasan panjang URL sekitar 2048 karakter yang membatasi jumlah data yang dapat dikirim, dan lebih cocok untuk request pencarian atau filtering data dimana parameter perlu terlihat dan dapat di-bookmark atau dibagikan. Karena data terlihat di URL dan tersimpan di browser history serta server logs, GET sangat tidak disarankan untuk data sensitif. Dalam PHP, data GET diakses menggunakan superglobal variable `$_GET` yang juga berupa array asosiatif. Pemilihan antara POST dan GET harus mempertimbangkan aspek keamanan, ukuran data, dan requirement fungsional aplikasi, dimana umumnya form login dan registrasi menggunakan POST untuk keamanan, sementara form pencarian dan filter menggunakan GET untuk kemudahan bookmarking dan sharing.

---

## 3. Latihan Praktikum PHP

### 3.1 Soal 1
Berdasarkan soal no 1 pada pertemuan sebelumnya, tambahkan form input untuk memasukkan saldo awal, besar bunga perbulan dan juga lama bulan. Jangan lupa untuk menambahkan tombol submit dan reset. Apabila tombol submit diklik, maka semua data input akan diproses ke script PHP untuk diolah menghasilkan saldo akhir pada bulan tertentu. Ada seorang nasabah bank yang menabung di bank X dengan saldo awal Rp. 1.000.000,-. Bank X menerapkan kebijakan bunga 0,25% perbulan dari saldo awal tabungan. Hitunglah jumlah saldo akhir nasabah tersebut setelah 11 bulan.

#### Penjelasan
Permasalahan ini merupakan pengembangan dari soal praktikum sebelumnya dimana sekarang pengguna dapat memasukkan nilai saldo awal, besar bunga per bulan, dan lama menabung secara dinamis melalui form HTML. 

Pada sisi PHP dalam file `soal_1.php`, pertama dilakukan validasi request menggunakan `$_SERVER['REQUEST_METHOD']` untuk memastikan metode POST, kemudian validasi input untuk memastikan data valid seperti `saldo_awal` harus angka positif, `besar_bunga_per_bulan` antara 0-100, dan `lama_menabung` maksimal 1200 bulan. Data diambil menggunakan `$_POST['saldo_awal']`, `$_POST['besar_bunga_per_bulan']`, dan `$_POST['lama_menabung']`, dengan nilai bunga persentase dikonversi ke desimal dengan membagi 100. Perhitungan menggunakan rumus bunga majemuk `$saldoAkhir = $saldoAwal * pow((1 + $bunga), $bulan)` dimana fungsi `pow()` melakukan operasi perpangkatan untuk compound interest.

Hasil perhitungan menampilkan saldo akhir, total bunga yang diperoleh, dan persentase pertumbuhan investasi dalam format rupiah menggunakan `number_format()` dengan pemisah ribuan berupa titik. Implementasi ini mendemonstrasikan penggunaan form POST untuk aplikasi finansial yang memerlukan keamanan data dan proses perhitungan matematis yang kompleks dengan validasi input yang ketat untuk mencegah error dan memastikan data yang diproses sesuai dengan ketentuan perhitungan bunga tabungan.

### 3.2 Soal 2
Berdasarkan soal no 2 pada pertemuan sebelumnya, tambahkan form input untuk memasukkan jumlah uang. Jangan lupa untuk menambahkan tombol submit dan reset. Apabila tombol submit diklik, maka semua data input akan diproses ke script PHP untuk diolah menghasilkan banyaknya jumlah pecahan. Ibu ingin mengambil uang tabungan sejumlah Rp. 1.575.250,- yang dimilikinya di sebuah bank. Misalkan pada saat itu uang pecahan yang berlaku adalah Rp. 100.000,-; Rp. 50.000,-; Rp. 20.000,-; Rp. 5.000,-; Rp. 100,- dan Rp. 50. Dengan menggunakan script PHP, tentukan banyaknya masing-masing uang pecahan yang diperoleh ibu tadi.

#### Penjelasan
Permasalahan ini mengembangkan aplikasi penukaran pecahan uang dari praktikum sebelumnya dengan menambahkan form HTML yang memungkinkan pengguna memasukkan jumlah uang secara dinamis.

Pada file PHP `soal_2.php`, setelah validasi metode POST, data diambil menggunakan `$_POST['jumlah_uang']` dan dihitung pembagian pecahan secara berurutan dari terbesar ke terkecil. Untuk setiap pecahan, jumlah lembar dihitung dengan `(int)($jumlahUang / nilai_pecahan)` menggunakan type casting integer untuk hasil pembagian bulat, dan sisa uang dihitung dengan operator modulus `$sisaUang = $jumlahUang % nilai_pecahan`. Proses diulang untuk semua pecahan yaitu Rp. 100.000, Rp. 50.000, Rp. 20.000, Rp. 10.000, Rp. 5.000, Rp. 2.000, Rp. 1.000, Rp. 500, Rp. 100, dan Rp. 50, mencakup semua pecahan rupiah yang beredar di Indonesia.

Hasil ditampilkan dalam tabel terstruktur dengan informasi jumlah uang yang ditukar dan detail setiap pecahan beserta jumlah lembarnya menggunakan fungsi `formatRupiah()` untuk format Indonesia dengan pemisah ribuan berupa titik. Implementasi ini menunjukkan penerapan operator aritmatika pembagian integer dan modulus dalam menyelesaikan masalah praktis penukaran uang dengan metode POST untuk keamanan dan efisiensi pemrosesan data.

### 3.3 Soal 3

#### Penjelasan
Permasalahan ini meminta pembuatan sistem pendaftaran mahasiswa baru yang komprehensif dengan berbagai jenis input form HTML seperti text input untuk nama lengkap dan tempat lahir, tiga select dropdown terpisah untuk tanggal lahir (tanggal 1-31, bulan 1-12, tahun 1980-2005), textarea untuk alamat rumah, radio button untuk jenis kelamin (Pria/Wanita), text input untuk asal sekolah, dan number input dengan `step="0.01"` untuk nilai UAN.

Pada file PHP `soal_3.php`, setelah validasi metode POST, data diambil dari array `$_POST` untuk setiap field seperti `$_POST['nama_lengkap']`, `$_POST['tempat_lahir']`, `$_POST['tanggal']`, `$_POST['bulan']`, `$_POST['tahun']`, `$_POST['alamat_rumah']`, `$_POST['jenis_kelamin']`, `$_POST['asal_sekolah']`, dan `$_POST['nilai_uan']`. Untuk format tanggal lahir yang lebih readable, dibuat array asosiatif `$nama_bulan` yang memetakan angka bulan ke nama bulan Indonesia, kemudian tanggal diformat menjadi "tanggal-nama_bulan-tahun" menggunakan konkatenasi string. Fungsi `htmlspecialchars()` digunakan untuk mencegah XSS attack dengan meng-escape karakter HTML special, dan `nl2br()` untuk mengkonversi newline menjadi tag `<br>` agar format alamat multi-baris tetap terjaga.

Output ditampilkan dalam halaman konfirmasi yang menampilkan pesan "Terimakasih **[nama]** sudah mengisi form pendaftaran" dan semua data yang diinput dalam format terstruktur dengan label yang jelas. Implementasi ini mendemonstrasikan best practice pembuatan form pendaftaran yang aman dan user-friendly menggunakan metode POST untuk menjaga privasi data pribadi pengguna dengan validasi dan sanitasi input yang tepat.

### 3.4 Soal 4
Setelah Anda selesai membuat script dan form pada no. 3 di atas, coba ubah `method='post'` pada formnya menjadi `method='get'`. Ubah pula `$_POST[]` dalam script PHP nya menjadi `$_GET[]`. Masih bisakah scriptnya bekerja? Coba amati efek perubahan tersebut dan jelaskan apa akibat diberikannya `method='get'` pada form?

#### Penjelasan
Permasalahan ini bertujuan memberikan pemahaman praktis tentang perbedaan metode GET dan POST dengan melakukan eksperimen mengubah `method="POST"` menjadi `method="GET"` pada form dan menyesuaikan PHP dari `$_POST` menjadi `$_GET`. Secara fungsional, script tetap dapat bekerja dan menampilkan hasil yang sama, membuktikan bahwa dari sisi teknis programming kedua metode dapat digunakan untuk mengirim data. Namun, perbedaan fundamental muncul pada cara data ditransmisikan yang memiliki implikasi signifikan pada keamanan, privasi, dan user experience.

Ketika menggunakan metode GET, semua data form ditampilkan di URL sebagai query string seperti 
```
http://localhost/soal_4.php?nama_lengkap=Joko&tempat_lahir=Jakarta&tanggal=15&bulan=1&tahun=1995&alamat_rumah=Jl.+Merdeka+No.+123&jenis_kelamin=Pria&asal_sekolah=SMA+Negeri+1&nilai_uan=85.5,
```
dimana data pribadi seperti nama, alamat, dan nilai UAN terekspos di address bar browser. URL ini tersimpan di browser history dan server logs, dapat di-screenshot atau dicopy-paste, dengan spasi dikonversi menjadi plus sign atau %20 membuat URL sangat panjang. Masalah serius muncul dari penggunaan GET untuk form pendaftaran yaitu privasi dan keamanan data yang terekam di berbagai tempat, keterbatasan panjang URL sekitar 2048 karakter yang dapat menyebabkan data terpotong, data tersimpan di browser history yang dapat dilihat pengguna lain, dan URL dapat dibagikan atau di-bookmark yang mengakibatkan duplicate entry atau penyalahgunaan data.

Sebaliknya, metode POST menampilkan URL bersih `http://localhost/soal_3.php` tanpa query string karena data dikirim melalui HTTP request body yang tidak terlihat di address bar, tidak tersimpan di browser history, dan lebih aman dari intercept. POST tidak memiliki batasan signifikan pada ukuran data sehingga cocok untuk form dengan banyak field atau input panjang. Kesimpulannya, meskipun secara teknis kedua metode dapat bekerja, POST adalah pilihan yang lebih tepat untuk form pendaftaran atau form dengan data pribadi/sensitif, sedangkan GET hanya untuk request idempotent seperti search query, filtering, atau pagination dimana parameter perlu terlihat di URL untuk bookmarking atau sharing link.

---

## 4. Kesimpulan

Praktikum ini memberikan pemahaman mendalam tentang metode pengiriman data form dalam PHP menggunakan POST dan GET, dimana pemilihan metode yang tepat sangat penting untuk keamanan, privasi data, dan user experience dalam aplikasi web. Metode POST lebih cocok untuk data sensitif dan form dengan banyak field karena data dikirim melalui HTTP body dan tidak terlihat di URL, sedangkan metode GET lebih tepat untuk request pencarian atau filtering dimana parameter perlu terlihat dan dapat di-bookmark. Melalui empat soal praktikum, berhasil diimplementasikan form interaktif untuk kalkulator bunga tabungan, penukaran pecahan uang, dan sistem pendaftaran mahasiswa baru yang mendemonstrasikan penggunaan berbagai elemen form HTML seperti input text, number, textarea, select dropdown, dan radio button, serta cara memproses data dengan PHP menggunakan superglobal variable `$_POST` dan `$_GET`. Eksperimen perbandingan POST dan GET memberikan insight praktis tentang implikasi keamanan dan fungsional dari masing-masing metode yang penting untuk pengembangan aplikasi web yang aman dan mengikuti best practices.


---