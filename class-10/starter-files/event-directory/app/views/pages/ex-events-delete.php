<?php
// Exercise 10-5: POST handler for deleting an event.

require_once __DIR__ . '/../../lib/storage.php';

if (serverString('REQUEST_METHOD') !== 'POST') {
    http_response_code(405);
    header('Allow: POST');
    header('Content-Type: text/plain; charset=UTF-8');
    print 'Method Not Allowed' . "\n";
    if (PHP_SAPI === 'cli') {
        return null;
    }
    exit;
}

// TODO (Exercise 10-5):
// - Retrieve the event id (postString('id')).
// - Remove the matching event from $data['events'].
// - Save JSON.
// - Redirect to /ex/events?deleted=1 using redirectTo(..., 303).

return redirectTo('/ex/events?deleted=1', 303);

