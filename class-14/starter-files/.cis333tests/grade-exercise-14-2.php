<?php
// Autograder: Class 14 Exercise 14-2 (placeOrder() in functions.php)
//
// Best-effort static checks:
// - placeOrder() normally redirects + exits, so we avoid runtime testing in CLI.
// - We check that TODO placeholders are removed and key steps exist.

$projectRoot = __DIR__ . '/../class-14/starter-files';
$file = $projectRoot . '/app/lib/functions.php';

$errors = [];

if (!is_file($file)) {
    $errors[] = 'Missing file: class-14/starter-files/app/lib/functions.php';
} else {
    $contents = (string) file_get_contents($file);

    // Ensure the Exercise 14-2 TODOs were addressed.
    if (stripos($contents, 'Exercise 14-2') === false || stripos($contents, 'function placeOrder') === false) {
        $errors[] = 'functions.php must include the placeOrder() function for Exercise 14-2.';
    }
    if (stripos($contents, 'TODO: if the user is not logged in, check if the email address is already associated') !== false) {
        $errors[] = 'placeOrder() still contains the TODO for checking existing user accounts.';
    }
    foreach ([
        "'items' => [],",
        "'subtotal' => 0.00",
        "'tax' => 0.00",
        "'shipping' => 0.00",
        "'total' => 0.00",
    ] as $placeholder) {
        if (strpos($contents, $placeholder) !== false) {
            $errors[] = 'placeOrder() still contains a placeholder: ' . $placeholder;
        }
    }

    // Must validate email when not logged in.
    if (stripos($contents, 'FILTER_VALIDATE_EMAIL') === false) {
        $errors[] = 'placeOrder() should validate the posted email using FILTER_VALIDATE_EMAIL.';
    }

    // Must detect existing user and send to login (best effort).
    $hasExistingUserCheck =
        preg_match('/\\bisset\\s*\\(\\s*\\$users\\s*\\[\\s*\\$email\\s*\\]\\s*\\)/i', $contents) === 1 ||
        preg_match('/\\barray_key_exists\\s*\\(\\s*\\$email\\s*,\\s*\\$users\\s*\\)/i', $contents) === 1;
    if (!$hasExistingUserCheck) {
        $errors[] = 'placeOrder() should check whether the email already exists in the users array (isset($users[$email]) or array_key_exists()).';
    }
    if (stripos($contents, '/login') === false) {
        $errors[] = 'placeOrder() should redirect the user to /login when the email already has an account.';
    }

    // Must compute tax/shipping/total using helpers.
    foreach ([
        'calculateTax(',
        'calculateShipping(',
    ] as $needle) {
        if (stripos($contents, $needle) === false) {
            $errors[] = 'placeOrder() must use: ' . $needle;
        }
    }

    // Must pull items from the cart (best effort).
    $hasCart =
        stripos($contents, 'getShoppingCart(') !== false ||
        stripos($contents, '$_SESSION[\'cart\']') !== false ||
        stripos($contents, '$_SESSION["cart"]') !== false;
    if (!$hasCart) {
        $errors[] = 'placeOrder() should read the cart items (use getShoppingCart() or $_SESSION[cart]).';
    }

    // Must save/store the order.
    if (stripos($contents, 'storeOrder(') === false) {
        $errors[] = 'placeOrder() must store the order using storeOrder().';
    }
}

if ($errors !== []) {
    print 'Exercise 14-2 failed tests.' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'Exercise 14-2 passed all tests.' . PHP_EOL;

