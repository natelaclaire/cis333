<?php
$studentFile = __DIR__ . '/../starter-files/app/pages/7-3-upcoming-meetings.php';
if (!file_exists($studentFile)) {
    print 'Missing file: 7-3-upcoming-meetings.php' . PHP_EOL;
    exit(1);
}

ob_start();
require $studentFile;
$output = trim(ob_get_clean());

$errors = [];
if (!isset($meetingsFlat) || !is_array($meetingsFlat) || count($meetingsFlat) !== 5) {
    $errors[] = 'meetingsFlat must be a flat array of 5 meetings';
}
if (!isset($filtered) || !is_array($filtered) || count($filtered) !== 3) {
    $errors[] = 'filtered must contain 3 meetings (Mon/Tue/Wed)';
}

$expected = implode(
    "\n",
    [
        'Robotics Club: Mon 3:00 PM @ Tech Lab',
        'Chess Club: Tue 2:00 PM @ Student Center',
        'Art Club: Wed 1:00 PM @ Art Studio',
    ]
);

if ($output !== $expected) {
    $errors[] = 'output does not match expected format';
}

if (!empty($errors)) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;

