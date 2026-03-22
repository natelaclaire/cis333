<?php
// Exercise 9-1: Request Parts (parse_url)
//
// Goal: Practice extracting the method, path, and query string from a request.
//
// Instructions:
// 1) Implement requestParts() below.
// 2) Use parse_url($requestUri, PHP_URL_PATH) to get the path.
// 3) Use parse_url($requestUri, PHP_URL_QUERY) to get the query string.
// 4) If parse_url() returns null/false, fall back to sensible defaults.
//
// Expected output:
// method: GET
// path: /products
// query: sort=price&dir=asc

function requestParts(string $requestUri, string $method): array
{
    // TODO: Implement per instructions.
    return [];
}

$parts = requestParts('/products?sort=price&dir=asc', 'GET');

print 'method: ' . ($parts['method'] ?? '') . PHP_EOL;
print 'path: ' . ($parts['path'] ?? '') . PHP_EOL;
print 'query: ' . ($parts['query'] ?? '') . PHP_EOL;
