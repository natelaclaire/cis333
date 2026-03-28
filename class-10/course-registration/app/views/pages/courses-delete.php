<?php
// POST handler for deleting a course.

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

$data = loadData();

// For this week, we block deleting a course that has registrations.
// (We will improve data integrity handling as the project grows.)
foreach ($data['registrations'] as $registration) {
    if (is_array($registration) && ($registration['courseId'] ?? null) === $id) {
        header('Location: /courses/edit?id=' . rawurlencode($id) . '&blocked=1', true, 303);
        exit;
    }
}

$found = false;
$courses = [];
foreach ($data['courses'] as $course) {
    if (is_array($course) && ($course['id'] ?? null) === $id) {
        $found = true;
        continue;
    }
    $courses[] = $course;
}

if (!$found) {
    http_response_code(404);
    header('Content-Type: text/plain; charset=UTF-8');
    print 'Course not found.' . "\n";
    exit;
}

$data['courses'] = $courses;
saveData($data);

header('Location: /courses?deleted=1', true, 303);
exit;

