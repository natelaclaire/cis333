<?php
$studentFile = __DIR__ . '/../starter-files/3-2-concat-interpolation.php';
if (!file_exists($studentFile)) {
  echo "Missing file: 3-2-concat-interpolation.php" . PHP_EOL;
  exit(1);
}

ob_start();
require $studentFile;
$output = trim(ob_get_clean());

$errors = [];
if (!isset($fullName) || $fullName !== 'Ada Lovelace') {
  $errors[] = "fullName must be Ada Lovelace";
}
if (!isset($message) || $message !== 'Ada Lovelace has 3 items') {
  $errors[] = "message must be Ada Lovelace has 3 items";
}

$expected = "fullName: Ada Lovelace\nmessage: Ada Lovelace has 3 items";
if ($output !== $expected) {
  $errors[] = "output does not match expected format";
}

if (!empty($errors)) {
  echo "FAIL" . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
  exit(1);
}

echo "PASS" . PHP_EOL;
