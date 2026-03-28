<?php
$studentFile = __DIR__ . '/../starter-files/http-playground/app/pages/9-2-status-and-headers.php';
if (!file_exists($studentFile)) {
    print 'Missing file: 9-2-status-and-headers.php' . PHP_EOL;
    exit(1);
}

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

if (!isset($result) || !is_array($result)) {
    $errors[] = 'result must be an array';
} else {
    if (($result['status'] ?? null) !== 418) {
        $errors[] = 'result[status] must be 418';
    }

    $headers = $result['headers'] ?? null;
    if (!is_array($headers)) {
        $errors[] = 'result[headers] must be an array of strings';
    } else {
        $hasContentType = false;
        $hasExerciseHeader = false;
        $hasCacheControl = false;

        foreach ($headers as $headerLine) {
            if (!is_string($headerLine)) {
                continue;
            }
            if (stripos($headerLine, 'Content-Type: text/plain;') === 0) {
                $hasContentType = true;
            }
            if (stripos($headerLine, 'X-Exercise: 9-2') === 0) {
                $hasExerciseHeader = true;
            }
            if (stripos($headerLine, 'Cache-Control: no-store') === 0) {
                $hasCacheControl = true;
            }
        }

        if (!$hasContentType) {
            $errors[] = 'missing Content-Type: text/plain; charset=UTF-8 header in result[headers]';
        }
        if (!$hasExerciseHeader) {
            $errors[] = 'missing X-Exercise: 9-2 header in result[headers]';
        }
        if (!$hasCacheControl) {
            $errors[] = 'missing Cache-Control: no-store header in result[headers]';
        }
    }
}

if (!empty($errors)) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;
