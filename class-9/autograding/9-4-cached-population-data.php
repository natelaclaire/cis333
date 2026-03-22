<?php
$studentFile = __DIR__ . '/../starter-files/http-playground/app/pages/9-4-cached-population-data.php';
if (!file_exists($studentFile)) {
    print 'Missing file: 9-4-cached-population-data.php' . PHP_EOL;
    exit(1);
}

// Ensure we start without a cache.
$cacheFile = __DIR__ . '/../starter-files/http-playground/app/storage/cache/9-4-cached-population-data.txt';
if (is_file($cacheFile)) {
    unlink($cacheFile);
}

ob_start();
require $studentFile;
$output = trim(ob_get_clean());

$errors = [];

$expectedRows = [
    'Androscoggin|103793',
    'Cumberland|274800',
    'York|196713',
];

$expectedLines = array_merge(['source: generated', 'rows: 3'], $expectedRows);
$pos = 0;
foreach ($expectedLines as $expectedLine) {
    $next = strpos($output, $expectedLine, $pos);
    if ($next === false) {
        $errors[] = "missing line: {$expectedLine}";
        break;
    }
    $pos = $next + strlen($expectedLine);
}

if (!isset($sourceUsed) || $sourceUsed !== 'generated') {
    $errors[] = 'sourceUsed must be generated when cache is missing';
}

if (!is_file($cacheFile)) {
    $errors[] = 'cache file was not created';
}

if (!empty($errors)) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;
