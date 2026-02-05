<?php
$studentFile = __DIR__ . '/../starter-files/3-1-string-literals.php';
if (!file_exists($studentFile)) {
  echo "Missing file: 3-1-string-literals.php" . PHP_EOL;
  exit(1);
}

ob_start();
require $studentFile;
$output = trim(ob_get_clean());

$errors = [];
if (!isset($path) || $path !== 'C:\\temp\\files') {
  $errors[] = "path must be C:\\temp\\files";
}
if (!isset($quote) || $quote !== 'She said, "Hello"') {
  $errors[] = "quote must be She said, \"Hello\"";
}
if (!isset($multiline) || $multiline !== "Line 1\nLine 2") {
  $errors[] = "multiline must be Line 1\\nLine 2";
}

$expected = "path: C:\\temp\\files\nquote: She said, \"Hello\"\nmultiline:\nLine 1\nLine 2";
if ($output !== $expected) {
  $errors[] = "output does not match expected format";
}

if (!empty($errors)) {
  echo "FAIL" . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
  exit(1);
}

echo "PASS" . PHP_EOL;
