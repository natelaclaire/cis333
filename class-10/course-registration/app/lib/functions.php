<?php
// Helpers for the Class 10 app.
//
// Note: This is a PHP-only file, so it intentionally omits the closing `?>`.

function h(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function serverString(string $key, string $default = ''): string
{
    $value = $_SERVER[$key] ?? $default;
    return is_string($value) ? $value : $default;
}

function getString(string $key, string $default = ''): string
{
    $value = $_GET[$key] ?? $default;
    return is_string($value) ? $value : $default;
}

function postString(string $key, string $default = ''): string
{
    $value = $_POST[$key] ?? $default;
    return is_string($value) ? $value : $default;
}

function redirectTo(string $path): never
{
    header('Location: ' . $path, true, 302);
    exit;
}
