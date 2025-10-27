<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menghitung komisi salesman</title>
</head>

<body>
    <h1>Menghitung Komisi Salesman</h1>
    /*
    Script ini akan menghitung komisi salesman berdasarkan nilai penjualan yang dicapainya yaitu sebesar Rp. 1.500.000,
    Ketentuan komisinya adalah 5% dari nilai penjualan yang dicapai.
    */
    <?php
    $nilaiJual = 15000000; // Nilai penjualan
    $komisi = 0.05 * $nilaiJual; // Komisi 5% dari nilai penjualan

    echo "<p>Nilai penjualan salesman : Rp" . $nilaiJual . "</p>";
    echo "<p>Komisi yang diperoleh salesman : Rp" . $komisi . "</p>";
    ?>
</body>

</html>