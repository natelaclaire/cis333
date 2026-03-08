<?php
$studentFile = __DIR__ . '/../starter-files/app/pages/8-4-archive-note.php';
if (!file_exists($studentFile)) {
    print 'Missing file: 8-4-archive-note.php' . PHP_EOL;
    exit(1);
}

ob_start();
require $studentFile;
$output = trim(ob_get_clean());

$errors = [];

$expectedLines = [
    'archived: quote-copy.txt',
    'existsInArchive: yes',
    'existsInWorking: no',
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

if (!isset($archivedPath) || !is_string($archivedPath) || $archivedPath === '') {
    $errors[] = 'archivedPath must be a non-empty string';
} elseif (!is_file($archivedPath)) {
    $errors[] = 'archivedPath must exist as a file';
} elseif (basename($archivedPath) !== 'quote-copy.txt') {
    $errors[] = 'archivedPath must end in quote-copy.txt';
}

if (!isset($workingCopy) || is_file($workingCopy)) {
    $errors[] = 'workingCopy should not exist after archiving';
}

if (!empty($errors)) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;

