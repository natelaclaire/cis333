<?php
$studentFile = __DIR__ . '/../starter-files/6-5-alternative-syntax-endwhile.php';
if (!file_exists($studentFile)) {
    print 'Missing file: 6-5-alternative-syntax-endwhile.php' . PHP_EOL;
    exit(1);
}

$contents = file_get_contents($studentFile);
if ($contents === false) {
    print 'FAIL' . PHP_EOL . 'Unable to read 6-5-alternative-syntax-endwhile.php' . PHP_EOL;
    exit(1);
}

$errors = [];
if (stripos($contents, 'endwhile') === false) {
    $errors[] = 'use alternative loop syntax with endwhile';
}

ob_start();
require $studentFile;
$output = trim(ob_get_clean());

$expected = "<ul>\n<li>Item 1</li>\n<li>Item 2</li>\n<li>Item 3</li>\n</ul>";
if ($output !== $expected) {
    $errors[] = 'output does not match expected format';
}

if (!empty($errors)) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;

