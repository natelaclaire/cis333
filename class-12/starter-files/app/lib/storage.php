<?php
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/fields.php';

function dataFilePath(): string
{
    return __DIR__ . '/../storage/contacts.tsv';
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

    $fields = contactFields();
    $header = array_keys($fields);
    foreach ($header as &$field) {
        $field = str_replace("\t", ' ', $field);
    }

    file_put_contents($path, implode("\t", $header) . "\n", LOCK_EX);
}

function saveData(array $data): bool
{
    $path = dataFilePath();
    $fields = contactFields();
    $logData = [];
    foreach ($fields as $fieldName => $fieldConfig) {
        $value = $data[$fieldName] ?? '';
        $value = str_replace("\t", ' ', $value);
        $logData[] = $value;
    }

    $bytes = file_put_contents($path, implode("\t", $logData) . "\n", FILE_APPEND);
    if ($bytes === false) {
        return false;
    }

    return true;
}

function newId(string $prefix): string
{
    return $prefix . '_' . bin2hex(random_bytes(6));
}

function writeVisitLog(string $status): void {
    // date format is Year dash Month dash Day, e.g. 2025-03-30 
    $logFile = APP_PATH.'app/storage/logs/visits-'.date('Y-m-d').'.log';

    $logData = [
        // IP of visitor
        $_SERVER['HTTP_X_REAL_IP'] ?? $_SERVER['REMOTE_ADDR'] ?? '-',
        // date and time; time is 24-Hour Hour colon Minute colon Second, e.g. 23:59:01
        date('Y-m-d H:i:s'),
        // URL requested
        $_SERVER['REQUEST_URI'] ?? '-',
        $status,
        // Page that linked to this page, if there was one
        $_SERVER['HTTP_REFERER'] ?? '-',
        // Browser's user agent string
        $_SERVER['HTTP_USER_AGENT'] ?? '-'
    ];

    // separate fields with tabs, each entry on a new line
    $logString = implode("\t", $logData).PHP_EOL; 

    file_put_contents($logFile, $logString, FILE_APPEND);
}
