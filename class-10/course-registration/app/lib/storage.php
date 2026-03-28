<?php
// JSON persistence layer for the Class 10 app.
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
        'courses' => [],
        'registrations' => [],
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
        $json = "{\n  \"courses\": [],\n  \"registrations\": []\n}\n";
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

    if (!isset($decoded['courses']) || !is_array($decoded['courses'])) {
        $decoded['courses'] = [];
    }

    if (!isset($decoded['registrations']) || !is_array($decoded['registrations'])) {
        $decoded['registrations'] = [];
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
    // This helps prevent partially-written JSON if a request dies mid-write.
    $bytes = file_put_contents($tmp, $json . "\n", LOCK_EX);
    if ($bytes === false) {
        return false;
    }

    return rename($tmp, $path);
}

function newId(string $prefix): string
{
    // Short random ID; good enough for this class project.
    $rand = bin2hex(random_bytes(6));
    return $prefix . '_' . $rand;
}
