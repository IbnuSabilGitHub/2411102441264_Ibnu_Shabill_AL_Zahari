<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.html');
    exit();
}

$errors = [];

// Validasi saldo awal
if (!isset($_POST['saldo_awal']) || empty($_POST['saldo_awal'])) {
    $errors[] = "Saldo awal harus diisi";
} elseif (!is_numeric($_POST['saldo_awal']) || $_POST['saldo_awal'] <= 0) {
    $errors[] = "Saldo awal harus berupa angka positif";
}

// Validasi bunga
if (!isset($_POST['besar_bunga_per_bulan']) || empty($_POST['besar_bunga_per_bulan'])) {
    $errors[] = "Besar bunga harus diisi";
} elseif (!is_numeric($_POST['besar_bunga_per_bulan']) || $_POST['besar_bunga_per_bulan'] < 0 || $_POST['besar_bunga_per_bulan'] > 100) {
    $errors[] = "Besar bunga harus antara 0 hingga 100";
}

// Validasi lama menabung
if (!isset($_POST['lama_menabung']) || empty($_POST['lama_menabung'])) {
    $errors[] = "Lama menabung harus diisi";
} elseif (!is_numeric($_POST['lama_menabung']) || $_POST['lama_menabung'] <= 0 || $_POST['lama_menabung'] > 1200) {
    $errors[] = "Lama menabung harus berupa angka positif (maksimal 1200 bulan)";
}

// Proses data jika tidak ada error
$saldoAwal = 0;
$bunga = 0;
$bulan = 0;
$saldoAkhir = 0;
$totalBunga = 0;
$persentasePertumbuhan = 0;

if (empty($errors)) {
    $saldoAwal = floatval($_POST['saldo_awal']);
    $bunga = floatval($_POST['besar_bunga_per_bulan']) / 100;
    $bulan = intval($_POST['lama_menabung']);

    // Rumus: M = P(1 + r)^n
    $saldoAkhir = $saldoAwal * pow((1 + $bunga), $bulan);
    $totalBunga = $saldoAkhir - $saldoAwal;
    $persentasePertumbuhan = (($saldoAkhir - $saldoAwal) / $saldoAwal) * 100;
}

// Format number untuk rp
function formatRupiah($angka)
{
    return 'Rp ' . number_format($angka, 2, ',', '.');
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Perhitungan - Bank X</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-900">
    <div class="w-full max-w-md p-6 bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700">

        <?php if (!empty($errors)): ?>
            <!-- Tampilan Error -->
            <div class="mb-4">
                <div class="p-4 text-red-800 bg-red-100 rounded-lg dark:bg-red-900 dark:text-red-200">
                    <h3 class="mb-2 text-lg font-semibold">
                        <i class="fas fa-exclamation-triangle mr-2"></i>Error Validasi:
                    </h3>
                    <ul class="list-disc list-inside space-y-1">
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo htmlspecialchars($error); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <a href="index.html" class="inline-block mt-4 px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
            </div>
        <?php else: ?>

            <div class="text-center mb-6">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-green-100 rounded-full dark:bg-green-900 mb-3">
                    <i class="fas fa-check text-3xl text-green-600 dark:text-green-300"></i>
                </div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Perhitungan Selesai</h2>
                <p class="text-gray-600 dark:text-gray-400 mt-2">Bank X - Simulasi Tabungan</p>
            </div>

            <div class="space-y-4">
                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">
                        <i class="fas fa-info-circle mr-2"></i>Detail Input
                    </h3>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-400">Saldo Awal:</span>
                            <span class="font-semibold text-gray-900 dark:text-white"><?php echo formatRupiah($saldoAwal); ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-400">Bunga per Bulan:</span>
                            <span class="font-semibold text-gray-900 dark:text-white"><?php echo number_format($_POST['besar_bunga_per_bulan'], 2, ',', '.'); ?>%</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-400">Lama Menabung:</span>
                            <span class="font-semibold text-gray-900 dark:text-white"><?php echo $bulan; ?> bulan</span>
                        </div>
                    </div>
                </div>

                <div class="bg-linear-to-r from-green-50 to-blue-50 dark:from-green-900 dark:to-blue-900 rounded-lg p-4 border-2 border-green-200 dark:border-green-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">
                        <i class="fas fa-calculator mr-2"></i>Hasil Perhitungan
                    </h3>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600 dark:text-gray-400">Saldo Akhir:</span>
                            <span class="text-xl font-bold text-green-600 dark:text-green-400"><?php echo formatRupiah($saldoAkhir); ?></span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600 dark:text-gray-400">Total Bunga:</span>
                            <span class="text-lg font-semibold text-blue-600 dark:text-blue-400"><?php echo formatRupiah($totalBunga); ?></span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600 dark:text-gray-400">Pertumbuhan:</span>
                            <span class="text-lg font-semibold text-purple-600 dark:text-purple-400">
                                <i class="fas fa-arrow-up mr-1"></i><?php echo number_format($persentasePertumbuhan, 2, ',', '.'); ?>%
                            </span>
                        </div>
                    </div>
                </div>

                <div class="bg-blue-50 dark:bg-blue-900 rounded-lg p-4">
                    <h3 class="text-sm font-semibold text-blue-900 dark:text-blue-200 mb-2">
                        <i class="fas fa-lightbulb mr-2"></i>Informasi
                    </h3>
                    <p class="text-xs text-blue-800 dark:text-blue-300">
                        Perhitungan menggunakan rumus bunga majemuk: M = P(1 + r)<sup>n</sup>
                        <br>Bunga dihitung dan ditambahkan ke saldo setiap bulan.
                    </p>
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="mt-6 flex gap-2">
                <a href="index.html" class="flex-1 text-center px-4 py-2.5 text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i>Hitung Lagi
                </a>
                <button onclick="window.print()" class="flex-1 text-center px-4 py-2.5 text-white bg-green-600 rounded-lg hover:bg-green-700 transition-colors">
                    <i class="fas fa-print mr-2"></i>Cetak
                </button>
            </div>

        <?php endif; ?>

    </div>
</body>

</html>