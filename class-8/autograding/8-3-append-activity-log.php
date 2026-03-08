<?php
$studentFile = __DIR__ . '/../starter-files/app/pages/8-3-append-activity-log.php';
if (!file_exists($studentFile)) {
    print 'Missing file: 8-3-append-activity-log.php' . PHP_EOL;
    exit(1);
}

ob_start();
require $studentFile;
$output = trim(ob_get_clean());

$errors = [];

$expectedLines = [
    'lines: 2',
    'last: Saved note: todo.txt',
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

if (!isset($lines) || !is_array($lines) || count($lines) !== 2) {
    $errors[] = 'lines must be an array with 2 elements';
}

if (!isset($last) || $last !== 'Saved note: todo.txt') {
    $errors[] = 'last line must be Saved note: todo.txt';
}

if (!empty($errors)) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;

