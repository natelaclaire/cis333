<?php
$studentFile = __DIR__ . '/../starter-files/http-playground/app/pages/9-3-population-data.php';
if (!file_exists($studentFile)) {
    print 'Missing file: 9-3-population-data.php' . PHP_EOL;
    exit(1);
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

if (!isset($rows) || !is_array($rows)) {
    $errors[] = 'rows must be an array';
} elseif ($rows !== $expectedRows) {
    $errors[] = 'rows array does not match expected values';
}

$expectedLines = array_merge(['rows: 3'], $expectedRows);
$pos = 0;
foreach ($expectedLines as $expectedLine) {
    $next = strpos($output, $expectedLine, $pos);
    if ($next === false) {
        $errors[] = "missing line: {$expectedLine}";
        break;
    }
    $pos = $next + strlen($expectedLine);
}

if (!empty($errors)) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;
