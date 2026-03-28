<?php
// Exercise 9-2: Status Codes and Headers
//
// Goal: Practice setting a response status code and response headers in PHP.
//
// Important note for this course repository:
// PHP CLI does not behave the same as a web SAPI for headers. To make this
// exercise autogradable, you will also RETURN the status code and header lines
// you intended to send.
//
// Instructions:
// 1) Implement applyDemoResponse() below.
// 2) Set the response status code to $code using http_response_code().
// 3) Set these response headers using header():
//      - Content-Type: text/plain; charset=UTF-8
//      - X-Exercise: 9-2
//      - Cache-Control: no-store
// 4) Return an array with:
//      - status (int)
//      - headers (string[])
//
// Expected output:
// status: 418
// hasContentType: yes
// hasExerciseHeader: yes

function applyDemoResponse(int $code): array
{
    // TODO: Implement per instructions.
    // Hint: build the header lines as strings in an array, call header() for
    // each one, and then return them.
    return [
        'status' => 0,
        'headers' => [],
    ];
}

$result = applyDemoResponse(418);

$headers = $result['headers'] ?? [];
$headers = is_array($headers) ? $headers : [];

$hasContentType = false;
$hasExerciseHeader = false;

foreach ($headers as $headerLine) {
    if (!is_string($headerLine)) {
        continue;
    }

    if (stripos($headerLine, 'Content-Type:') === 0) {
        $hasContentType = true;
    }
    if (stripos($headerLine, 'X-Exercise: 9-2') === 0) {
        $hasExerciseHeader = true;
    }
}

print 'status: ' . (int) ($result['status'] ?? 0) . PHP_EOL;
print 'hasContentType: ' . ($hasContentType ? 'yes' : 'no') . PHP_EOL;
print 'hasExerciseHeader: ' . ($hasExerciseHeader ? 'yes' : 'no') . PHP_EOL;
