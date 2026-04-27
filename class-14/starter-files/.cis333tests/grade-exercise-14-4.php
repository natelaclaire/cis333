<?php
// Autograder: Class 14 Exercise 14-4 (My Orders page)

$projectRoot = __DIR__ . '/../class-14/starter-files';
$file = $projectRoot . '/app/views/pages/exercises/14-4-orders.php';

$errors = [];

if (!is_file($file)) {
    $errors[] = 'Missing file: class-14/starter-files/app/views/pages/exercises/14-4-orders.php';
} else {
    $contents = (string) file_get_contents($file);

    if (stripos($contents, 'TODO:') !== false) {
        $errors[] = '14-4-orders.php still contains TODO comments.';
    }

    // Must load orders and filter them.
    foreach ([
        'getOrders(',
        'getCurrentUser(',
        'email',
    ] as $needle) {
        if (stripos($contents, $needle) === false) {
            $errors[] = '14-4-orders.php must include: ' . $needle;
        }
    }

    // Expect some filtering logic (best effort).
    $hasFilter =
        stripos($contents, 'array_filter') !== false ||
        stripos($contents, 'foreach') !== false;
    if (!$hasFilter) {
        $errors[] = '14-4-orders.php should filter orders to the logged-in user (array_filter() or foreach).';
    }

    foreach (['Order', 'Date', 'Status', 'Total'] as $label) {
        if (stripos($contents, $label) === false) {
            $errors[] = '14-4-orders.php should display: ' . $label;
        }
    }
}

if ($errors !== []) {
    print 'Exercise 14-4 failed tests.' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'Exercise 14-4 passed all tests.' . PHP_EOL;

