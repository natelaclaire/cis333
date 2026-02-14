<?php
$studentFile = __DIR__ . '/../starter-files/5.1-includes.php';
$functionsFile = __DIR__ . '/../starter-files/5.1-includes-functions.php';

if (!file_exists($studentFile)) {
    print 'Missing file: 5.1-includes.php' . PHP_EOL;
    exit(1);
}

if (!file_exists($functionsFile)) {
    print 'Missing file: 5.1-includes-functions.php' . PHP_EOL;
    exit(1);
}

$errors = [];

$contents = file_get_contents($studentFile);
if ($contents === false) {
    $errors[] = 'Unable to read 5.1-includes.php';
} else {
    if (strpos($contents, 'require_once') === false || strpos($contents, '__DIR__') === false) {
        $errors[] = '5.1-includes.php must use require_once with __DIR__';
    }
}

ob_start();
require $studentFile;
$output = trim(ob_get_clean());

if (!isset($name) || $name !== 'Ada Lovelace') {
    $errors[] = 'name must be Ada Lovelace';
}

$expected = 'fullName: Ada Lovelace';
if ($output !== $expected) {
    $errors[] = 'output does not match expected format';
}

if (!empty($errors)) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;

