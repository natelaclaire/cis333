<?php
// POST handler for creating a course.

require_once __DIR__ . '/../../lib/storage.php';

if (serverString('REQUEST_METHOD') !== 'POST') {
    http_response_code(405);
    header('Allow: POST');
    header('Content-Type: text/plain; charset=UTF-8');
    print 'Method Not Allowed' . "\n";
    exit;
}

$code = trim(postString('code'));
$title = trim(postString('title'));
$startDate = postString('startDate');

$department = postString('department', 'CIS');
$credits = (int) postString('credits', '3');

$delivery = postString('delivery', 'in_person');

$active = postBool('active');

$meetingDays = postArray('meetingDays');
$meetingDays = array_values(
    array_filter(
        $meetingDays,
        function ($day): bool {
            return is_string($day) && $day !== '';
        }
    )
);

// Minimal sanity check for this week. Full validation is next week (Chapter 12).
if ($code === '' || $title === '') {
    header('Location: /courses/new?missing=1', true, 303);
    exit;
}

$data = loadData();

$data['courses'][] = [
    'id' => newId('c'),
    'code' => $code,
    'title' => $title,
    'startDate' => $startDate,
    'department' => $department,
    'credits' => $credits,
    'delivery' => $delivery,
    'active' => $active,
    'meetingDays' => $meetingDays,
];

saveData($data);

header('Location: /courses?created=1', true, 303);
exit;
