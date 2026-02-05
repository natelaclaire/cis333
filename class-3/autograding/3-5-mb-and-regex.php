<?php
$studentFile = __DIR__ . '/../starter-files/3-5-mb-and-regex.php';
if (!file_exists($studentFile)) {
  echo "Missing file: 3-5-mb-and-regex.php" . PHP_EOL;
  exit(1);
}

ob_start();
require $studentFile;
$output = trim(ob_get_clean());

$errors = [];
if (!isset($charCount) || $charCount !== 5) {
  $errors[] = "charCount must be 5";
}
if (!isset($clean) || $clean !== 'Too much space') {
  $errors[] = "clean must be Too much space";
}
if (!isset($hasPhp) || $hasPhp !== true) {
  $errors[] = "hasPhp must be true";
}

$expected = "multi-byte-safe char count: 5\nchar count from strlen(): 6\nclean: Too much space\nhasPhp: true";
if ($output !== $expected) {
  $errors[] = "output does not match expected format";
}

if (!empty($errors)) {
  echo "FAIL" . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
  exit(1);
}

echo "PASS" . PHP_EOL;
