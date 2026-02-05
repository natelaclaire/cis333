<?php
$studentFile = __DIR__ . '/../starter-files/4-5-password-regex.php';
if (!file_exists($studentFile)) {
  print 'Missing file: 4-5-password-regex.php' . PHP_EOL;
  exit(1);
}

ob_start();
require $studentFile;
$output = trim(ob_get_clean());

$errors = [];
if (!isset($isStrong) || $isStrong !== true) {
  $errors[] = 'isStrong must be true';
}
if (!isset($message) || $message !== 'strong') {
  $errors[] = 'message must be strong';
}

$expected = 'strength: strong';
if ($output !== $expected) {
  $errors[] = 'output does not match expected format';
}

if (!empty($errors)) {
  print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
  exit(1);
}

print 'PASS' . PHP_EOL;
