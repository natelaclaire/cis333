<?php
$studentFile = __DIR__ . '/../starter-files/6-4-for-loop-list.php';
if (!file_exists($studentFile)) {
    print 'Missing file: 6-4-for-loop-list.php' . PHP_EOL;
    exit(1);
}

ob_start();
require $studentFile;
$output = trim(ob_get_clean());

$errors = [];
if (!isset($list) || $list !== '1, 2, 3, 4, 5') {
    $errors[] = 'list must be 1, 2, 3, 4, 5';
}

$expected = 'list: 1, 2, 3, 4, 5';
if ($output !== $expected) {
    $errors[] = 'output does not match expected format';
}

if (!empty($errors)) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;

