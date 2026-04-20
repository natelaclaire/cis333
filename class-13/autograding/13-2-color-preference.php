<?php
// Autograder: Exercise 13-2 (Color preference cookie)
//
// We primarily use static checks because a typical solution performs
// redirects + exit() in the POST handler (PRG pattern).

$projectRoot = __DIR__ . '/../starter-files';
$file = $projectRoot . '/app/views/pages/exercises/13-2-color-preference.php';

$errors = [];

if (!is_file($file)) {
    $errors[] = 'Missing file: app/views/pages/exercises/13-2-color-preference.php';
} else {
    $contents = (string) file_get_contents($file);

    if (stripos($contents, 'TODO:') !== false) {
        $errors[] = '13-2-color-preference.php still contains TODO comments.';
    }

    foreach ([
        '$_SERVER["REQUEST_METHOD"]',
        'setcookie',
        '"bgcolor"',
        '$_COOKIE',
        '$allowedColors',
        'in_array',
    ] as $needle) {
        if (stripos($contents, $needle) === false) {
            $errors[] = '13-2-color-preference.php must contain: ' . $needle;
        }
    }

    // Expect a sanitize step (either via filter_input or helpers).
    $hasSanitize =
        stripos($contents, 'filter_input') !== false ||
        stripos($contents, 'postString(') !== false;
    if (!$hasSanitize) {
        $errors[] = '13-2-color-preference.php should sanitize the posted color (filter_input() or postString()).';
    }

    // Reset behavior: clear cookie + redirect.
    $hasReset =
        stripos($contents, 'reset') !== false &&
        stripos($contents, 'time() -') !== false;
    if (!$hasReset) {
        $errors[] = '13-2-color-preference.php should support reset (clear cookie by setting an expired cookie).';
    }

    // PRG redirect: ideally 303.
    if (stripos($contents, '303') === false) {
        $errors[] = '13-2-color-preference.php should use a 303 redirect after POST (PRG).';
    }
}

if ($errors !== []) {
    print 'Exercise 13-2 failed tests.' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'Exercise 13-2 passed all tests.' . PHP_EOL;

