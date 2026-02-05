<?php
$studentFile = __DIR__ . '/../starter-files/4-2-logical-operators.php';
if (!file_exists($studentFile)) {
  print 'Missing file: 4-2-logical-operators.php' . PHP_EOL;
  exit(1);
}

ob_start();
require $studentFile;
$output = trim(ob_get_clean());

$errors = [];
if (!isset($eligible) || $eligible !== true) {
  $errors[] = 'eligible must be true';
}

$expected = 'eligible: true';
if ($output !== $expected) {
  $errors[] = 'output does not match expected format';
}

if (!empty($errors)) {
  print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
  exit(1);
}

print 'PASS' . PHP_EOL;
