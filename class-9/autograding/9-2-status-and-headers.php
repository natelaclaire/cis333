<?php
$studentFile = __DIR__ . '/../starter-files/http-playground/app/pages/9-2-status-and-headers.php';
if (!file_exists($studentFile)) {
    print 'Missing file: 9-2-status-and-headers.php' . PHP_EOL;
    exit(1);
}

if (function_exists('header_remove')) {
    header_remove();
}
http_response_code(200);

ob_start();
require $studentFile;
$output = trim(ob_get_clean());

$errors = [];

$expectedLines = [
    'status: 418',
    'hasContentType: yes',
    'hasExerciseHeader: yes',
];

$pos = 0;
foreach ($expectedLines as $expectedLine) {
    $next = strpos($output, $expectedLine, $pos);
    if ($next === false) {
        $errors[] = "missing line: {$expectedLine}";
        break;
    }
    $pos = $next + strlen($expectedLine);
}

if (http_response_code() !== 418) {
    $errors[] = 'http_response_code must be 418';
}

$headers = headers_list();
$hasContentType = false;
$hasExerciseHeader = false;
foreach ($headers as $headerLine) {
    if (stripos($headerLine, 'Content-Type:') === 0) {
        $hasContentType = true;
    }
    if (stripos($headerLine, 'X-Exercise: 9-2') === 0) {
        $hasExerciseHeader = true;
    }
}

if (!$hasContentType) {
    $errors[] = 'missing Content-Type header';
}
if (!$hasExerciseHeader) {
    $errors[] = 'missing X-Exercise: 9-2 header';
}

if (!empty($errors)) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;
