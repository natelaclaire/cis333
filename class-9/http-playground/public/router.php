<?php
// Router script for PHP's built-in dev server.
//
// Usage:
//   php -S localhost:8080 -t class-9/http-playground/public class-9/http-playground/public/router.php

$uri = $_SERVER['REQUEST_URI'] ?? '/';
$path = parse_url($uri, PHP_URL_PATH);
$path = is_string($path) ? $path : '/';

if ($path !== '/') {
    $path = rtrim($path, '/');
    if ($path === '') {
        $path = '/';
    }
}

// If the requested file exists under public/, let the dev server serve it.
$publicPath = __DIR__ . $path;
if (is_file($publicPath)) {
    return false;
}

$routes = [
    '/' => __DIR__ . '/index.php',
    '/query' => __DIR__ . '/../app/pages/query-demo.php',
    '/response' => __DIR__ . '/../app/pages/response-demo.php',
    '/redirect' => __DIR__ . '/../app/pages/redirect-demo.php',
    '/redirect-handler' => __DIR__ . '/../app/pages/redirect-handler.php',
    '/remote-cache' => __DIR__ . '/../app/pages/remote-cache-demo.php',
    '/streams' => __DIR__ . '/../app/pages/streams-demo.php',
    '/sources' => __DIR__ . '/../app/pages/request-sources.php',
];

$target = $routes[$path] ?? __DIR__ . '/../app/pages/not-found.php';

$_SERVER['CLASS9_ROUTED_PATH'] = $path;
require $target;
return true;
