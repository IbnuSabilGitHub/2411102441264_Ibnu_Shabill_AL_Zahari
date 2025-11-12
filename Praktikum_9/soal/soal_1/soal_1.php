<?php
include_once '../../../helper/php/global_function.php';

// Cek apakah request method adalah POST. Cegah akses langsung ke halaman ini tanpa submit form.
if (!isPostRequest()) {
    redirectTo('index.html');
}

function iniTahunKabisat(int $tahun): bool {
    // Aturan tahun kabisat:
    // 1. Tahun habis dibagi 4 adalah kabisat
    // 2. Tahun habis dibagi 100 bukan kabisat, kecuali juga habis dibagi 400

    if ($tahun % 4 !== 0) {
        return false;
    }
    if ($tahun % 100 !== 0) {
        return true;
    }
    return ($tahun % 400 === 0);
}

$errors = [];
$tahun = isset($_POST['tahun']) ? $_POST['tahun'] : '';
$isKabisat = false;

// Validasi input tahun
if (empty($tahun)) {
    $errors[] = "Tahun harus diisi";
} elseif (!is_numeric($tahun) || $tahun < 1000 || $tahun > 9999) {
    $errors[] = "Tahun harus berupa angka antara 1000 hingga 9999";
}

// Jika tidak ada error, cek tahun kabisat
if (empty($errors)) {
    $tahun = intval($tahun);
    $isKabisat = iniTahunKabisat($tahun);
}

?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pengecekan - Tahun Kabisat</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-900">
    <div class="w-full max-w-md p-6 bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700">

        <?php if (!empty($errors)): ?>
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
                <div class="inline-flex items-center justify-center w-16 h-16 <?php echo $isKabisat ? 'bg-green-100 dark:bg-green-900' : 'bg-blue-100 dark:bg-blue-900'; ?> rounded-full mb-3">
                    <i class="fas <?php echo $isKabisat ? 'fa-check' : 'fa-calendar-check'; ?> text-3xl <?php echo $isKabisat ? 'text-green-600 dark:text-green-300' : 'text-blue-600 dark:text-blue-300'; ?>"></i>
                </div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Hasil Pengecekan</h2>
                <p class="text-gray-600 dark:text-gray-400 mt-2">Tahun Kabisat</p>
            </div>

            <div class="space-y-4">
                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">
                        <i class="fas fa-info-circle mr-2"></i>Input
                    </h3>
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400">Tahun:</span>
                        <span class="font-semibold text-gray-900 dark:text-white"><?php echo $tahun; ?></span>
                    </div>
                </div>

                <div class="<?php echo $isKabisat ? 'bg-green-900 border-green-200 dark:border-green-700' : 'bg-blue-900 border-blue-200 dark:border-blue-700'; ?> rounded-lg p-4 border-2">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">
                        <i class="fas fa-search mr-2"></i>Hasil Pengecekan
                    </h3>
                    <div class="text-center py-4">
                        <div class="text-4xl font-bold mb-3 <?php echo $isKabisat ? 'text-green-600 dark:text-green-400' : 'text-blue-600 dark:text-blue-400'; ?>">
                            <?php echo $isKabisat ? 'KABISAT' : 'BUKAN KABISAT'; ?>
                        </div>
                        <p class="text-gray-700 dark:text-gray-300 text-lg">
                            Tahun <strong><?php echo $tahun; ?></strong> 
                            <span class="<?php echo $isKabisat ? 'text-green-600 dark:text-green-400' : 'text-blue-600 dark:text-blue-400'; ?> font-semibold">
                                <?php echo $isKabisat ? 'adalah' : 'bukan'; ?>
                            </span>
                            tahun kabisat
                        </p>
                    </div>
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="mt-6 flex gap-2">
                <a href="index.html" class="flex-1 text-center px-4 py-2.5 text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i>Cek Lagi
                </a>
            </div>

        <?php endif; ?>

    </div>
</body>

</html>

