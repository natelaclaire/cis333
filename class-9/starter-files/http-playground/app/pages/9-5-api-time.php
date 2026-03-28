<?php
// Exercise 9-5: JSON API endpoint
//
// Goal: Return a JSON response that can be consumed by JavaScript fetch().
//
// Important note for this course repository:
// PHP CLI does not behave the same as a web SAPI for headers. To make this
// exercise autogradable, you will also store the intended status code and
// content type in variables.
//
// Instructions:
// 1) Set $statusCode to 200.
// 2) Set $contentType to 'application/json; charset=UTF-8'.
// 3) Build a $payload array with these keys:
//      - ok (boolean)
//      - time (ISO 8601 string, use date('c'))
//      - method (request method, use $_SERVER['REQUEST_METHOD'] ?? '')
// 4) Encode $payload into $json using json_encode().
// 5) Send headers (in web mode):
//      - http_response_code($statusCode)
//      - header('Content-Type: ' . $contentType)
// 6) Print $json.
//
// Expected output (format may vary):
// {"ok":true,"time":"...","method":"GET"}

// TODO: Set these.
$statusCode = 0;
$contentType = '';
$payload = [];
$json = '';

// TODO: Send headers using $statusCode and $contentType.

print $json;
