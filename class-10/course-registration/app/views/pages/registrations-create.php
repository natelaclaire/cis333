<?php
// POST handler for creating a registration.

require_once __DIR__ . '/../../lib/storage.php';

if (serverString('REQUEST_METHOD') !== 'POST') {
    http_response_code(405);
    header('Allow: POST');
    header('Content-Type: text/plain; charset=UTF-8');
    print 'Method Not Allowed' . "\n";
    exit;
}

$studentName = trim(postString('studentName'));
$studentEmail = trim(postString('studentEmail'));
$birthDate = postString('birthDate');

$courseId = postString('courseId');
$status = postString('status', 'credit');

$newsletter = postBool('newsletter');
$acceptedPolicy = postBool('acceptedPolicy');

// Minimal sanity check for this week. Full validation is next week (Chapter 12).
if ($studentName === '' || $courseId === '') {
    header('Location: /registrations/new?missing=1', true, 303);
    exit;
}

$data = loadData();

// Ensure the chosen course exists (basic integrity check).
$courseExists = false;
foreach ($data['courses'] as $course) {
    if (is_array($course) && ($course['id'] ?? null) === $courseId) {
        $courseExists = true;
        break;
    }
}

if (!$courseExists) {
    header('Location: /registrations/new?missing=1', true, 303);
    exit;
}

$data['registrations'][] = [
    'id' => newId('r'),
    'courseId' => $courseId,
    'studentName' => $studentName,
    'studentEmail' => $studentEmail,
    'birthDate' => $birthDate,
    'status' => $status,
    'newsletter' => $newsletter,
    'acceptedPolicy' => $acceptedPolicy,
];

saveData($data);

header('Location: /registrations?created=1', true, 303);
exit;

