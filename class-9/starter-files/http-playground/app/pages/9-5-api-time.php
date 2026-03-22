<?php
// Exercise 9-5: JSON API endpoint
//
// Goal: Return a JSON response that can be consumed by JavaScript fetch().
//
// Instructions:
// 1) Set Content-Type to application/json; charset=UTF-8.
// 2) Return a JSON object with these keys:
//      - ok (boolean)
//      - time (ISO 8601 string, use date('c'))
//      - method (request method, use $_SERVER['REQUEST_METHOD'] ?? '')
//
// Expected output (format may vary):
// {"ok":true,"time":"...","method":"GET"}

// TODO: Set Content-Type header and status code.
// TODO: Build an array payload and print json_encode(...).
