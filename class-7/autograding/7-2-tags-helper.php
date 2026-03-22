<?php
$studentFile = __DIR__ . '/../starter-files/app/pages/7-2-tags-helper.php';
if (!file_exists($studentFile)) {
    print 'Missing file: 7-2-tags-helper.php' . PHP_EOL;
    exit(1);
}

ob_start();
require $studentFile;
$output = trim(ob_get_clean());

$errors = [];

if (!function_exists('tagsStringForClubId')) {
    $errors[] = 'tagsStringForClubId() must be defined';
} else {
    if (tagsStringForClubId('robotics', $clubTagsById) !== 'technology, teamwork') {
        $errors[] = "robotics tags must be 'technology, teamwork'";
    }
    if (tagsStringForClubId('unknown', $clubTagsById) !== '(none)') {
        $errors[] = "unknown tags must be '(none)'";
    }
}

$expected = "robotics tags: technology, teamwork\nunknown tags: (none)";
if ($output !== $expected) {
    $errors[] = 'output does not match expected format';
}

if (!empty($errors)) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;

