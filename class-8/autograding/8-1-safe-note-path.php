<?php
$studentFile = __DIR__ . '/../starter-files/app/pages/8-1-safe-note-path.php';
if (!file_exists($studentFile)) {
    print 'Missing file: 8-1-safe-note-path.php' . PHP_EOL;
    exit(1);
}

ob_start();
require $studentFile;
$output = trim(ob_get_clean());

$errors = [];

$expectedLines = [
    'todo: Buy groceries',
    'attack: blocked',
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

if (!isset($todoPath) || !is_string($todoPath) || $todoPath === '' || !is_file($todoPath)) {
    $errors[] = 'todoPath must be a valid file path';
} elseif (basename($todoPath) !== 'todo.txt') {
    $errors[] = 'todoPath must resolve to todo.txt';
}

if (!isset($attackPath) || $attackPath !== null) {
    $errors[] = 'attackPath must be null (blocked)';
}

if (!empty($errors)) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;

