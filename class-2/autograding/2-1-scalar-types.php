<?php
$studentFile = __DIR__ . '/../starter-files/2-1-scalar-types.php';
if (!file_exists($studentFile)) {
  echo "Missing file: 2-1-scalar-types.php" . PHP_EOL;
  exit(1);
}

ob_start();
require $studentFile;
$output = trim(ob_get_clean());

$errors = [];
if (!isset($age) || !is_int($age) || $age !== 20) {
  $errors[] = "age must be int 20";
}
if (!isset($price) || !is_float($price) || abs($price - 19.99) > 0.0001) {
  $errors[] = "price must be float 19.99";
}
if (!isset($name) || !is_string($name) || $name !== "Ada") {
  $errors[] = "name must be string 'Ada'";
}
if (!isset($isActive) || !is_bool($isActive) || $isActive !== true) {
  $errors[] = "isActive must be boolean true";
}

$expected = "age: integer\nprice: double\nname: string\nisActive: boolean";
if ($output !== $expected) {
  $errors[] = "output does not match expected format";
}

if (!empty($errors)) {
  echo "FAIL" . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
  exit(1);
}

echo "PASS" . PHP_EOL;
