<?php
$studentFile = __DIR__ . '/../starter-files/6-3-break-and-continue.php';
if (!file_exists($studentFile)) {
    print 'Missing file: 6-3-break-and-continue.php' . PHP_EOL;
    exit(1);
}

ob_start();
require $studentFile;
$output = trim(ob_get_clean());

$errors = [];
if (!isset($count) || $count !== 10) {
    $errors[] = 'count must be 10';
}
if (!isset($sum) || $sum !== 75) {
    $errors[] = 'sum must be 75';
}

$expected = "count: 10\nsum: 75";
if ($output !== $expected) {
    $errors[] = 'output does not match expected format';
}

if (!empty($errors)) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;

