<?php
$studentFile = __DIR__ . '/../starter-files/3-4-string-functions.php';
if (!file_exists($studentFile)) {
  echo "Missing file: 3-4-string-functions.php" . PHP_EOL;
  exit(1);
}

ob_start();
require $studentFile;
$output = trim(ob_get_clean());

$errors = [];
if (!isset($domain) || $domain !== 'example.com') {
  $errors[] = "domain must be example.com";
}
if (!isset($masked) || $masked !== '***@example.com') {
  $errors[] = "masked must be ***@example.com";
}
if (!isset($withDash) || $withDash !== 'CIS-333') {
  $errors[] = "withDash must be CIS-333";
}

$expected = "domain: example.com\nmasked: ***@example.com\nwithDash: CIS-333";
if ($output !== $expected) {
  $errors[] = "output does not match expected format";
}

if (!empty($errors)) {
  echo "FAIL" . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
  exit(1);
}

echo "PASS" . PHP_EOL;
