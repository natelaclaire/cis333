<?php
$studentFile = __DIR__ . '/../starter-files/http-playground/app/pages/9-5-api-time.php';
if (!file_exists($studentFile)) {
    print 'Missing file: 9-5-api-time.php' . PHP_EOL;
    exit(1);
}

$_SERVER['REQUEST_METHOD'] = 'GET';

ob_start();
require $studentFile;
$output = trim(ob_get_clean());

$errors = [];

if (!isset($statusCode) || $statusCode !== 200) {
    $errors[] = 'statusCode must be 200';
}

if (!isset($contentType) || $contentType !== 'application/json; charset=UTF-8') {
    $errors[] = 'contentType must be application/json; charset=UTF-8';
}

if (!isset($payload) || !is_array($payload)) {
    $errors[] = 'payload must be an array';
} else {
    if (($payload['ok'] ?? null) !== true) {
        $errors[] = 'payload[ok] must be true';
    }
    if (!isset($payload['time']) || !is_string($payload['time']) || $payload['time'] === '') {
        $errors[] = 'payload[time] must be a non-empty string';
    }
    if (($payload['method'] ?? null) !== 'GET') {
        $errors[] = 'payload[method] must be GET';
    }
}

$decoded = json_decode($output, true);
if (!is_array($decoded)) {
    $errors[] = 'output must be valid JSON';
} elseif ($decoded !== $payload) {
    $errors[] = 'output JSON must match the payload array';
}

if (!empty($errors)) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;
