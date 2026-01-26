<?php
$studentFile = __DIR__ . '/../starter-files/2-2-type-checks.php';
if (!file_exists($studentFile)) {
  echo "Missing file: 2-2-type-checks.php" . PHP_EOL;
  exit(1);
}

ob_start();
require $studentFile;
$output = trim(ob_get_clean());

$errors = [];
if (!isset($numericCount) || $numericCount !== 3) {
  $errors[] = "numericCount must be 3";
}
if (!isset($digitCount) || $digitCount !== 2) {
  $errors[] = "digitCount must be 2";
}

$expected = "numeric: 3\ndigits: 2";
if ($output !== $expected) {
  $errors[] = "output does not match expected format";
}

if (!empty($errors)) {
  echo "FAIL" . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
  exit(1);
}

echo "PASS" . PHP_EOL;
