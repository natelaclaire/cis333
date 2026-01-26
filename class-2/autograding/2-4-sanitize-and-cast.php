<?php
$studentFile = __DIR__ . '/../starter-files/2-4-sanitize-and-cast.php';
if (!file_exists($studentFile)) {
  echo "Missing file: 2-4-sanitize-and-cast.php" . PHP_EOL;
  exit(1);
}

ob_start();
require $studentFile;
$output = trim(ob_get_clean());

$errors = [];
$expectedNumbers = [1200.0, 9.99, 20.0];

if (!isset($numbers) || !is_array($numbers)) {
  $errors[] = "numbers must be an array";
} else {
  if (count($numbers) !== 3) {
    $errors[] = "numbers must contain 3 values";
  } else {
    for ($i = 0; $i < 3; $i++) {
      if (!is_float($numbers[$i]) && !is_int($numbers[$i])) {
        $errors[] = "numbers[$i] must be numeric";
        break;
      }
      if (abs($numbers[$i] - $expectedNumbers[$i]) > 0.0001) {
        $errors[] = "numbers[$i] value is incorrect";
        break;
      }
    }
  }
}

if (!isset($total) || abs($total - 1229.99) > 0.0001) {
  $errors[] = "total must be 1229.99";
}

$expectedOutput = "total: 1229.99";
if ($output !== $expectedOutput) {
  $errors[] = "output does not match expected format";
}

if (!empty($errors)) {
  echo "FAIL" . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
  exit(1);
}

echo "PASS" . PHP_EOL;
