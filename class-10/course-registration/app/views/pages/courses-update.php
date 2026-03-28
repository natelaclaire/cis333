<?php
// POST handler for updating a course.

require_once __DIR__ . '/../../lib/storage.php';

if (serverString('REQUEST_METHOD') !== 'POST') {
    http_response_code(405);
    header('Allow: POST');
    header('Content-Type: text/plain; charset=UTF-8');
    print 'Method Not Allowed' . "\n";
    exit;
}

$id = postString('id');
if ($id === '') {
    http_response_code(400);
    header('Content-Type: text/plain; charset=UTF-8');
    print 'Missing course id.' . "\n";
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
    header('Location: /courses/edit?id=' . rawurlencode($id) . '&missing=1', true, 303);
    exit;
}

$data = loadData();

$foundIndex = null;
foreach ($data['courses'] as $i => $course) {
    if (is_array($course) && ($course['id'] ?? null) === $id) {
        $foundIndex = $i;
        break;
    }
}

if ($foundIndex === null) {
    http_response_code(404);
    header('Content-Type: text/plain; charset=UTF-8');
    print 'Course not found.' . "\n";
    exit;
}

$data['courses'][$foundIndex] = [
    'id' => $id,
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

header('Location: /courses?updated=1', true, 303);
exit;

