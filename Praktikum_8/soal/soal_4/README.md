# SOAL 4
Setelah Anda selesai membuat script dan form pada no. 3 di atas, coba ubah method='post' pada formnya menjadi method='get'. Ubah pula `$_POST[]` dalam script PHP nya menjadi `$_GET[]`. Masih bisakah scriptnya bekerja? Coba amati efek perubahan tersebut dan jelaskan apa akibat diberikannya method='get' pada form?

## JAWABAN

### Apakah Script Masih Bisa Bekerja?

Script tetap bisa bekerja setelah mengubah method='post' menjadi method='get' pada form dan menyesuaikan variabel PHP dari `$_POST[]` menjadi `$_GET[]`. Akibat utama dari penggunaan method='get' adalah semua data form akan terlihat langsung di URL sebagai query string. Hal ini menyebabkan masalah keamanan dan privasi karena data sensitif seperti alamat akan terekam di browser history dan server logs, serta URL menjadi sangat panjang dan tidak user-friendly. Selain itu, panjang data yang dapat dikirim dibatasi oleh limit maksimum panjang URL. Meskipun URL yang menggunakan GET bisa di-bookmark atau dibagikan , metode GET sangat tidak disarankan untuk form pendaftaran atau form yang memuat data pribadi/sensitif; untuk kasus seperti itu, POST adalah metode yang direkomendasikan.

### URL GET dan POST

- **POST**: Data tidak terlihat di URL
  ```
  http://localhost/soal_4.php
  ```
- **GET**: Semua data form tampil di URL sebagai query string
  ```
  http://localhost/soal_4.php?nama_lengkap=Joko&tempat_lahir=Jakarta&tanggal=15&bulan=1&tahun=1995&alamat_rumah=Jl.+Merdeka+No.+123&jenis_kelamin=Pria&asal_sekolah=SMA+Negeri+1&nilai_uan=85.5
  ```