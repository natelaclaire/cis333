<?php
$studentFile = __DIR__ . '/../starter-files/app/pages/7-4-meeting-row-vsprintf.php';
if (!file_exists($studentFile)) {
    print 'Missing file: 7-4-meeting-row-vsprintf.php' . PHP_EOL;
    exit(1);
}

$contents = file_get_contents($studentFile);
if ($contents === false) {
    print 'FAIL' . PHP_EOL . 'Unable to read 7-4-meeting-row-vsprintf.php' . PHP_EOL;
    exit(1);
}

$errors = [];
if (stripos($contents, 'vsprintf') === false) {
    $errors[] = 'meetingRowHtml() must use vsprintf()';
}

ob_start();
require $studentFile;
$output = trim(ob_get_clean());

if (!function_exists('meetingRowHtml')) {
    $errors[] = 'meetingRowHtml() must be defined';
} else {
    $expectedRow = '<li><strong>Robotics Club</strong>: Mon at 3:00 PM (Tech Lab)</li>';
    $row = meetingRowHtml('Robotics Club', ['Mon', '3:00 PM', 'Tech Lab']);
    if ($row !== $expectedRow) {
        $errors[] = 'meetingRowHtml() output does not match expected HTML';
    }
}

$expectedOutput = '<li><strong>Robotics Club</strong>: Mon at 3:00 PM (Tech Lab)</li>';
if ($output !== $expectedOutput) {
    $errors[] = 'output does not match expected format';
}

if (!empty($errors)) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;

