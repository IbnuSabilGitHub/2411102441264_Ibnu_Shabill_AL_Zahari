# Instagram Profile Clone - Bootstrap

Proyek ini adalah implementasi clone profil Instagram menggunakan Bootstrap dengan desain responsive yang dioptimalkan untuk berbagai ukuran layar. Untuk memenuhi tugas praktikum web.

## 1. Mengapa memilih konfigurasi kolom tertentu untuk tiap breakpoint?

Pada bagian feed digunakan struktur: `col-12 col-md-4 col-lg-3` pada setiap post (total 12 kolom grid Bootstrap).

- `col-12` (XS / <576px): 1 kolom penuh agar gambar cukup besar, mudah di-scroll vertikal, sesuai UX mobile native.
- `col-md-4` (≥768px): 12 / 4 = 3 kolom. Ini titik nyaman pertama di mana lebar layar cukup untuk menampilkan multiple posts tanpa membuat tiap card terlalu kecil. 3 kolom menjaga aspek 9:16 tetap proporsional dan mengurangi scroll length.
- `col-lg-3` (≥992px): 12 / 3 = 4 kolom. Di desktop lebar tambahan bisa dimanfaatkan untuk menambah density konten. 4 kolom meningkatkan content-per-scroll tanpa crowded karena viewport lebar.

Pertimbangan tambahan:
- Mobile 1 kolom memudahkan fokus tiap post, menghindari distraksi.
- Tablet 3 kolom memberikan keseimbangan antara densitas dan keterbacaan.
- Desktop 4 kolom memaksimalkan penggunaan ruang horizontal.

Gap antar kartu menggunakan `g-1 g-md-2`:
  Gap kecil di mobile memaksimalkan ukuran visual. Gap lebih longgar di layar besar memberi ruang visual dan memisahkan item tanpa terasa padat.

## 2. Bagaimana memastikan tombol Follow / Edit Profile tetap mudah dijangkau di mobile?

Pendekatan yang digunakan:
1. **Prioritas Urutan**: Menggunakan utilitas order Bootstrap `order-*` agar tombol aksi muncul segera setelah username saat layout menumpuk secara vertikal di mobile.
2. **Ukuran & Hit Area**: Menggunakan padding konsisten `px-3 py-1` dan class custom (`btn-custom`) untuk memastikan area tap >= ~40px tinggi efektif meski tampak kecil secara visual.
3. **Visual Distinction**: `Follow` diberi background kelas tambahan `bg-primary` untuk kontras tinggi terhadap tombol sekunder `Edit profile` yang lebih netral membantu prioritas aksi utama.
4. **Responsive Visibility**: Icon settings dipisah: ada versi `d-block d-md-none` untuk mobile dan `d-none d-md-block` untuk desktop sehingga tidak menumpuk dan mengganggu tombol Follow/Edit.
5. **Spacing Adaptif**: Menggunakan `gap-2` atau `gap-*` di container flex agar jari tidak salah tap tombol berdekatan.


## 3. Jika postingan bertambah jadi 50, apa potensi masalah dan bagaimana solusi grid mengatasinya?

**Potensi masalah:**
Jika jumlah postingan bertambah menjadi 50, terdapat beberapa potensi masalah yang dapat timbul. Scroll Fatigue akan terjadi dimana pengguna harus melakukan scroll yang sangat panjang, terutama dalam tampilan mobile satu kolom. Layout Shift juga berisiko terjadi jika gambar dengan rasio aspek berbeda masuk dan mengganggu ritme grid, meskipun hal ini telah diantisipasi dengan wrapper aspek tetap. Dari sisi teknis, Performa Rendering dapat menurun karena banyaknya elemen DOM yang harus diproses, meningkatkan biaya painting dan reflow. Persepsi Kerapatan di desktop mungkin terasa terlalu panjang secara vertikal meskipun horizontal sudah optimal. Selain itu, Navigasi ke Post Tertentu menjadi kurang optimal tanpa pagination atau lazy load.

Solusi grid yang saat ini diterapkan telah membantu mengatasi beberapa masalah tersebut. Grid Responsif dengan 4 kolom di desktop berhasil mengurangi tinggi total halaman dibandingkan layout yang lebih sempit. Aspect Ratio Konsisten melalui kelas .aspect-ratio-9-16 efektif mencegah layout shift saat gambar loading secara asynchronous. Class Gap Proporsional menjaga kepadatan tetap seimbang meskipun jumlah item meningkat, sementara Card Tanpa Shadow/Borders Kompleks dengan styling minimal berhasil mengurangi biaya painting massal.

Untuk skala yang lebih lanjut, Beberapa penyempurnaan untuk menangani 50 lebih postingan:
- Mengimplementasikan lazy loading pada tag gambar. 
- Menambahkan pagination atau infinite scroll dengan batch 12 atau 24 item. 
- Menggunakan skeleton placeholder untuk meningkatkan perceived performance.
- Melakukan kompresi gambar dengan width yang sesuai kolom aktual.

## Oleh:

**Ibnu Shabill Al Zahari - 2411102441264**  
Matakuliah Praktikum Web - Semester 3

---


*© 2025 Ibnu Shabill Al Zahari. All rights reserved.*

