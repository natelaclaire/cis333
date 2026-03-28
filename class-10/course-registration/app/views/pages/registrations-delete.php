<?php
// POST handler for deleting a registration.

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
    print 'Missing registration id.' . "\n";
    exit;
}

// Preserve an optional filter so we can redirect back to the same view.
$courseId = postString('courseId');

$data = loadData();

$found = false;
$registrations = [];
foreach ($data['registrations'] as $registration) {
    if (is_array($registration) && ($registration['id'] ?? null) === $id) {
        $found = true;
        continue;
    }
    $registrations[] = $registration;
}

if (!$found) {
    http_response_code(404);
    header('Content-Type: text/plain; charset=UTF-8');
    print 'Registration not found.' . "\n";
    exit;
}

$data['registrations'] = $registrations;
saveData($data);

$qs = ['deleted' => '1'];
if ($courseId !== '') {
    $qs['courseId'] = $courseId;
}

header('Location: /registrations?' . http_build_query($qs), true, 303);
exit;

