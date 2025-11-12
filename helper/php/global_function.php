<?php
function isPostRequest(): bool {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function redirectTo(string $url): void {
    header("Location: $url");
    exit();
}