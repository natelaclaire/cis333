<?php
// Exercise 9-2: Status Codes and Headers
//
// Goal: Practice setting a response status code and response headers in PHP.
//
// Instructions:
// 1) Implement applyDemoResponse() below.
// 2) Set the response status code to $code using http_response_code().
// 3) Set these response headers using header():
//      - Content-Type: text/plain; charset=UTF-8
//      - X-Exercise: 9-2
//      - Cache-Control: no-store
//
// Expected output:
// status: 418
// hasContentType: yes
// hasExerciseHeader: yes

function applyDemoResponse(int $code): void
{
    // TODO: Implement per instructions.
}

// Reset state (helps when re-running under an autograder).
if (function_exists('header_remove')) {
    header_remove();
}
http_response_code(200);

applyDemoResponse(418);

$headers = headers_list();

$hasContentType = false;
$hasExerciseHeader = false;

foreach ($headers as $headerLine) {
    if (stripos($headerLine, 'Content-Type:') === 0) {
        $hasContentType = true;
    }
    if (stripos($headerLine, 'X-Exercise: 9-2') === 0) {
        $hasExerciseHeader = true;
    }
}

print 'status: ' . (int) http_response_code() . PHP_EOL;
print 'hasContentType: ' . ($hasContentType ? 'yes' : 'no') . PHP_EOL;
print 'hasExerciseHeader: ' . ($hasExerciseHeader ? 'yes' : 'no') . PHP_EOL;
