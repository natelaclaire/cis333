<?php
// Router script for the Class 9 starter-files HTTP Playground.
//
// Usage:
//   php -S localhost:8000 -t class-9/starter-files/http-playground/public class-9/starter-files/http-playground/public/router.php

$uri = $_SERVER['REQUEST_URI'] ?? '/';
$path = parse_url($uri, PHP_URL_PATH);
$path = is_string($path) ? $path : '/';

if ($path !== '/') {
    $path = rtrim($path, '/');
    if ($path === '') {
        $path = '/';
    }
}

$publicPath = __DIR__ . $path;
if (is_file($publicPath)) {
    return false;
}

$routes = [
    '/' => __DIR__ . '/index.php',

    // Exercises
    '/ex/9-1' => __DIR__ . '/../app/pages/9-1-request-parts.php',
    '/ex/9-2' => __DIR__ . '/../app/pages/9-2-status-and-headers.php',
    '/ex/9-3' => __DIR__ . '/../app/pages/9-3-population-data.php',
    '/ex/9-4' => __DIR__ . '/../app/pages/9-4-cached-population-data.php',

    // AJAX exercise
    '/ajax' => __DIR__ . '/../app/pages/9-5-ajax-page.php',
    '/api/time' => __DIR__ . '/../app/pages/9-5-api-time.php',
];

$target = $routes[$path] ?? '';
if ($target === '' || !is_file($target)) {
    http_response_code(404);
    header('Content-Type: text/plain; charset=UTF-8');
    print '404 Not Found' . "\n";
    return true;
}

require $target;
return true;
