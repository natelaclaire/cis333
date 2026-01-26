<?php
$studentFile = __DIR__ . '/../starter-files/2-3-null-vs-unset.php';
if (!file_exists($studentFile)) {
  echo "Missing file: 2-3-null-vs-unset.php" . PHP_EOL;
  exit(1);
}

ob_start();
require $studentFile;
$output = trim(ob_get_clean());

$errors = [];
if (!isset($colorIsSet) || $colorIsSet !== false) {
  $errors[] = "colorIsSet must be false";
}
if (!isset($colorIsNull) || $colorIsNull !== true) {
  $errors[] = "colorIsNull must be true";
}
if (!isset($shapeIsSet) || $shapeIsSet !== false) {
  $errors[] = "shapeIsSet must be false";
}

$expected = "colorIsSet: false\ncolorIsNull: true\nshapeIsSet: false";
if ($output !== $expected) {
  $errors[] = "output does not match expected format";
}

if (!empty($errors)) {
  echo "FAIL" . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
  exit(1);
}

echo "PASS" . PHP_EOL;
