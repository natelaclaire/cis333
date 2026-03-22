<?php
$studentFile = __DIR__ . '/../starter-files/http-playground/app/pages/9-1-request-parts.php';
if (!file_exists($studentFile)) {
    print 'Missing file: 9-1-request-parts.php' . PHP_EOL;
    exit(1);
}

ob_start();
require $studentFile;
$output = trim(ob_get_clean());

$errors = [];

$expectedLines = [
    'method: GET',
    'path: /products',
    'query: sort=price&dir=asc',
];

$pos = 0;
foreach ($expectedLines as $expectedLine) {
    $next = strpos($output, $expectedLine, $pos);
    if ($next === false) {
        $errors[] = "missing line: {$expectedLine}";
        break;
    }
    $pos = $next + strlen($expectedLine);
}

if (!isset($parts) || !is_array($parts)) {
    $errors[] = 'parts must be an array';
} else {
    if (($parts['method'] ?? null) !== 'GET') {
        $errors[] = 'parts[method] must be GET';
    }
    if (($parts['path'] ?? null) !== '/products') {
        $errors[] = 'parts[path] must be /products';
    }
    if (($parts['query'] ?? null) !== 'sort=price&dir=asc') {
        $errors[] = 'parts[query] must be sort=price&dir=asc';
    }
}

if (!empty($errors)) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;
