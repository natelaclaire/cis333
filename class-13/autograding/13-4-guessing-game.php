<?php
// Autograder: Exercise 13-4 (Guessing game with sessions)
//
// Best-effort static checks; a runtime harness would require HTTP requests
// to validate session/cookie persistence across requests.

$projectRoot = __DIR__ . '/../starter-files';
$file = $projectRoot . '/app/views/pages/exercises/13-4-guessing-game.php';

$errors = [];

if (!is_file($file)) {
    $errors[] = 'Missing file: app/views/pages/exercises/13-4-guessing-game.php';
} else {
    $contents = (string) file_get_contents($file);

    if (stripos($contents, 'TODO:') !== false) {
        $errors[] = '13-4-guessing-game.php still contains TODO comments.';
    }

    foreach ([
        'session_start',
        '$_SESSION',
        '$_SERVER["REQUEST_METHOD"]',
        '<form',
        'method="post"',
    ] as $needle) {
        if (stripos($contents, $needle) === false) {
            $errors[] = '13-4-guessing-game.php must contain: ' . $needle;
        }
    }

    // Random number generation between 0 and 100 (allow rand() or random_int()).
    $hasRandom =
        preg_match('/\\brand\\s*\\(\\s*0\\s*,\\s*100\\s*\\)/i', $contents) === 1 ||
        preg_match('/\\brandom_int\\s*\\(\\s*0\\s*,\\s*100\\s*\\)/i', $contents) === 1;
    if (!$hasRandom) {
        $errors[] = '13-4-guessing-game.php should generate a number between 0 and 100 (rand(0, 100) or random_int(0, 100)).';
    }

    // Query string control (Give Up / Start Over).
    $hasGetHandling =
        stripos($contents, '$_GET') !== false ||
        stripos($contents, 'getString(') !== false;
    if (!$hasGetHandling) {
        $errors[] = '13-4-guessing-game.php should use query string parameters for Give Up / Start Over (use $_GET or getString()).';
    }

    foreach (['Give Up', 'Start Over'] as $label) {
        if (stripos($contents, $label) === false) {
            $errors[] = '13-4-guessing-game.php should include a "' . $label . '" link.';
        }
    }
}

if ($errors !== []) {
    print 'Exercise 13-4 failed tests.' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'Exercise 13-4 passed all tests.' . PHP_EOL;

