<?php
$studentFile = __DIR__ . '/../starter-files/5.2-optional-parameters-and-named-arguments.php';
if (!file_exists($studentFile)) {
    print 'Missing file: 5.2-optional-parameters-and-named-arguments.php' . PHP_EOL;
    exit(1);
}

ob_start();
require $studentFile;
$output = trim(ob_get_clean());

$errors = [];
if (!isset($email1) || $email1 !== 'ada.lovelace@example.com') {
    $errors[] = 'email1 must be ada.lovelace@example.com';
}
if (!isset($email2) || $email2 !== 'ada.lovelace@hfcc.edu') {
    $errors[] = 'email2 must be ada.lovelace@hfcc.edu';
}

$expected = "email1: ada.lovelace@example.com\nemail2: ada.lovelace@hfcc.edu";
if ($output !== $expected) {
    $errors[] = 'output does not match expected format';
}

if (!empty($errors)) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;

