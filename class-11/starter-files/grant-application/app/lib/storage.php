<?php
// JSON persistence for the Class 11 grant application exercises.

require_once __DIR__ . '/functions.php';

function dataFilePath(): string
{
    return __DIR__ . '/../storage/data.json';
}

function defaultData(): array
{
    return [
        'applications' => [],
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
        $json = "{\n  \"applications\": []\n}\n";
    }

    file_put_contents($path, $json . "\n", LOCK_EX);
}

function loadData(): array
{
    ensureDataFileExists();

    $json = file_get_contents(dataFilePath());
    if ($json === false) {
        return defaultData();
    }

    $decoded = json_decode($json, true);
    if (!is_array($decoded)) {
        return defaultData();
    }

    if (!isset($decoded['applications']) || !is_array($decoded['applications'])) {
        $decoded['applications'] = [];
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
    $bytes = file_put_contents($tmp, $json . "\n", LOCK_EX);
    if ($bytes === false) {
        return false;
    }

    return rename($tmp, $path);
}

function newId(string $prefix): string
{
    return $prefix . '_' . bin2hex(random_bytes(6));
}

