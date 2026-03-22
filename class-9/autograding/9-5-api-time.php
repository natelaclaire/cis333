<?php
$studentFile = __DIR__ . '/../starter-files/http-playground/app/pages/9-5-api-time.php';
if (!file_exists($studentFile)) {
    print 'Missing file: 9-5-api-time.php' . PHP_EOL;
    exit(1);
}

if (function_exists('header_remove')) {
    header_remove();
}
http_response_code(200);

$_SERVER['REQUEST_METHOD'] = 'GET';

ob_start();
require $studentFile;
$output = trim(ob_get_clean());

$errors = [];

$data = json_decode($output, true);
if (!is_array($data)) {
    $errors[] = 'output must be valid JSON object';
} else {
    if (($data['ok'] ?? null) !== true) {
        $errors[] = 'ok must be true';
    }
    if (!isset($data['time']) || !is_string($data['time']) || $data['time'] === '') {
        $errors[] = 'time must be a non-empty string';
    }
    if (($data['method'] ?? null) !== 'GET') {
        $errors[] = 'method must be GET';
    }
}

$headers = headers_list();
$hasJson = false;
foreach ($headers as $headerLine) {
    if (stripos($headerLine, 'Content-Type: application/json') === 0) {
        $hasJson = true;
    }
}

if (!$hasJson) {
    $errors[] = 'missing Content-Type: application/json header';
}

if (!empty($errors)) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;
