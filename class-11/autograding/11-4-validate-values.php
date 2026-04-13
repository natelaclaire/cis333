<?php
// Exercise 11-4 autograder: buildApplicationRecord includes the new fields and is saved to JSON.

$projectRoot = __DIR__ . '/../starter-files/grant-application';
$functionsFile = $projectRoot . '/app/lib/functions.php';
$storageFile = $projectRoot . '/app/lib/storage.php';

if (!file_exists($functionsFile)) {
    print 'Missing file: app/lib/functions.php' . PHP_EOL;
    exit(1);
}
if (!file_exists($storageFile)) {
    print 'Missing file: app/lib/storage.php' . PHP_EOL;
    exit(1);
}

require_once $storageFile;
require_once $functionsFile;

$errors = [];

if (!function_exists('buildApplicationRecord')) {
    $errors[] = 'Missing function buildApplicationRecord()';
} else {
    $record = buildApplicationRecord([
        'applicantName' => 'Ada',
        'contactEmail' => 'ada@example.com',
        'organizationName' => 'Org',
        'requestedAmount' => '1500',
        'category' => 'education',
        'projectSummary' => 'Summary',
        'websiteUrl' => '',
        'agreeToTerms' => true,
        'projectDate' => '2026-04-06',
        'phoneNumber' => '123-456-7890',
    ]);

    if (!is_array($record)) {
        $errors[] = 'buildApplicationRecord() must return an array';
    } else {
        if (!array_key_exists('projectDate', $record)) {
            $errors[] = 'buildApplicationRecord() must include projectDate';
        }
        if (!array_key_exists('phoneNumber', $record)) {
            $errors[] = 'buildApplicationRecord() must include phoneNumber';
        }
        if (($record['projectDate'] ?? null) !== '2026-04-06') {
            $errors[] = 'projectDate must be saved into the record';
        }
        if (($record['phoneNumber'] ?? null) !== '123-456-7890') {
            $errors[] = 'phoneNumber must be saved into the record';
        }
    }
}

// Ensure saveGrantApplication writes the new fields.
$dataFile = $projectRoot . '/app/storage/data.json';
file_put_contents($dataFile, json_encode(['applications' => []], JSON_PRETTY_PRINT) . PHP_EOL);

if (!function_exists('saveGrantApplication')) {
    $errors[] = 'Missing function saveGrantApplication()';
} else {
    saveGrantApplication([
        'applicantName' => 'Ada',
        'contactEmail' => 'ada@example.com',
        'organizationName' => 'Org',
        'requestedAmount' => '1500',
        'category' => 'education',
        'projectSummary' => 'Summary',
        'websiteUrl' => '',
        'agreeToTerms' => true,
        'projectDate' => '2026-04-06',
        'phoneNumber' => '123-456-7890',
    ]);

    $decoded = json_decode((string) file_get_contents($dataFile), true);
    $apps = is_array($decoded) ? ($decoded['applications'] ?? null) : null;
    if (!is_array($apps) || count($apps) !== 1) {
        $errors[] = 'saveGrantApplication() must append a record to data.json';
    } else {
        $app = $apps[0];
        if (($app['projectDate'] ?? null) !== '2026-04-06') {
            $errors[] = 'Saved JSON record must include projectDate';
        }
        if (($app['phoneNumber'] ?? null) !== '123-456-7890') {
            $errors[] = 'Saved JSON record must include phoneNumber';
        }
    }
}

if ($errors !== []) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;
