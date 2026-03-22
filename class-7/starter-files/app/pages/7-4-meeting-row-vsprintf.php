<?php
// Exercise 7-4: Meeting Row Formatting (Destructuring + vsprintf)
// Instructions:
// 1) Implement meetingRowHtml() below.
// 2) $meeting is a 3-element array: [day, time, location].
// 3) Use destructuring to get the day/time/location variables.
// 4) Use vsprintf() to format this exact HTML (with escaping):
//      <li><strong>{club}</strong>: {day} at {time} ({location})</li>
//
// Expected output:
// <li><strong>Robotics Club</strong>: Mon at 3:00 PM (Tech Lab)</li>

function meetingRowHtml(string $clubName, array $meeting): string
{
    // TODO: Implement per instructions.
    return '';
}

print meetingRowHtml('Robotics Club', ['Mon', '3:00 PM', 'Tech Lab']) . PHP_EOL;

