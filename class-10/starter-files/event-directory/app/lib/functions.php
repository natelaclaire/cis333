<?php
// Helpers for the Event Directory exercises.
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
    // Prefer filter_input() in the browser. In CLI (autograding), filter_input() does not
    // have request data, so we fall back to $_GET.
    $value = filter_input(INPUT_GET, $key, FILTER_UNSAFE_RAW);
    if (PHP_SAPI === 'cli' && $value === null) {
        $value = $_GET[$key] ?? null;
    }

    if ($value === null || $value === false) {
        return $default;
    }

    return is_string($value) ? $value : $default;
}

function postString(string $key, string $default = ''): string
{
    // Prefer filter_input() in the browser. In CLI (autograding), filter_input() does not
    // have request data, so we fall back to $_POST.
    $value = filter_input(INPUT_POST, $key, FILTER_UNSAFE_RAW);
    if (PHP_SAPI === 'cli' && $value === null) {
        $value = $_POST[$key] ?? null;
    }

    if ($value === null || $value === false) {
        return $default;
    }

    return is_string($value) ? $value : $default;
}

function postBool(string $key): bool
{
    $value = filter_input(INPUT_POST, $key, FILTER_UNSAFE_RAW);
    if (PHP_SAPI === 'cli' && $value === null) {
        $value = $_POST[$key] ?? null;
    }

    // Checkboxes that are unchecked are usually missing from the request.
    return $value !== null;
}

function postArray(string $key): array
{
    $value = filter_input(INPUT_POST, $key, FILTER_UNSAFE_RAW, FILTER_REQUIRE_ARRAY);
    if (PHP_SAPI === 'cli' && $value === null) {
        $value = $_POST[$key] ?? null;
    }

    return is_array($value) ? $value : [];
}

function redirectTo(string $path, int $status = 302): string
{
    // In the browser, perform a real redirect. In CLI (autograding), return the path.
    if (PHP_SAPI !== 'cli') {
        header('Location: ' . $path, true, $status);
        exit;
    }

    return $path;
}

