<?php
// Exercise 10-3: POST handler for creating an event.

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

// TODO (Exercise 10-3):
// - Retrieve inputs using postString(), postBool(), postArray().
// - Append a new event into $data['events'] and saveData($data).
// - Redirect (PRG) to /ex/events?created=1 with redirectTo('/ex/events?created=1', 303).
//
// Recommended event keys:
// - id (string) via newId('e')
// - title (string)
// - description (string)
// - eventDate (string, YYYY-MM-DD)
// - category (string)
// - format (string)
// - featured (bool)
// - tags (array of strings)

// Temporary placeholder so the file runs before you implement it.
return redirectTo('/ex/events?created=1', 303);

