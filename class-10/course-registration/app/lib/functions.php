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
    // Prefer filter_input() over reading from $_GET directly.
    $value = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
    if ($value === null || $value === false) {
        return $default;
    }

    return is_string($value) ? $value : $default;
}

function postString(string $key, string $default = ''): string
{
    // Prefer filter_input() over reading from $_POST directly.
    $value = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
    if ($value === null || $value === false) {
        return $default;
    }

    return is_string($value) ? $value : $default;
}

function postBool(string $key): bool
{
    // Checkboxes that are unchecked are usually missing from the request.
    return filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS) !== null;
}

function postArray(string $key): array
{
    $value = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
    return is_array($value) ? $value : [];
}

// The `never` return type indicates that this function will not return to the caller,
// which is appropriate for a function that performs a redirect and then exits.
function redirectTo(string $path): never
{
    header('Location: ' . $path, true, 302);
    exit;
}
