<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.html');
    exit();
}

// Ambil input dari form
$jumlahUang = $_POST['jumlah_uang'];

// Hitung pecahan uang
$a = (int)($jumlahUang / 100000);
$sisaUang = $jumlahUang % 100000;

$b = (int)($sisaUang / 50000);
$sisaUang = $sisaUang % 50000;

$c = (int)($sisaUang / 20000);
$sisaUang = $sisaUang % 20000;

$d = (int)($sisaUang / 10000);
$sisaUang = $sisaUang % 10000;

$e = (int)($sisaUang / 5000);
$sisaUang = $sisaUang % 5000;

$f = (int)($sisaUang / 2000);
$sisaUang = $sisaUang % 2000;

$g = (int)($sisaUang / 1000);
$sisaUang = $sisaUang % 1000;

$h = (int)($sisaUang / 500);
$sisaUang = $sisaUang % 500;

$i = (int)($sisaUang / 100);
$sisaUang = $sisaUang % 100;

$j = (int)($sisaUang / 50);

// Format number untuk rp
function formatRupiah($angka)
{
    return 'Rp ' . number_format($angka, 0, ',', '.');
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pecahan Uang</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-900">
    <div class="w-full max-w-md p-6 bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700">

        <div class="text-center mb-6">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-green-100 rounded-full dark:bg-green-900 mb-3">
                <i class="fas fa-money-bills text-3xl text-green-600 dark:text-green-300"></i>
            </div>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Pecahan Uang</h2>
            <p class="text-gray-600 dark:text-gray-400 mt-2">Hasil Pembagian Uang</p>
        </div>

        <div class="space-y-4">
            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">
                    <i class="fas fa-info-circle mr-2"></i>Input
                </h3>
                <div class="flex justify-between">
                    <span class="text-gray-600 dark:text-gray-400">Jumlah Uang:</span>
                    <span class="font-semibold text-gray-900 dark:text-white"><?php echo formatRupiah($jumlahUang); ?></span>
                </div>
            </div>

            <div class="bg-linear-to-r from-green-50 to-blue-50 dark:from-green-900 dark:to-blue-900 rounded-lg p-4 border-2 border-green-200 dark:border-green-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">
                    <i class="fas fa-calculator mr-2"></i>Hasil Pecahan
                </h3>
                <div class="space-y-2">
                    <?php if ($a > 0): ?>
                        <div class="flex justify-between items-center bg-white dark:bg-gray-800 rounded-lg p-3 shadow-sm">
                            <span class="text-gray-600 dark:text-gray-400">Rp. 100.000:</span>
                            <span class="text-lg font-bold text-blue-600 dark:text-blue-400"><?php echo $a; ?> lembar</span>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($b > 0): ?>
                        <div class="flex justify-between items-center bg-white dark:bg-gray-800 rounded-lg p-3 shadow-sm">
                            <span class="text-gray-600 dark:text-gray-400">Rp. 50.000:</span>
                            <span class="text-lg font-bold text-blue-600 dark:text-blue-400"><?php echo $b; ?> lembar</span>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($c > 0): ?>
                        <div class="flex justify-between items-center bg-white dark:bg-gray-800 rounded-lg p-3 shadow-sm">
                            <span class="text-gray-600 dark:text-gray-400">Rp. 20.000:</span>
                            <span class="text-lg font-bold text-blue-600 dark:text-blue-400"><?php echo $c; ?> lembar</span>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($d > 0): ?>
                        <div class="flex justify-between items-center bg-white dark:bg-gray-800 rounded-lg p-3 shadow-sm">
                            <span class="text-gray-600 dark:text-gray-400">Rp. 10.000:</span>
                            <span class="text-lg font-bold text-blue-600 dark:text-blue-400"><?php echo $d; ?> lembar</span>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($e > 0): ?>
                        <div class="flex justify-between items-center bg-white dark:bg-gray-800 rounded-lg p-3 shadow-sm">
                            <span class="text-gray-600 dark:text-gray-400">Rp. 5.000:</span>
                            <span class="text-lg font-bold text-blue-600 dark:text-blue-400"><?php echo $e; ?> lembar</span>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($f > 0): ?>
                        <div class="flex justify-between items-center bg-white dark:bg-gray-800 rounded-lg p-3 shadow-sm">
                            <span class="text-gray-600 dark:text-gray-400">Rp. 2.000:</span>
                            <span class="text-lg font-bold text-blue-600 dark:text-blue-400"><?php echo $f; ?> lembar</span>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($g > 0): ?>
                        <div class="flex justify-between items-center bg-white dark:bg-gray-800 rounded-lg p-3 shadow-sm">
                            <span class="text-gray-600 dark:text-gray-400">Rp. 1.000:</span>
                            <span class="text-lg font-bold text-blue-600 dark:text-blue-400"><?php echo $g; ?> lembar</span>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($h > 0): ?>
                        <div class="flex justify-between items-center bg-white dark:bg-gray-800 rounded-lg p-3 shadow-sm">
                            <span class="text-gray-600 dark:text-gray-400">Rp. 500:</span>
                            <span class="text-lg font-bold text-blue-600 dark:text-blue-400"><?php echo $h; ?> lembar</span>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($i > 0): ?>
                        <div class="flex justify-between items-center bg-white dark:bg-gray-800 rounded-lg p-3 shadow-sm">
                            <span class="text-gray-600 dark:text-gray-400">Rp. 100:</span>
                            <span class="text-lg font-bold text-blue-600 dark:text-blue-400"><?php echo $i; ?> lembar</span>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($j > 0): ?>
                        <div class="flex justify-between items-center bg-white dark:bg-gray-800 rounded-lg p-3 shadow-sm">
                            <span class="text-gray-600 dark:text-gray-400">Rp. 50:</span>
                            <span class="text-lg font-bold text-blue-600 dark:text-blue-400"><?php echo $j; ?> lembar</span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class=" flex mt-2 gap-2">
            <a href="index.html" class="flex-1 text-center px-4 py-2.5  text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors">
                <i class="fas fa-arrow-left mr-2"></i>Hitung Lagi
            </a>
        </div>

    </div>
</body>

</html>
