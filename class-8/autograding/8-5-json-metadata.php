<?php
$studentFile = __DIR__ . '/../starter-files/app/pages/8-5-json-metadata.php';
if (!file_exists($studentFile)) {
    print 'Missing file: 8-5-json-metadata.php' . PHP_EOL;
    exit(1);
}

ob_start();
require $studentFile;
$output = trim(ob_get_clean());

$errors = [];

$expectedLines = [
    'ok: yes',
    'count: 2',
    'first: todo.txt|To Do',
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

if (!isset($ok) || $ok !== true) {
    $errors[] = 'ok must be true';
}

if (!isset($metadataPath) || !is_string($metadataPath) || $metadataPath === '' || !is_file($metadataPath)) {
    $errors[] = 'metadataPath must exist as a file';
} else {
    $contents = file_get_contents($metadataPath);
    if ($contents === false) {
        $errors[] = 'could not read metadataPath';
    } else {
        $decoded = json_decode($contents, true);
        if (!is_array($decoded) || !isset($decoded['notes']) || !is_array($decoded['notes'])) {
            $errors[] = 'metadata.json must decode into an array with notes';
        } elseif (count($decoded['notes']) !== 2) {
            $errors[] = 'notes must have 2 entries';
        }
    }
}

if (!empty($errors)) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;

