<?php
// Autograder: Class 14 Exercise 14-3 (Admin panel page)

$projectRoot = __DIR__ . '/../class-14/starter-files';
$file = $projectRoot . '/app/views/pages/exercises/14-3-admin.php';

$errors = [];

if (!is_file($file)) {
    $errors[] = 'Missing file: class-14/starter-files/app/views/pages/exercises/14-3-admin.php';
} else {
    $contents = (string) file_get_contents($file);

    if (stripos($contents, 'TODO:') !== false) {
        $errors[] = '14-3-admin.php still contains TODO comments.';
    }

    // Authorization guard.
    foreach ([
        'isLoggedIn(',
        'isAdmin(',
        'redirect(',
    ] as $needle) {
        if (stripos($contents, $needle) === false) {
            $errors[] = '14-3-admin.php should include an access check using: ' . $needle;
        }
    }

    // Orders listing.
    if (stripos($contents, 'getOrders(') === false) {
        $errors[] = '14-3-admin.php must call getOrders() to display all orders.';
    }
    foreach (['Order', 'Status', 'Total'] as $label) {
        if (stripos($contents, $label) === false) {
            $errors[] = '14-3-admin.php should display order details including: ' . $label;
        }
    }

    // Ship Order link.
    if (stripos($contents, '/ship-order?id=') === false) {
        $errors[] = '14-3-admin.php must include Ship Order links to /ship-order?id=ORDER_ID.';
    }
}

if ($errors !== []) {
    print 'Exercise 14-3 failed tests.' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'Exercise 14-3 passed all tests.' . PHP_EOL;

