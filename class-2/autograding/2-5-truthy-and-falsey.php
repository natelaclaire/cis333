<?php
$studentFile = __DIR__ . '/../starter-files/2-5-truthy-and-falsey.php';
if (!file_exists($studentFile)) {
  echo "Missing file: 2-5-truthy-and-falsey.php" . PHP_EOL;
  exit(1);
}

ob_start();
require $studentFile;
$output = trim(ob_get_clean());

$errors = [];

$truthyVars = [
  $truthy1 ?? null,
  $truthy2 ?? null,
  $truthy3 ?? null,
  $truthy4 ?? null,
  $truthy5 ?? null,
];

$falseyVars = [
  $falsey1 ?? null,
  $falsey2 ?? null,
  $falsey3 ?? null,
  $falsey4 ?? null,
  $falsey5 ?? null,
];

foreach ($truthyVars as $index => $value) {
  if (!(bool) $value) {
    $errors[] = "truthy" . ($index + 1) . " must be truthy";
  }
}

foreach ($falseyVars as $index => $value) {
  if ((bool) $value) {
    $errors[] = "falsey" . ($index + 1) . " must be falsey";
  }
}

$allValues = array_merge($truthyVars, $falseyVars);
$uniqueValues = array_unique(array_map('serialize', $allValues));
if (count($uniqueValues) !== count($allValues)) {
  $errors[] = "all truthy/falsey values must be different";
}

$expectedOutput = implode(PHP_EOL, [
  "bool(true)",
  "bool(true)",
  "bool(true)",
  "bool(true)",
  "bool(true)",
  "bool(false)",
  "bool(false)",
  "bool(false)",
  "bool(false)",
  "bool(false)",
]);

if ($output !== $expectedOutput) {
  $errors[] = "output does not match expected format";
}

if (!empty($errors)) {
  echo "FAIL" . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
  exit(1);
}

echo "PASS" . PHP_EOL;
