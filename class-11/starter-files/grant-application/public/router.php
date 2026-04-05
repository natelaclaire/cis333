<?php
// Router script for PHP's built-in dev server.
//
// Usage:
//   php -S localhost:8080 -t class-11/starter-files/grant-application/public class-11/starter-files/grant-application/public/router.php

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

// Pre-defined exercise routes. Students should not edit routing logic.
$routes = [
    '/' => __DIR__ . '/../app/views/pages/home.php',

    '/grant' => __DIR__ . '/../app/views/pages/grant-form.php',
    '/viewer' => __DIR__ . '/../app/views/pages/grant-viewer.php',
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

