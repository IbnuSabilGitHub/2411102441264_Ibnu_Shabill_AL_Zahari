<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menghitung Gaji bersih karyawan</title>
</head>

<body>
    <h1>Menghitung Gaji Bersih Karyawan</h1>

    <?php
    $gaji_pokok = 1000000; // Gaji pokok dalam rupiah
    $tunjangan = 500000;    // Tunjangan dalam rupiah
    
    $gaji_kotor = $gaji_pokok + $tunjangan;
    $pajak = 0.15 * $gaji_kotor; // hitung pajak
    $gajiBersih = $gaji_pokok + $tunjangan - $pajak; // hitung gaji bersih
    echo "<p>Gaji bersih karyawan adalah Rp. " . $gajiBersih . "</p>"; // menampilkan gaji bersih
    // CARA KE - 2
    $gaji_pokok = 1000000; // gaji pokok
    $tunjangan = 500000; // tunjangan
    $gaji_kotor = $gaji_pokok + $tunjangan; // hitung gaji kotor
    $gajiBersih = $gaji_kotor - (0.15 * $gaji_kotor); // hitung gaji bersih
    echo "<p>Gaji bersih karyawan adalah Rp. " . $gajiBersih . "</p>"; // menampilkan gaji bersih
    // CARA KE - 3
    $gaji_pokok = 1000000; // gaji pokok
    $tunjangan = 500000; // tunjangan
    $gajiBersih = $gaji_pokok + $tunjangan - 0.15 * ($gaji_pokok +
        $tunjangan); // hitung gaji bersih
    echo "<p>Gaji bersih karyawan adalah Rp. " . $gajiBersih . "</p>"; // menampilkan gaji bersih
    ?>
</body>

</html>