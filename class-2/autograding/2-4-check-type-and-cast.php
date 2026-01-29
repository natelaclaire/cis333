<?php
$studentFile = __DIR__ . '/../starter-files/2-4-check-type-and-cast.php';
if (!file_exists($studentFile)) {
  echo "Missing file: 2-4-check-type-and-cast.php" . PHP_EOL;
  exit(1);
}

ob_start();
require $studentFile;
$output = trim(ob_get_clean());

$errors = [];

$expectedIsInt = is_int($quotient);
$expectedIsFloat = is_float($quotient);
$expectedAsInt = (int) $quotient;
$expectedAsFloat = (float) $quotient;

if (!isset($isInteger) || $isInteger !== $expectedIsInt) {
  $errors[] = "isInteger must match is_int(\$quotient)";
}
if (!isset($isFloat) || $isFloat !== $expectedIsFloat) {
  $errors[] = "isFloat must match is_float(\$quotient)";
}
if (!isset($asInteger) || $asInteger !== $expectedAsInt) {
  $errors[] = "asInteger must equal (int) \$quotient";
}
if (!isset($asFloat) || abs($asFloat - $expectedAsFloat) > 0.000001) {
  $errors[] = "asFloat must equal (float) \$quotient";
}

$expectedOutput = "Number: " . number_format($quotient, 2, '.', '') . PHP_EOL;
$expectedOutput .= "Is Integer: " . ($expectedIsInt ? "true" : "false") . PHP_EOL;
$expectedOutput .= "Is Float: " . ($expectedIsFloat ? "true" : "false") . PHP_EOL;
$expectedOutput .= "As Integer: " . $expectedAsInt . PHP_EOL;
$expectedOutput .= "As Float: " . number_format($expectedAsFloat, 2, '.', '');

if ($output !== $expectedOutput) {
  $errors[] = "output does not match expected format";
}

if (!empty($errors)) {
  echo "FAIL" . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
  exit(1);
}

echo "PASS" . PHP_EOL;
