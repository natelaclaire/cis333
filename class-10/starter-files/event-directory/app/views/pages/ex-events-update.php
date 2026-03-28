<?php
// Exercise 10-4: POST handler for updating an event.

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

// TODO (Exercise 10-4):
// - Retrieve the event id (postString('id')) and other fields using helpers.
// - Find the event in $data['events'] and replace/update it.
// - Save JSON and redirect to /ex/events?updated=1 with redirectTo(..., 303).
//
// Minimal sanity check suggestion:
// - title required
// - eventDate required

return redirectTo('/ex/events?updated=1', 303);

