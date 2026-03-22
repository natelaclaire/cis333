<?php
// Exercise 7-3: Upcoming Meetings
// Instructions:
// 1) Build a flat array named $meetingsFlat where each element is an array:
//      ['club' => club name, 'day' => day, 'time' => time, 'location' => location]
// 2) Use nested foreach loops over $meetingsByClubId.
// 3) Filter the meetings down to only 'Mon', 'Tue', and 'Wed' using array_filter().
// 4) Sort the filtered meetings by day then time using usort().
// 5) Print each meeting on its own line exactly like:
//      Robotics Club: Mon 3:00 PM @ Tech Lab
//
// Expected output:
// Robotics Club: Mon 3:00 PM @ Tech Lab
// Chess Club: Tue 2:00 PM @ Student Center
// Art Club: Wed 1:00 PM @ Art Studio

require_once __DIR__ . '/../data.php';

$meetingsFlat = [];

// TODO: Build $meetingsFlat.

$allowedDays = ['Mon', 'Tue', 'Wed'];
$filtered = [];

// TODO: Use array_filter() to build $filtered from $meetingsFlat.

// TODO: Use usort() to sort $filtered by day then time.

foreach ($filtered as $meeting) {
    print $meeting['club']
        . ': '
        . $meeting['day']
        . ' '
        . $meeting['time']
        . ' @ '
        . $meeting['location']
        . PHP_EOL;
}

