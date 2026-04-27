<?php
// Autograder: Class 14 Exercise 14-1 (Checkout page)
//
// Best-effort static checks:
// - The solution is typically a page with markup + calculations.
// - We avoid executing the app/router in CLI.

$projectRoot = __DIR__ . '/../class-14/starter-files';
$file = $projectRoot . '/app/views/pages/exercises/14-1-checkout.php';

$errors = [];

if (!is_file($file)) {
    $errors[] = 'Missing file: class-14/starter-files/app/views/pages/exercises/14-1-checkout.php';
} else {
    $contents = (string) file_get_contents($file);

    if (stripos($contents, 'TODO:') !== false) {
        $errors[] = '14-1-checkout.php still contains TODO comments.';
    }

    foreach ([
        '$pageTitle',
        'require_once APP_PATH',
        '<form',
        'method="post"',
        'name="email"',
        'Place Order',
    ] as $needle) {
        if (stripos($contents, $needle) === false) {
            $errors[] = '14-1-checkout.php must include: ' . $needle;
        }
    }

    // Expect totals logic based on helpers from functions.php.
    foreach ([
        'calculateTax(',
        'calculateShipping(',
        'subtotal',
        'total',
    ] as $needle) {
        if (stripos($contents, $needle) === false) {
            $errors[] = '14-1-checkout.php should calculate/display: ' . $needle;
        }
    }

    // Email prefill/disable behavior (best effort).
    $hasLoginAwareEmail =
        stripos($contents, 'isLoggedIn(') !== false &&
        (stripos($contents, 'getCurrentUser(') !== false || stripos($contents, '$_SESSION') !== false) &&
        stripos($contents, 'disabled') !== false;
    if (!$hasLoginAwareEmail) {
        $errors[] = '14-1-checkout.php should pre-fill and disable the email field when the user is logged in.';
    }

    // Cart display (best effort).
    $hasCart =
        stripos($contents, 'getShoppingCart(') !== false ||
        stripos($contents, '$_SESSION[\'cart\']') !== false ||
        stripos($contents, '$_SESSION["cart"]') !== false;
    if (!$hasCart) {
        $errors[] = '14-1-checkout.php should display cart contents (use getShoppingCart() or $_SESSION[cart]).';
    }

    // Sticky email: commonly via reading post or session/variable.
    $hasStickyHint =
        stripos($contents, 'filter_input(INPUT_POST') !== false ||
        stripos($contents, 'value="') !== false;
    if (!$hasStickyHint) {
        $errors[] = '14-1-checkout.php should be sticky (re-display the previously entered value on errors).';
    }
}

if ($errors !== []) {
    print 'Exercise 14-1 failed tests.' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'Exercise 14-1 passed all tests.' . PHP_EOL;

