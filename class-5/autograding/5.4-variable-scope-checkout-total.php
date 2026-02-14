<?php
$studentFile = __DIR__ . '/../starter-files/5.4-variable-scope-checkout-total.php';
if (!file_exists($studentFile)) {
    print 'Missing file: 5.4-variable-scope-checkout-total.php' . PHP_EOL;
    exit(1);
}

ob_start();
require $studentFile;
$output = trim(ob_get_clean());

$errors = [];
if (!isset($total) || abs($total - 52.7) > 0.0001) {
    $errors[] = 'total must be 52.70';
}

$expected = 'total: 52.70';
if ($output !== $expected) {
    $errors[] = 'output does not match expected format';
}

if (!empty($errors)) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;

