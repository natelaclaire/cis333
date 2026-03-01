<?php
$studentFile = __DIR__ . '/../starter-files/6-1-while-loop-sum.php';
if (!file_exists($studentFile)) {
    print 'Missing file: 6-1-while-loop-sum.php' . PHP_EOL;
    exit(1);
}

ob_start();
require $studentFile;
$output = trim(ob_get_clean());

$errors = [];
if (!isset($sum) || $sum !== 55) {
    $errors[] = 'sum must be 55';
}

$expected = 'sum: 55';
if ($output !== $expected) {
    $errors[] = 'output does not match expected format';
}

if (!empty($errors)) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;

