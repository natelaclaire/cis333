<?php
$studentFile = __DIR__ . '/../starter-files/5.3-pass-by-reference.php';
if (!file_exists($studentFile)) {
    print 'Missing file: 5.3-pass-by-reference.php' . PHP_EOL;
    exit(1);
}

ob_start();
require $studentFile;
$output = trim(ob_get_clean());

$errors = [];
if (!isset($text) || $text !== 'Too much space') {
    $errors[] = 'text must be Too much space';
}

if (!function_exists('normalizeWhitespace')) {
    $errors[] = 'normalizeWhitespace() must be defined';
} else {
    $sample = "  A\tB   C  ";
    $result = normalizeWhitespace($sample);
    if ($result !== null) {
        $errors[] = 'normalizeWhitespace() must return void (null)';
    }
    if ($sample !== 'A B C') {
        $errors[] = 'normalizeWhitespace() must modify the string in place';
    }
}

$expected = 'text: Too much space';
if ($output !== $expected) {
    $errors[] = 'output does not match expected format';
}

if (!empty($errors)) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;

