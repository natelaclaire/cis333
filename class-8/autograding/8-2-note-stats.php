<?php
$studentFile = __DIR__ . '/../starter-files/app/pages/8-2-note-stats.php';
if (!file_exists($studentFile)) {
    print 'Missing file: 8-2-note-stats.php' . PHP_EOL;
    exit(1);
}

ob_start();
require $studentFile;
$output = trim(ob_get_clean());

$errors = [];

$expectedLines = [
    'nonEmptyLines: 2',
    'firstNonEmptyLine: Talk is cheap. Show me the code.',
    'totalChars: 49',
];

$pos = 0;
foreach ($expectedLines as $expectedLine) {
    $next = strpos($output, $expectedLine, $pos);
    if ($next === false) {
        $errors[] = "missing line: {$expectedLine}";
        break;
    }
    $pos = $next + strlen($expectedLine);
}

if (!isset($stats) || !is_array($stats)) {
    $errors[] = 'stats must be an array';
} else {
    $nonEmptyLines = $stats['nonEmptyLines'] ?? null;
    $first = $stats['firstNonEmptyLine'] ?? null;
    $totalChars = $stats['totalChars'] ?? null;

    if ($nonEmptyLines !== 2) {
        $errors[] = 'nonEmptyLines must be 2';
    }
    if ($first !== 'Talk is cheap. Show me the code.') {
        $errors[] = 'firstNonEmptyLine does not match expected';
    }
    if ($totalChars !== 49) {
        $errors[] = 'totalChars must be 49';
    }
}

if (!empty($errors)) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;

