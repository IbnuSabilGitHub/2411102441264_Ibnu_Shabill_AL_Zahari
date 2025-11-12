<?php
include_once '../../../helper/php/global_function.php';

// Cek apakah request method adalah POST. Cegah akses langsung ke halaman ini tanpa submit form.
if (!isPostRequest()) {
    redirectTo('index.html');
}
// Ambil data dari form
$nama_lengkap = $_POST['nama_lengkap'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal = $_POST['tanggal'];
$bulan = $_POST['bulan'];
$tahun = $_POST['tahun'];
$alamat_rumah = $_POST['alamat_rumah'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$asal_sekolah = $_POST['asal_sekolah'];
$nilai_uan = $_POST['nilai_uan'];

// Array nama bulan
$nama_bulan = [
    1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
    5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
    9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
];

// Format tanggal lahir
$tanggal_lahir = $tanggal . '-' . $nama_bulan[$bulan] . '-' . $tahun;
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pendaftaran - Universitas Muhammadiyah Kalimantan Timur</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-900">
    <div class="w-full max-w-md p-6 bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700">

        <div class="text-center mb-6">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-green-100 rounded-full dark:bg-green-900 mb-3">
                <i class="fas fa-check text-3xl text-green-600 dark:text-green-300"></i>
            </div>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Pendaftaran Berhasil</h2>
            <p class="text-gray-600 dark:text-gray-400 mt-2">Universitas Muhammadiyah Kalimantan Timur</p>
        </div>

        <div class="space-y-4">
            <div class="bg-blue-50 dark:bg-blue-900 rounded-lg p-4">
                <p class="text-blue-800 dark:text-blue-300 text-center">
                    <i class="fas fa-info-circle mr-2"></i>
                    Terimakasih <strong><?php echo htmlspecialchars($nama_lengkap); ?></strong> sudah mengisi form pendaftaran.
                </p>
            </div>

            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">
                    <i class="fas fa-user-graduate mr-2"></i>Data Pendaftaran
                </h3>
                <div class="space-y-3">
                    <div class="flex justify-between items-start">
                        <span class="text-gray-600 dark:text-gray-400 font-medium">Nama Lengkap:</span>
                        <span class="text-gray-900 dark:text-white text-right"><?php echo htmlspecialchars($nama_lengkap); ?></span>
                    </div>
                    
                    <div class="flex justify-between items-start">
                        <span class="text-gray-600 dark:text-gray-400 font-medium">Tempat Lahir:</span>
                        <span class="text-gray-900 dark:text-white text-right"><?php echo htmlspecialchars($tempat_lahir); ?></span>
                    </div>
                    
                    <div class="flex justify-between items-start">
                        <span class="text-gray-600 dark:text-gray-400 font-medium">Tanggal Lahir:</span>
                        <span class="text-gray-900 dark:text-white text-right"><?php echo htmlspecialchars($tanggal_lahir); ?></span>
                    </div>
                    
                    <div class="flex justify-between items-start">
                        <span class="text-gray-600 dark:text-gray-400 font-medium">Alamat Rumah:</span>
                        <span class="text-gray-900 dark:text-white text-right max-w-xs overflow-wrap-break-word"><?php echo nl2br(htmlspecialchars($alamat_rumah)); ?></span>
                    </div>
                    
                    <div class="flex justify-between items-start">
                        <span class="text-gray-600 dark:text-gray-400 font-medium">Jenis Kelamin:</span>
                        <span class="text-gray-900 dark:text-white text-right">
                            <?php if($jenis_kelamin == 'Pria'): ?>
                                <i class="fas fa-mars mr-1"></i>
                            <?php else: ?>
                                <i class="fas fa-venus mr-1"></i>
                            <?php endif; ?>
                            <?php echo htmlspecialchars($jenis_kelamin); ?>
                        </span>
                    </div>
                    
                    <div class="flex justify-between items-start">
                        <span class="text-gray-600 dark:text-gray-400 font-medium">Asal Sekolah:</span>
                        <span class="text-gray-900 dark:text-white text-right"><?php echo htmlspecialchars($asal_sekolah); ?></span>
                    </div>
                    
                    <div class="flex justify-between items-start">
                        <span class="text-gray-600 dark:text-gray-400 font-medium">Nilai UAN:</span>
                        <span class="text-gray-900 dark:text-white text-right font-bold">
                            <i class="fas fa-chart-line mr-1"></i><?php echo htmlspecialchars($nilai_uan); ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex gap-2">
            <a href="index.html" class="flex-1 text-center px-4 py-2.5 text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors">
                <i class="fas fa-arrow-left mr-2"></i>Daftar Lagi
            </a>
            <button onclick="window.print()" class="flex-1 text-center px-4 py-2.5 text-white bg-green-600 rounded-lg hover:bg-green-700 transition-colors">
                <i class="fas fa-print mr-2"></i>Cetak
            </button>
        </div>

    </div>
</body>

</html>
