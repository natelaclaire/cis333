<?php
$studentFile = __DIR__ . '/../starter-files/4-1-basic-if-else.php';
if (!file_exists($studentFile)) {
  print 'Missing file: 4-1-basic-if-else.php' . PHP_EOL;
  exit(1);
}

ob_start();
require $studentFile;
$output = trim(ob_get_clean());

$errors = [];
if (!isset($shipping) || $shipping !== 5) {
  $errors[] = 'shipping must be 5';
}

$expected = 'shipping: 5';
if ($output !== $expected) {
  $errors[] = 'output does not match expected format';
}

if (!empty($errors)) {
  print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
  exit(1);
}

print 'PASS' . PHP_EOL;
