<?php
// Starter app data for Class 7 reinforcement exercises.
// Hardcoded arrays only (no forms/user input).
//
// Note: This is a PHP-only file, so it intentionally omits the closing `?>`.

$clubsById = [
    'robotics' => 'Robotics Club',
    'chess' => 'Chess Club',
    'art' => 'Art Club',
    'cyber' => 'Cybersecurity Club',
];

$clubTagsById = [
    'robotics' => ['technology', 'teamwork'],
    'chess' => ['strategy', 'competition'],
    'art' => ['creative', 'portfolio'],
    'cyber' => ['technology', 'security'],
];

$categories = [
    'technology' => ['robotics', 'cyber'],
    'creative' => ['art'],
    'games' => ['chess'],
];

$meetingsByClubId = [
    'robotics' => [
        ['Mon', '3:00 PM', 'Tech Lab'],
        ['Thu', '3:00 PM', 'Tech Lab'],
    ],
    'chess' => [
        ['Tue', '2:00 PM', 'Student Center'],
    ],
    'art' => [
        ['Wed', '1:00 PM', 'Art Studio'],
    ],
    'cyber' => [
        ['Fri', '4:00 PM', 'Room 204'],
    ],
];

