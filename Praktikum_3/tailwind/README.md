# Instagram Profile - Tailwind CSS

Proyek ini adalah implementasi clone profil Instagram menggunakan Tailwind CSS dengan desain responsive yang dioptimalkan untuk berbagai ukuran layar. Untuk memenuhi tugas praktikum web.

## Keputusan Grid Layout dan Gap di Setiap Breakpoint

### Grid Columns Configuration

```html
<div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-0.5 md:gap-1">
```

**Alasan desain breakpoint:**
Desain breakpoint ini dibuat untuk memberikan pengalaman pengguna yang optimal di berbagai perangkat.

1. **Mobile (grid-cols-1):**
Pada perangkat mobile dengan layar sempit, digunakan tata letak `grid-cols-1` yang menampilkan konten dalam satu kolom vertikal. Desain ini dipilih karena layar sempit membutuhkan tampilan yang mudah di-scroll, dimana single column mencegah gambar menjadi terlalu kecil dan sulit dilihat. Selain itu, pendekatan ini memberikan pengalaman browsing yang nyaman dengan jempol dan mengikuti pola native app Instagram di mobile.

1. **Tablet (md:grid-cols-3):**
perangkat tablet, diterapkan `md:grid-cols-3` yang menampilkan tiga kolom. Hal ini karena layar medium sudah cukup lebar untuk menampilkan tiga kolom sekaligus mempertahankan aspect ratio yang baik untuk gambar. Desain ini memberikan transisi yang smooth dari mobile ke desktop serta optimal untuk portrait dan landscape mode tablet.

1. **Desktop (lg:grid-cols-4):**
Sedangkan pada perangkat desktop, digunakan `lg:grid-cols-4` dengan empat kolom. Desain ini memanfaatkan ruang layar desktop yang lebar, memberikan grid yang rapi dan professional, memungkinkan lebih banyak konten terlihat sekaligus, serta konsisten dengan desain Instagram web.

### Gap Configuration

- **Mobile (gap-0.5):** Gap minimal untuk memaksimalkan ukuran gambar di layar kecil
- **Medium+ (md:gap-1):** Gap yang lebih besar untuk memberikan breathing room di layar yang lebih luas

## Pemanfaatan Utility Responsive Tailwind untuk Mobile

### 1. **Navigation dan Controls**
```html
<!-- Profile action buttons - hidden pada mobile, visible pada desktop -->
<button class="px-3 py-1.5 hidden md:block">
    <i class="fas fa-cog text-xl"></i>
</button>

<!-- Mobile-specific settings button -->
<button class="px-3 py-1 block md:hidden">
    <i class="fas fa-cog text-xl"></i>
</button>
```

### 2. **Profile Stats Layout**
```html
<!-- Desktop stats - horizontal layout -->
<div class="md:flex gap-8 mb-5 hidden">
    <!-- Stats content -->
</div>

<!-- Mobile stats - vertical layout with different styling -->
<div class="flex justify-between gap-8 m-4 md:hidden">
    <div class="flex flex-col items-center gap-1">
        <!-- Vertical centered stats -->
    </div>
</div>
```

### 3. **Footer Navigation**
```html
<!-- Mobile footer -->
<footer class="fixed bottom-0 left-0 right-0 bg-neutral-950 border-t border-gray-800 md:hidden z-50">
    <!-- Mobile navigation icons -->
</footer>

<!-- Desktop footer -->
<footer class="text-gray-300 py-6 hidden md:block">
    <!-- Desktop footer content -->
</footer>
```

### 4. **Responsive Sizing**
```html
<!-- Profile picture - smaller pada mobile -->
<div class="w-20 h-20 md:w-40 md:h-40 rounded-full">

<!-- Font sizes yang adaptif -->
<span class="text-[10px] md:text-xs font-medium">

<!-- Story highlights sizing -->
<div class="w-16 h-16 md:w-20 md:h-20 rounded-full">
```

**Masalah yang dipecahkan:**
- Buttons dan links dibuat lebih besar untuk finger-friendly navigation
- Informasi penting diprioritaskan dan di-reorder untuk mobile
- Desktop hover states vs mobile tap interactions
- Memaksimalkan penggunaan ruang terbatas di mobile

## Trade-off: Utility Classes vs Component CSS

### Keuntungan Utility Classes:
Pendekatan utility classes menawarkan beberapa keuntungan signifikan, terutama dalam hal rapid prototyping yang memungkinkan pembuatan layout dan styling dengan sangat cepat. Metode ini juga menjamin konsistensi melalui penggunaan design system yang terstandarisasi dari Tailwind. Dari sisi performa, pendekatan ini menghilangkan CSS bloat karena proses purging otomatis, serta menghasilkan CSS bundle yang optimal dan minimal. Kemudahan responsive design disediakan melalui built-in utilities yang powerful, sementara maintainability terjaga karena semua styling dapat dilihat langsung dalam HTML.

Namun, pendekatan ini memiliki beberapa kekurangan. HTML verbosity membuat kode HTML menjadi sangat panjang dan sulit dibaca, diperparah dengan repetition kombinasi class yang sama di banyak tempat. Bagi pengguna baru, terdapat learning curve yang mengharuskan menghafal banyak nama utility class, dan untuk complex animations, pendekatan ini menjadi kurang fleksibel.

### Component CSS Approach
Sebagai alternatif, pendekatan component CSS menawarkan cleaner HTML dengan markup yang lebih bersih dan semantic. Metode ini mendukung reusability melalui component classes yang dapat digunakan berulang, serta memudahkan complex styling untuk pseudo-elements dan complex selectors. Dari sisi kolaborasi tim, pendekatan ini lebih mudah dipahami oleh developer yang tidak familiar dengan Tailwind.

Di sisi lain, pendekatan ini memiliki risiko CSS bloat dimana CSS yang tidak terpakai mungkin tidak ter-purge dengan baik. Tim juga perlu menjaga konsistensi naming convention dalam penamaan class, serta menghadapi development speed yang lebih lambat selama fase development. Selain itu, terdapat maintenance overhead yang mengharuskan tim untuk memelihara file CSS terpisah.

### Kesimpulan

Untuk proyek ini, utility classes approach dipilih karena projek bersifat learning dan butuh iterasi cepat, Tailwind menyediakan design tokens yang konsisten, built-in responsive utilities sangat membantu, dan project kecil yang tidak memerlukan long-term maintenance kompleks.

## Oleh:

**Ibnu Shabill Al Zahari - 2411102441264**  
Matakuliah Praktikum Web - Semester 3

---


*© 2025 Ibnu Shabill Al Zahari. All rights reserved.*