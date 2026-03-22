<?php
// Exercise 7-5: unset() and array_diff()
// Instructions:
// 1) Make a copy of $categories called $categoriesCopy.
// 2) Remove the 'games' category from $categoriesCopy using unset().
// 3) Create $allowedClubIds as all club IDs from $categoriesCopy (combined).
// 4) Create $scheduledClubIds from $meetingsByClubId.
// 5) Use array_diff() to compute $scheduledButNotAllowed.
// 6) Sort the ID arrays so output order is stable.
// 7) Print the results exactly like the expected output.
//
// Expected output:
// allowed: art, cyber, robotics
// scheduled: art, chess, cyber, robotics
// scheduledButNotAllowed: chess

require_once __DIR__ . '/../data.php';

$categoriesCopy = $categories;

// TODO: unset the 'games' category from $categoriesCopy.

$allowedClubIds = [];
$scheduledClubIds = array_keys($meetingsByClubId);
$scheduledButNotAllowed = [];

// TODO: Build $allowedClubIds by combining the values from $categoriesCopy.
// TODO: Sort $allowedClubIds and $scheduledClubIds.
// TODO: Build $scheduledButNotAllowed with array_diff and sort it.

print 'allowed: ' . implode(', ', $allowedClubIds) . PHP_EOL;
print 'scheduled: ' . implode(', ', $scheduledClubIds) . PHP_EOL;
print 'scheduledButNotAllowed: ' . implode(', ', $scheduledButNotAllowed) . PHP_EOL;
