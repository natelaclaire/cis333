<?php
// Exercise 7-2: Tags Helper
// Instructions:
// 1) Implement tagsStringForClubId() below.
// 2) It should return a comma-separated string of tags for the given club ID.
// 3) If the club ID does not exist in $clubTagsById, return '(none)'.
// 4) Use array_key_exists() and implode().
//
// Expected output:
// robotics tags: technology, teamwork
// unknown tags: (none)

require_once __DIR__ . '/../data.php';

function tagsStringForClubId(string $clubId, array $clubTagsById): string
{
    // TODO: Implement per instructions.
    return '';
}

print 'robotics tags: ' . tagsStringForClubId('robotics', $clubTagsById) . PHP_EOL;
print 'unknown tags: ' . tagsStringForClubId('unknown', $clubTagsById) . PHP_EOL;

