<?php
// Helpers for the Class 8 app.
//
// Note: This is a PHP-only file, so it intentionally omits the closing `?>`.

function ensureDirExists(string $dir): void
{
    if (is_dir($dir)) {
        return;
    }

    mkdir($dir, recursive: true);
}

function ensureFileExists(string $filePath, string $defaultContents = ''): void
{
    if (file_exists($filePath)) {
        return;
    }

    $dir = dirname($filePath);
    ensureDirExists($dir);

    touch($filePath);

    if ($defaultContents !== '') {
        file_put_contents($filePath, $defaultContents);
    }
}

