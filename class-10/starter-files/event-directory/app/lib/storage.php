<?php
// JSON persistence layer for the Event Directory exercises.
//
// Note: This is a PHP-only file, so it intentionally omits the closing `?>`.

require_once __DIR__ . '/functions.php';

function dataFilePath(): string
{
    return __DIR__ . '/../storage/data.json';
}

function defaultData(): array
{
    return [
        'events' => [],
    ];
}

function ensureDataFileExists(): void
{
    $path = dataFilePath();
    $dir = dirname($path);

    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }

    if (is_file($path)) {
        return;
    }

    $json = json_encode(defaultData(), JSON_PRETTY_PRINT);
    if ($json === false) {
        $json = "{\n  \"events\": []\n}\n";
    }

    file_put_contents($path, $json . "\n", LOCK_EX);
}

function loadData(): array
{
    ensureDataFileExists();

    $path = dataFilePath();
    $json = file_get_contents($path);
    if ($json === false) {
        return defaultData();
    }

    $decoded = json_decode($json, true);
    if (!is_array($decoded)) {
        return defaultData();
    }

    if (!isset($decoded['events']) || !is_array($decoded['events'])) {
        $decoded['events'] = [];
    }

    return $decoded;
}

function saveData(array $data): bool
{
    $path = dataFilePath();

    $json = json_encode($data, JSON_PRETTY_PRINT);
    if ($json === false) {
        return false;
    }

    $tmp = $path . '.tmp';

    // Write atomically: write to a temp file, then rename into place.
    $bytes = file_put_contents($tmp, $json . "\n", LOCK_EX);
    if ($bytes === false) {
        return false;
    }

    return rename($tmp, $path);
}

function newId(string $prefix): string
{
    $rand = bin2hex(random_bytes(6));
    return $prefix . '_' . $rand;
}

