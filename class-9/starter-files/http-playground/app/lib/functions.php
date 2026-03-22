<?php
// Helpers for the Class 9 app.
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
