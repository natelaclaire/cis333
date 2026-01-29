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
if (!isset($age) || !is_int($age)) {
  $errors[] = "age must be an integer";
}
if (!isset($price) || !is_float($price)) {
  $errors[] = "price must be a float";
}
if (!isset($name) || !is_string($name)) {
  $errors[] = "name must be a string";
}
if (!isset($isActive) || !is_bool($isActive)) {
  $errors[] = "isActive must be a boolean";
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
