<?php
// Autograder: Class 14 Exercise 14-5 (Ship Order page)
//
// Best-effort static checks (runtime would require seeded orders.json + HTTP flow).

$projectRoot = __DIR__ . '/../class-14/starter-files';
$file = $projectRoot . '/app/views/pages/exercises/14-5-ship-order.php';

$errors = [];

if (!is_file($file)) {
    $errors[] = 'Missing file: class-14/starter-files/app/views/pages/exercises/14-5-ship-order.php';
} else {
    $contents = (string) file_get_contents($file);

    if (stripos($contents, 'TODO:') !== false) {
        $errors[] = '14-5-ship-order.php still contains TODO comments.';
    }

    // Admin-only guard.
    foreach ([
        'isLoggedIn(',
        'isAdmin(',
        'redirect(',
    ] as $needle) {
        if (stripos($contents, $needle) === false) {
            $errors[] = '14-5-ship-order.php should restrict access (expected: ' . $needle . ').';
        }
    }

    // Lookup order and show details.
    if (stripos($contents, 'getOrders(') === false) {
        $errors[] = '14-5-ship-order.php must load orders using getOrders().';
    }
    if (stripos($contents, '$orderId') === false) {
        $errors[] = '14-5-ship-order.php should use the $orderId route/query parameter.';
    }

    // Form + POST handler to update shipped status + tracking and save.
    foreach ([
        '<form',
        'method="post"',
        'tracking',
        'Ship Order',
        '$_SERVER',
        'POST',
        'saveOrders(',
        'Shipped',
    ] as $needle) {
        if (stripos($contents, $needle) === false) {
            $errors[] = '14-5-ship-order.php should include: ' . $needle;
        }
    }
}

if ($errors !== []) {
    print 'Exercise 14-5 failed tests.' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'Exercise 14-5 passed all tests.' . PHP_EOL;

