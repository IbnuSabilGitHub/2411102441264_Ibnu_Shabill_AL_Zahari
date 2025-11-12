<?php
function isPostRequest(): bool {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function redirectTo(string $url): void {
    header("Location: $url");
    exit();
}

// Format number untuk rp
function formatRupiah($angka): string {
    return 'Rp ' . number_format($angka, 2, ',', '.');
}
?>

;
