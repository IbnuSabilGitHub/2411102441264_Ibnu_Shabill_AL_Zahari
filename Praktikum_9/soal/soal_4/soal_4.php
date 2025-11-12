<?php
include_once '../../../helper/php/global_function.php';

// Cek apakah request method adalah POST. Cegah akses langsung ke halaman ini tanpa submit form.
if (!isPostRequest()) {
    redirectTo('index.html');
}

// Fungsi untuk mendapatkan nama bulan menggunakan SWITCH
function getMonthName(int $month): string
{
    switch ($month) {
        case 1:
            return "Januari";
        case 2:
            return "Februari";
        case 3:
            return "Maret";
        case 4:
            return "April";
        case 5:
            return "Mei";
        case 6:
            return "Juni";
        case 7:
            return "Juli";
        case 8:
            return "Agustus";
        case 9:
            return "September";
        case 10:
            return "Oktober";
        case 11:
            return "November";
        case 12:
            return "Desember";
        default:
            return "Bulan tidak valid";
    }
}

// Fungsi untuk mendapatkan jumlah hari dalam bulan menggunakan SWITCH
function getDaysInMonth(int $month): int
{
    switch ($month) {
        case 1:  // Januari
        case 3:  // Maret
        case 5:  // Mei
        case 7:  // Juli
        case 8:  // Agustus
        case 10: // Oktober
        case 12: // Desember
            return 31;

        case 4:  // April
        case 6:  // Juni
        case 9:  // September
        case 11: // November
            return 30;

        case 2:  // Februari
            return 28;

        default:
            return 0; // Bulan tidak valid
    }
}

// Mendapatkan bulan dan tahun saat ini
$currentMonth = (int)date('n');
$currentYear = (int)date('Y');
$currentDate = date('d F Y');

$currentMonthName = getMonthName($currentMonth);
$currentMonthDays = getDaysInMonth($currentMonth);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil - Bulan Saat Ini</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-900">
    <div class="w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">

        <div class="text-center mb-6">
            <h5 class="text-xl font-medium text-gray-900 dark:text-white mb-2">
                <i class="fas fa-calendar-days mr-2"></i>Bulan Saat Ini
            </h5>
            <p class="text-sm text-gray-600 dark:text-gray-400">Informasi Jumlah Hari</p>
        </div>

        <div class="mb-6">
            <div class="p-4 bg-blue-50 border border-blue-200 rounded-lg dark:bg-gray-700 dark:border-gray-600">
                <div class="text-center">
                    <h6 class="text-lg font-medium text-blue-800 dark:text-blue-300 mb-2">
                        <i class="fas fa-calendar-check mr-2"></i><?= $currentDate ?>
                    </h6>
                    <p class="text-sm text-blue-700 dark:text-blue-400">Hari ini</p>
                </div>
            </div>
        </div>

        <div class="mb-6">
            <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800">
                <i class="fas fa-check-circle mr-2"></i>
                <p class="mt-1">
                    Bulan <strong><?= $currentMonthName ?> <?= $currentYear ?></strong> memiliki
                    <strong><?= $currentMonthDays ?> hari</strong>
                </p>
            </div>
        </div>

        <div class="mb-6">
            <div class="p-4 bg-yellow-50 border border-yellow-200 rounded-lg dark:bg-gray-700 dark:border-gray-600">
                <h6 class="text-sm font-medium text-yellow-800 dark:text-yellow-300 mb-2">
                    <i class="fas fa-info-circle mr-2"></i>Detail Informasi:
                </h6>
                <div class="text-xs text-yellow-700 dark:text-yellow-400 space-y-1">
                    <p><strong>Bulan saat ini:</strong> <?= $currentMonthName ?> (Bulan ke-<?= $currentMonth ?>)</p>
                    <p><strong>Tahun:</strong> <?= $currentYear ?></p>
                    <p><strong>Jumlah hari:</strong> <?= $currentMonthDays ?> hari</p>
                    <p><strong>Tanggal saat ini:</strong> <?= $currentDate ?></p>
                </div>
            </div>
        </div>

        <!-- Tombol Aksi -->
        <div class="flex gap-2">
            <a href="index.html"
                class="flex-1 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
        </div>
    </div>
</body>

</html>