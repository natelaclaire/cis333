<?php
// Autograder: Exercise 13-3 (Nag counter with cookies)
//
// This exercise is intentionally open-ended (cookie names, exact markup).
// Autograding here is "best effort" static analysis.

$projectRoot = __DIR__ . '/../starter-files';
$file = $projectRoot . '/app/views/pages/exercises/13-3-nag-counter.php';

$errors = [];

if (!is_file($file)) {
    $errors[] = 'Missing file: app/views/pages/exercises/13-3-nag-counter.php';
} else {
    $contents = (string) file_get_contents($file);

    if (stripos($contents, 'TODO:') !== false) {
        $errors[] = '13-3-nag-counter.php still contains TODO comments.';
    }

    // Form existence (loose checks).
    foreach ([
        '<form',
        'method',
        'name="name"',
        'name="email"',
    ] as $needle) {
        if (stripos($contents, $needle) === false) {
            $errors[] = '13-3-nag-counter.php should include a registration form with name/email fields (' . $needle . ').';
        }
    }

    // Cookie-based counters + registration cookies.
    if (substr_count(strtolower($contents), 'setcookie') < 2) {
        $errors[] = '13-3-nag-counter.php should set cookies (expected at least 2 setcookie() calls).';
    }
    if (stripos($contents, '$_COOKIE') === false) {
        $errors[] = '13-3-nag-counter.php should read cookies via $_COOKIE.';
    }

    // "Every fifth visit" logic: look for modulo 5.
    $hasModulo5 =
        stripos($contents, '% 5') !== false ||
        preg_match('/%\\s*5/', $contents) === 1;
    if (!$hasModulo5) {
        $errors[] = '13-3-nag-counter.php should show a reminder every 5th visit (look for modulo 5 logic).';
    }

    // Must clear the nag cookie after registration (look for expired cookie write).
    $hasCookieDelete =
        stripos($contents, 'time() -') !== false ||
        stripos($contents, 'time()-') !== false;
    if (!$hasCookieDelete) {
        $errors[] = '13-3-nag-counter.php should delete the nag cookie after registration (expired setcookie()).';
    }
}

if ($errors !== []) {
    print 'Exercise 13-3 failed tests.' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'Exercise 13-3 passed all tests.' . PHP_EOL;

