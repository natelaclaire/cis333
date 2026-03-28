<?php
// Router script for PHP's built-in dev server.
//
// Usage:
//   php -S localhost:8000 -t class-10/course-registration/public class-10/course-registration/public/router.php

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
    '/' => __DIR__ . '/../app/views/pages/home.php',
    '/courses' => __DIR__ . '/../app/views/pages/courses-index.php',
    '/courses/new' => __DIR__ . '/../app/views/pages/courses-new.php',
    '/courses/create' => __DIR__ . '/../app/views/pages/courses-create.php',
    '/courses/edit' => __DIR__ . '/../app/views/pages/courses-edit.php',
    '/courses/update' => __DIR__ . '/../app/views/pages/courses-update.php',
    '/courses/delete' => __DIR__ . '/../app/views/pages/courses-delete.php',
    '/debug/get' => __DIR__ . '/../app/views/pages/debug-get.php',
    '/debug/post' => __DIR__ . '/../app/views/pages/debug-post.php',
    '/debug/post-result' => __DIR__ . '/../app/views/pages/debug-post-result.php',
    '/debug/storage' => __DIR__ . '/../app/views/pages/debug-storage.php',
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
