<?php
// Helpers for the Class 11 grant application exercises.

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

// TODO (Exercise 11-1): implement postEmail() using FILTER_SANITIZE_EMAIL.
function postEmail(string $key, string $default = ''): string
{
    return $default;
}

// TODO (Exercise 11-1): implement postUrl() using FILTER_SANITIZE_URL.
function postUrl(string $key, string $default = ''): string
{
    return $default;
}

function redirectTo(string $path, int $status = 302): string
{
    if (PHP_SAPI !== 'cli') {
        header('Location: ' . $path, true, $status);
        exit;
    }

    return $path;
}

function buildApplicationRecord(array $values): array
{
    return [
        'id' => 'ga_' . bin2hex(random_bytes(6)),
        'createdAt' => date(DATE_ATOM),
        'applicantName' => (string) ($values['applicantName'] ?? ''),
        'contactEmail' => (string) ($values['contactEmail'] ?? ''),
        'organizationName' => (string) ($values['organizationName'] ?? ''),
        'requestedAmount' => (int) ($values['requestedAmount'] ?? 0),
        'category' => (string) ($values['category'] ?? ''),
        'projectSummary' => (string) ($values['projectSummary'] ?? ''),
        'websiteUrl' => (string) ($values['websiteUrl'] ?? ''),
        'agreeToTerms' => (bool) ($values['agreeToTerms'] ?? false),
    ];
}

function saveGrantApplication(array $values): void
{
    $records = loadData();
    $records['applications'][] = buildApplicationRecord($values);
    saveData($records);
}

function validateDate(string $date, string $format = 'Y-m-d'): bool
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

function compareDates(string $date1, string $date2, string $format = 'Y-m-d'): int
{
    $d1 = DateTime::createFromFormat($format, $date1);
    $d2 = DateTime::createFromFormat($format, $date2);

    if (!$d1 || !$d2) {
        throw new InvalidArgumentException('Invalid date format');
    }

    return $d1 <=> $d2;
}
