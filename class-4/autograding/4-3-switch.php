<?php
$studentFile = __DIR__ . '/../starter-files/4-3-switch.php';
if (!file_exists($studentFile)) {
  print 'Missing file: 4-3-switch.php' . PHP_EOL;
  exit(1);
}

ob_start();
require $studentFile;
$output = trim(ob_get_clean());

$errors = [];
if (!isset($message) || $message !== 'Needs review') {
  $errors[] = 'message must be Needs review';
}

$expected = 'message: Needs review';
if ($output !== $expected) {
  $errors[] = 'output does not match expected format';
}

if (!empty($errors)) {
  print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
  exit(1);
}

print 'PASS' . PHP_EOL;
