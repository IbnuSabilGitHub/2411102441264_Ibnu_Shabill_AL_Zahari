<html>
<head>
    <title>Menghitung Selisih Dua Waktu</title>
</head>
<body>

    <h1>Menghitung Selisih Dua Waktu</h1>

    <?php
    // Membaca Input Waktu 1
    $jam1   = $_POST['jam1'];    // baca jam dari waktu 1
    $menit1 = $_POST['menit1'];  // baca menit dari waktu 1
    $detik1 = $_POST['detik1'];  // baca detik dari waktu 1

    // Membaca Input Waktu 2
    $jam2   = $_POST['jam2'];    // baca jam dari waktu 2
    $menit2 = $_POST['menit2'];  // baca menit dari waktu 2
    $detik2 = $_POST['detik2'];  // baca detik dari waktu 2

    // Konversi Waktu ke Total Detik
    $totalDetik1 = $jam1 * 3600 + $menit1 * 60 + $detik1; // menghitung total detik untuk waktu pertama
    $totalDetik2 = $jam2 * 3600 + $menit2 * 60 + $detik2; // menghitung total detik untuk waktu kedua

    // Menghitung Selisih
    $selisih = $totalDetik1 - $totalDetik2; // hitung selisih total detik dari kedua waktu

    // Menampilkan Hasil
    echo "<p>Selisih dari kedua waktu adalah ".$selisih." detik</p>";
    ?>

</body>
</html>