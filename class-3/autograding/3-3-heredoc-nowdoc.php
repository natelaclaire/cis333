<?php
$studentFile = __DIR__ . '/../starter-files/3-3-heredoc-nowdoc.php';
if (!file_exists($studentFile)) {
  echo "Missing file: 3-3-heredoc-nowdoc.php" . PHP_EOL;
  exit(1);
}

ob_start();
require $studentFile;
$output = trim(ob_get_clean());

$errors = [];
$expectedHeredoc = "Hello, Ada.\nLine 1\nLine 2";
$expectedNowdoc = 'Hello, $name.\\nLine 1\\nLine 2';

if (!isset($heredocMessage) || $heredocMessage !== $expectedHeredoc) {
  $errors[] = "heredocMessage must interpolate and include newlines";
}
if (!isset($nowdocMessage) || $nowdocMessage !== $expectedNowdoc) {
  $errors[] = "nowdocMessage must be literal";
}

$expected = "heredoc:\n{$expectedHeredoc}\nnowdoc:\n{$expectedNowdoc}";
if ($output !== $expected) {
  $errors[] = "output does not match expected format";
}

if (!empty($errors)) {
  echo "FAIL" . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
  exit(1);
}

echo "PASS" . PHP_EOL;
