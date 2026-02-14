<?php
$scriptFile = __DIR__ . '/../starter-files/5.5-madlibs.php';
$functionsFile = __DIR__ . '/../starter-files/5.5-madlibs-functions.php';

if (!file_exists($scriptFile)) {
    print 'Missing file: 5.5-madlibs.php' . PHP_EOL;
    exit(1);
}

if (!file_exists($functionsFile)) {
    print 'Missing file: 5.5-madlibs-functions.php' . PHP_EOL;
    exit(1);
}

$errors = [];

$scriptContents = file_get_contents($scriptFile);
if ($scriptContents === false) {
    $errors[] = 'Unable to read 5.5-madlibs.php';
} else {
    if (strpos($scriptContents, 'require_once') === false || strpos($scriptContents, '__DIR__') === false) {
        $errors[] = '5.5-madlibs.php must use require_once with __DIR__';
    }
}

require $functionsFile;

if (!function_exists('aOrAn')) {
    $errors[] = 'aOrAn() must be defined';
} else {
    if (aOrAn('apple') !== 'an') {
        $errors[] = "aOrAn('apple') must be an";
    }
    if (aOrAn('banana') !== 'a') {
        $errors[] = "aOrAn('banana') must be a";
    }
}

if (!function_exists('buildStory')) {
    $errors[] = 'buildStory() must be defined';
} else {
    $story = buildStory('Ada', 'developer', 'amazing', 'library', 'rubber duck', 'debug');
    $expected =
        "It was an amazing morning on campus.\n" .
        "Ada, a developer major, was walking toward library.\n" .
        "Suddenly, a mysterious rubber duck blocked the path.\n" .
        "Without hesitation, Ada decided to debug.\n" .
        "By the end of the day, the whole campus was talking about it.\n";

    if ($story !== $expected) {
        $errors[] = 'buildStory() output does not match the expected story';
    }
}

if (!empty($errors)) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;

