<?php
$studentFile = __DIR__ . '/../starter-files/6-2-do-while-loop.php';
if (!file_exists($studentFile)) {
    print 'Missing file: 6-2-do-while-loop.php' . PHP_EOL;
    exit(1);
}

$contents = file_get_contents($studentFile);
if ($contents === false) {
    print 'FAIL' . PHP_EOL . 'Unable to read 6-2-do-while-loop.php' . PHP_EOL;
    exit(1);
}

$errors = [];
if (strpos($contents, 'do') === false || strpos($contents, 'while') === false) {
    $errors[] = 'use a do...while loop';
}

ob_start();
require $studentFile;
$output = trim(ob_get_clean());

if (!isset($iterations) || $iterations !== 1) {
    $errors[] = 'iterations must be 1';
}

$expected = 'iterations: 1';
if ($output !== $expected) {
    $errors[] = 'output does not match expected format';
}

if (!empty($errors)) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;

