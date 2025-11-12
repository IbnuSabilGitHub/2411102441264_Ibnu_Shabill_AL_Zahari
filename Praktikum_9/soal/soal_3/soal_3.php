<?php
include_once '../../../helper/php/global_function.php';


// Cek apakah request method adalah POST. Cegah akses langsung ke halaman ini tanpa submit form.
if (!isPostRequest()) {
    redirectTo('index.html');
}

// Fungsi untuk menghitung total gaji berdasarkan jam kerja
function hitungGaji($jam_kerja, $upah_normal, $upah_lembur, $batas_jam)
{
    $jam_lembur = 0;
    $total_gaji = 0;

    if ($jam_kerja <= $batas_jam) {
        $total_gaji = $jam_kerja * $upah_normal;
    } else {
        $jam_lembur = $jam_kerja - $batas_jam;
        $total_gaji = ($batas_jam * $upah_normal) + ($jam_lembur * $upah_lembur);
    }

    return [
        'total' => $total_gaji,
        'lembur' => $jam_lembur
    ];
}

// Fungsi untuk mendapatkan upah per jam berdasarkan golongan
function upahPerJam($golongan)
{
    switch ($golongan) {
        case 'A':
            return 4000;
        case 'B':
            return 5000;
        case 'C':
            return 6000;
        case 'D':
            return 7500;
        default:
            return 0;
    }
}

// Inisialisasi variabel
$errors = [];
$jam_kerja = isset($_POST['jumlah_jam_kerja']) ? $_POST['jumlah_jam_kerja'] : '';
$golongan = $_POST['golongan'];
$total_gaji = 0;
$jam_lembur = 0;

// configurasi upah dan batas jam
$upah_lembur = 3000;
$batas_jam = 48;


// Validasi input
if (empty($golongan) || !in_array($golongan, ['A', 'B', 'C', 'D'])) {
    $errors[] = "Golongan tidak valid";
} elseif (!is_numeric($jam_kerja) || $jam_kerja < 0 || $jam_kerja > 168) {
    $errors[] = "Jumlah jam kerja harus berupa angka antara 0 hingga 168";
}

// Jika tidak ada error hitung gaji
if (empty($errors)) {
    $upah_per_jam = upahPerJam($golongan);
    $hasil = hitungGaji($jam_kerja, $upah_per_jam, $upah_lembur, $batas_jam);
    $total_gaji = $hasil['total'];
    $jam_lembur = $hasil['lembur'];

    // Hitung variabel untuk tampilan
    $jam_normal = min($jam_kerja, $batas_jam);
    $upah_normal = $jam_normal * $upah_per_jam;
    $upah_lembur_total = $jam_lembur * $upah_lembur;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Perhitungan Gaji - Golongan <?php echo $golongan; ?></title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-900">
    <div class="w-full max-w-md p-6 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        <div class="text-center mb-6">
            <div class="mx-auto flex items-center justify-center w-12 h-12 bg-green-100 rounded-lg dark:bg-green-900 mb-4">
                <i class="fas fa-calculator text-green-600 dark:text-green-400 text-xl"></i>
            </div>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Hasil Perhitungan Gaji</h2>
            <p class="text-gray-600 dark:text-gray-400">Golongan <?php echo $golongan; ?></p>
        </div>

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

            <div class="space-y-4">
                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">
                        <i class="fas fa-info-circle mr-2"></i>Data Input
                    </h3>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-400">Golongan:</span>
                            <span class="font-medium text-gray-900 dark:text-white"><?php echo $golongan; ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-400">Upah per jam:</span>
                            <span class="font-medium text-gray-900 dark:text-white"><?php echo formatRupiah($upah_per_jam); ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-400">Total jam kerja:</span>
                            <span class="font-medium text-gray-900 dark:text-white"><?php echo $jam_kerja; ?> jam</span>
                        </div>
                    </div>
                </div>

                <div class="bg-blue-50 dark:bg-blue-900/20 rounded-lg p-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">
                        <i class="fas fa-list-ul mr-2"></i>Rincian Perhitungan
                    </h3>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-400">Jam kerja normal:</span>
                            <span class="font-medium text-gray-900 dark:text-white"><?php echo $jam_normal; ?> jam</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-400">Upah normal:</span>
                            <span class="font-medium text-gray-900 dark:text-white"><?php echo formatRupiah($upah_normal); ?></span>
                        </div>
                        <?php if ($jam_lembur > 0): ?>
                            <div class="flex justify-between">
                                <span class="text-gray-600 dark:text-gray-400">Jam lembur:</span>
                                <span class="font-medium text-gray-900 dark:text-white"><?php echo $jam_lembur; ?> jam</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600 dark:text-gray-400">Upah lembur:</span>
                                <span class="font-medium text-gray-900 dark:text-white"><?php echo formatRupiah($upah_lembur_total); ?></span>
                            </div>
                        <?php else: ?>
                            <div class="flex justify-between">
                                <span class="text-gray-600 dark:text-gray-400">Jam lembur:</span>
                                <span class="font-medium text-gray-900 dark:text-white">0 jam</span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="bg-green-50 dark:bg-green-900/20 rounded-lg p-4 border-2 border-green-200 dark:border-green-800">
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-semibold text-gray-900 dark:text-white">
                            <i class="fas fa-money-bill-wave mr-2"></i>Total Upah:
                        </span>
                        <span class="text-2xl font-bold text-green-600 dark:text-green-400">
                            <?php echo formatRupiah($total_gaji); ?>
                        </span>
                    </div>
                </div>

                <?php if ($jam_lembur > 0): ?>
                    <div class="bg-yellow-50 dark:bg-yellow-900/20 rounded-lg p-3">
                        <p class="text-sm text-yellow-800 dark:text-yellow-200">
                            <i class="fas fa-exclamation-triangle mr-2"></i>
                            Karyawan bekerja lembur <?php echo $jam_lembur; ?> jam dengan upah Rp. 3.000/jam
                        </p>
                    </div>
                <?php endif; ?>
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