<?php
// Router script for PHP's built-in dev server.
//
// Usage:
//   php -S localhost:8080 -t class-9/app class-9/app/router.php
//
// This lets us demonstrate simple routing (mapping paths to handlers) without
// introducing a full framework.

$uri = $_SERVER['REQUEST_URI'] ?? '/';
$path = parse_url($uri, PHP_URL_PATH);
$path = is_string($path) ? $path : '/';

// Normalize trailing slashes (except for the root path).
if ($path !== '/') {
    $path = rtrim($path, '/');
    if ($path === '') {
        $path = '/';
    }
}

// If the requested file exists (assets, etc.), let the server serve it directly.
$fullPath = __DIR__ . $path;
if (is_file($fullPath)) {
    return false;
}

$routes = [
    '/' => __DIR__ . '/index.php',
    '/query' => __DIR__ . '/pages/query-demo.php',
    '/response' => __DIR__ . '/pages/response-demo.php',
    '/redirect' => __DIR__ . '/pages/redirect-demo.php',
    '/sources' => __DIR__ . '/pages/request-sources.php',
];

$target = $routes[$path] ?? __DIR__ . '/pages/not-found.php';

$_SERVER['CLASS9_ROUTED_PATH'] = $path;
require $target;
return true;
