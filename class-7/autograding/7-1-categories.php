<?php
$studentFile = __DIR__ . '/../starter-files/app/pages/7-1-categories.php';
if (!file_exists($studentFile)) {
    print 'Missing file: 7-1-categories.php' . PHP_EOL;
    exit(1);
}

ob_start();
require $studentFile;
$output = ob_get_clean();

$errors = [];

$expectedLines = [
    'technology: Robotics Club, Cybersecurity Club',
    'creative: Art Club',
    'games: Chess Club',
];

if (!isset($lines) || !is_array($lines)) {
    $errors[] = 'lines must be an array';
} elseif ($lines !== $expectedLines) {
    $errors[] = 'lines array does not match expected values';
}

$pos = 0;
foreach ($expectedLines as $expectedLine) {
    $next = strpos($output, $expectedLine, $pos);
    if ($next === false) {
        $errors[] = "missing line: {$expectedLine}";
        break;
    }
    $pos = $next + strlen($expectedLine);
}

if (!empty($errors)) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;

