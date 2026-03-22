<?php
// Exercise 7-1: Categories Page
// Instructions:
// 1) Use $categories (category => list of club IDs) and $clubsById
//    (club ID => club name) to build a Categories page.
// 2) Create an array named $lines where each element is a string like:
//      technology: Robotics Club, Cybersecurity Club
// 3) Use foreach loops. Use implode(', ', ...) to build the comma-separated
//    club name list.
// 4) Print the results inside a <ul> as <li> elements.
//
// Expected output (inside the list items, order matters):
// technology: Robotics Club, Cybersecurity Club
// creative: Art Club
// games: Chess Club

$pageTitle = 'Exercise 7-1: Categories';

require_once __DIR__ . '/../data.php';
require_once __DIR__ . '/../partials/header.php';

$lines = [];

// TODO: Build the $lines array as described above.

print '<ul>' . PHP_EOL;
foreach ($lines as $line) {
    print '    <li>' . htmlspecialchars($line, ENT_QUOTES, 'UTF-8') . '</li>' . PHP_EOL;
}
print '</ul>' . PHP_EOL;

require_once __DIR__ . '/../partials/footer.php';

