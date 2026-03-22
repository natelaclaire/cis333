<?php
// Class 7 app data (hardcoded arrays; no forms/user input this week).
//
// Note: This file is PHP-only, so it intentionally omits the closing `?>`.

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
