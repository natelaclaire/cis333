<?php
// Router script for PHP's built-in dev server.
//
// Usage:
//   php -S localhost:8080 -t class-10/starter-files/event-directory/public class-10/starter-files/event-directory/public/router.php

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

    // Exercises (prefix: /ex)
    '/ex' => __DIR__ . '/../app/views/pages/ex-events-index.php',
    '/ex/events' => __DIR__ . '/../app/views/pages/ex-events-index.php',
    '/ex/events/new' => __DIR__ . '/../app/views/pages/ex-events-new.php',
    '/ex/events/create' => __DIR__ . '/../app/views/pages/ex-events-create.php',
    '/ex/events/edit' => __DIR__ . '/../app/views/pages/ex-events-edit.php',
    '/ex/events/update' => __DIR__ . '/../app/views/pages/ex-events-update.php',
    '/ex/events/delete' => __DIR__ . '/../app/views/pages/ex-events-delete.php',
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

