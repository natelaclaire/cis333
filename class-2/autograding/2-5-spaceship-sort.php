<?php
$studentFile = __DIR__ . '/../starter-files/2-5-spaceship-sort.php';
if (!file_exists($studentFile)) {
  echo "Missing file: 2-5-spaceship-sort.php" . PHP_EOL;
  exit(1);
}

ob_start();
require $studentFile;
$output = trim(ob_get_clean());

$errors = [];
$expected = [2.0, 3.5, 10.0, 10.5, 20.0];

if (!isset($sorted) || !is_array($sorted)) {
  $errors[] = "sorted must be an array";
} else {
  if (count($sorted) !== 5) {
    $errors[] = "sorted must contain 5 values";
  } else {
    for ($i = 0; $i < 5; $i++) {
      if (!is_numeric($sorted[$i])) {
        $errors[] = "sorted[$i] must be numeric";
        break;
      }
      if (abs((float) $sorted[$i] - $expected[$i]) > 0.0001) {
        $errors[] = "sorted order is incorrect";
        break;
      }
    }
  }
}

$expectedOutput = "2, 3.5, 10, 10.5, 20";
if ($output !== $expectedOutput) {
  $errors[] = "output does not match expected format";
}

if (!empty($errors)) {
  echo "FAIL" . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
  exit(1);
}

echo "PASS" . PHP_EOL;
