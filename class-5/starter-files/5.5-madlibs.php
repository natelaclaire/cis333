<?php
// Exercise 5.5: Mad Libs (CLI)
// Instructions:
// 1) Add a require_once statement to include 5.5-madlibs-functions.php.
// 2) Use the __DIR__ constant to build the path.
// 3) Implement the TODO functions in the functions file.
//
// Notes:
// - This script is interactive and will prompt for input in the terminal.
// - Autograding will test your functions directly (not your typed input).

// TODO: Require the functions file here using require_once and __DIR__.

print '=== Mad Libs (CLI) ===' . PHP_EOL . PHP_EOL;

$studentName = requireNonEmpty('Enter a student name: ');
$major = requireNonEmpty('Enter a college major: ');
$adjective = requireNonEmpty('Enter an adjective: ');
$campusPlace = requireNonEmpty('Enter a campus location (library, cafeteria, lab, etc.): ');
$object = requireNonEmpty('Enter a strange object: ');
$verb = requireNonEmpty('Enter a verb (base form): ');

print PHP_EOL . '--- Your Story ---' . PHP_EOL;
print buildStory(
    $studentName,
    $major,
    $adjective,
    $campusPlace,
    $object,
    $verb
);
print '------------------' . PHP_EOL . PHP_EOL;

print 'Goodbye!' . PHP_EOL;
