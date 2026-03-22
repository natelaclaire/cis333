<?php
$studentFile = __DIR__ . '/../starter-files/app/pages/7-5-unset-and-diff.php';
if (!file_exists($studentFile)) {
    print 'Missing file: 7-5-unset-and-diff.php' . PHP_EOL;
    exit(1);
}

ob_start();
require $studentFile;
$output = trim(ob_get_clean());

$errors = [];

if (!isset($categoriesCopy) || !is_array($categoriesCopy) || array_key_exists('games', $categoriesCopy)) {
    $errors[] = "categoriesCopy must not contain the 'games' key";
}
if (!isset($allowedClubIds) || $allowedClubIds !== ['art', 'cyber', 'robotics']) {
    $errors[] = 'allowedClubIds must be sorted: art, cyber, robotics';
}
if (!isset($scheduledClubIds) || $scheduledClubIds !== ['art', 'chess', 'cyber', 'robotics']) {
    $errors[] = 'scheduledClubIds must be sorted: art, chess, cyber, robotics';
}
if (!isset($scheduledButNotAllowed) || $scheduledButNotAllowed !== ['chess']) {
    $errors[] = 'scheduledButNotAllowed must be chess';
}

$expected = implode(
    "\n",
    [
        'allowed: art, cyber, robotics',
        'scheduled: art, chess, cyber, robotics',
        'scheduledButNotAllowed: chess',
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

