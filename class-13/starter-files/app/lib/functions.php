<?php
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

    return $value !== null;
}

function postEmail(string $key, string $default = ''): string
{
    $value = filter_input(INPUT_POST, $key, FILTER_SANITIZE_EMAIL);
    return $value !== false ? $value : $default;
}

function postUrl(string $key, string $default = ''): string
{
    $value = filter_input(INPUT_POST, $key, FILTER_SANITIZE_URL);
    return $value !== false ? $value : $default;
}

function redirectTo(string $path, int $status = 302): string
{
    if (PHP_SAPI !== 'cli') {
        header('Location: ' . $path, true, $status);
        exit;
    }

    return $path;
}

function killSession() {
    $_SESSION = [];

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    session_destroy();
}