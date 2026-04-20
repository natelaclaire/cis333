<?php
// Autograder: Exercise 13-5 (Products you've viewed)
//
// Mostly static checks:
// - Cookie persistence and redirects are hard to verify in CLI without an HTTP harness.

$projectRoot = __DIR__ . '/../starter-files';

$productsFile = $projectRoot . '/app/views/pages/exercises/13-5-products.php';
$listFile = $projectRoot . '/app/views/pages/exercises/13-5-product-list.php';
$detailsFile = $projectRoot . '/app/views/pages/exercises/13-5-product-details.php';

$errors = [];

function readFileOrEmpty(string $path): string
{
    return is_file($path) ? (string) file_get_contents($path) : '';
}

foreach ([
    'app/views/pages/exercises/13-5-products.php' => $productsFile,
    'app/views/pages/exercises/13-5-product-list.php' => $listFile,
    'app/views/pages/exercises/13-5-product-details.php' => $detailsFile,
] as $label => $path) {
    if (!is_file($path)) {
        $errors[] = 'Missing file: ' . $label;
        continue;
    }
    $contents = readFileOrEmpty($path);
    if (stripos($contents, 'TODO:') !== false) {
        $errors[] = basename($path) . ' still contains TODO comments.';
    }
}

// 13-5-products.php: load JSON into $products.
$productsContents = readFileOrEmpty($productsFile);
foreach ([
    'products.json',
    'file_get_contents',
    'json_decode',
    '$products',
] as $needle) {
    if (stripos($productsContents, $needle) === false) {
        $errors[] = '13-5-products.php must contain: ' . $needle;
    }
}

// 13-5-product-list.php: list products + read cookie + show "viewed" list with links.
$listContents = readFileOrEmpty($listFile);
foreach ([
    'require',
    '13-5-products.php',
    'viewed_products',
    '$_COOKIE',
    'explode',
    '/ex/13-5/details',
    '?id=',
] as $needle) {
    if (stripos($listContents, $needle) === false) {
        $errors[] = '13-5-product-list.php must contain: ' . $needle;
    }
}

// Expect "last five" logic (best effort).
$hasLastFive =
    stripos($listContents, 'array_slice') !== false &&
    (stripos($listContents, '-5') !== false || preg_match('/\\b5\\b/', $listContents) === 1);
if (!$hasLastFive) {
    $errors[] = '13-5-product-list.php should limit viewed products to the last five (array_slice(..., -5)).';
}

// Viewed products should be clickable (step 3 in the exercise).
if (stripos($listContents, 'Products You') === false) {
    $errors[] = '13-5-product-list.php should include a "Products You\\\'ve Viewed" section.';
}
$viewedHasLink =
    preg_match('/Products\\s+You[\\s\\S]*?<a\\s+href=([\"\\\'])\\/ex\\/13-5\\/details\\?id=/i', $listContents) === 1;
if (!$viewedHasLink) {
    $errors[] = '13-5-product-list.php should link each viewed product back to its details page.';
}

// 13-5-product-details.php: read id + update viewed_products cookie.
$detailsContents = readFileOrEmpty($detailsFile);
foreach ([
    'require',
    '13-5-products.php',
    'viewed_products',
    'setcookie',
    'id',
] as $needle) {
    if (stripos($detailsContents, $needle) === false) {
        $errors[] = '13-5-product-details.php must contain: ' . $needle;
    }
}

$hasIdFromQuery =
    stripos($detailsContents, '$_GET') !== false ||
    stripos($detailsContents, 'getString(') !== false;
if (!$hasIdFromQuery) {
    $errors[] = '13-5-product-details.php should read the product id from the query string (use $_GET or getString()).';
}

if ($errors !== []) {
    print 'Exercise 13-5 failed tests.' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'Exercise 13-5 passed all tests.' . PHP_EOL;
