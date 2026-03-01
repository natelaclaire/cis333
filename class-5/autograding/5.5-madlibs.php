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
    
    $name = 'Ada';
    $major = 'developer';
    $adjective = 'amazing';
    $campusPlace = 'library';
    $object = 'rubber duck';
    $verb = 'debug';
    $story = buildStory($name, $major, $adjective, $campusPlace, $object, $verb);
    
    // confirm that $story contains the expected values (format is not important for this test)
    if (strpos($story, $name) === false) {
        $errors[] = 'buildStory() output must include the student name';
    }
    if (strpos($story, $major) === false) {
        $errors[] = 'buildStory() output must include the college major';
    }
    if (strpos($story, $adjective) === false) {
        $errors[] = 'buildStory() output must include the adjective';
    }
    if (strpos($story, $campusPlace) === false) {
        $errors[] = 'buildStory() output must include the campus place';
    }
    if (strpos($story, $object) === false) {
        $errors[] = 'buildStory() output must include the strange object';
    }
    if (strpos($story, $verb) === false) {
        $errors[] = 'buildStory() output must include the verb';
    }
}

if (!empty($errors)) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;

