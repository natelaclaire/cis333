<?php
$studentFile = __DIR__ . '/../starter-files/4-4-ternary-null-coalescing.php';
if (!file_exists($studentFile)) {
  print 'Missing file: 4-4-ternary-null-coalescing.php' . PHP_EOL;
  exit(1);
}

ob_start();
require $studentFile;
$output = trim(ob_get_clean());

$errors = [];
if (!isset($label) || $label !== 'adult') {
  $errors[] = 'label must be adult';
}
if (!isset($displayName) || $displayName !== 'Ada') {
  $errors[] = 'displayName must be Ada';
}

$expected = "label: adult\ndisplayName: Ada";
if ($output !== $expected) {
  $errors[] = 'output does not match expected format';
}

if (!empty($errors)) {
  print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
  exit(1);
}

print 'PASS' . PHP_EOL;
