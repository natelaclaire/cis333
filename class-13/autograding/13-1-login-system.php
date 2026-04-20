<?php
// Autograder: Exercise 13-1 (Login system with sessions)
//
// Note: We avoid executing student code here because the expected solution
// uses redirects + exit(), which would terminate the autograder in CLI.

$projectRoot = __DIR__ . '/../starter-files';

$loginFile = $projectRoot . '/app/views/pages/exercises/13-1-login.php';
$welcomeFile = $projectRoot . '/app/views/pages/exercises/13-1-welcome.php';
$logoutFile = $projectRoot . '/app/views/pages/exercises/13-1-logout.php';

$errors = [];

function mustBeFile(string $path, array &$errors): void
{
    if (!is_file($path)) {
        $errors[] = 'Missing file: ' . str_replace(__DIR__ . '/../starter-files/', '', $path);
    }
}

function mustContain(string $path, array $needles, array &$errors): void
{
    $contents = is_file($path) ? (string) file_get_contents($path) : '';
    foreach ($needles as $needle) {
        if ($needle === '') {
            continue;
        }
        if (stripos($contents, $needle) === false) {
            $errors[] = basename($path) . ' must contain: ' . $needle;
        }
    }
}

function mustContainAny(string $path, array $needles, string $message, array &$errors): void
{
    $contents = is_file($path) ? (string) file_get_contents($path) : '';
    foreach ($needles as $needle) {
        if ($needle !== '' && stripos($contents, $needle) !== false) {
            return;
        }
    }
    $errors[] = basename($path) . ' ' . $message;
}

function mustNotContain(string $path, array $needles, array &$errors): void
{
    $contents = is_file($path) ? (string) file_get_contents($path) : '';
    foreach ($needles as $needle) {
        if ($needle === '') {
            continue;
        }
        if (stripos($contents, $needle) !== false) {
            $errors[] = basename($path) . ' still contains: ' . $needle;
        }
    }
}

mustBeFile($loginFile, $errors);
mustBeFile($welcomeFile, $errors);
mustBeFile($logoutFile, $errors);

// 13-1-login.php checks
mustContain($loginFile, [
    'session_start',
    'postString(',
    '$users',
    'alex',
    'pass123',
    'jordan',
    'code456',
    '$_SESSION',
    '"username"',
    '/ex/13-1/welcome',
    '303',
    '"flash_error"',
], $errors);

// Strongly prefer escaping output (either helper).
mustContainAny($loginFile, ['htmlspecialchars', 'h('], 'should escape output (htmlspecialchars() or h()).', $errors);

// 13-1-welcome.php checks
mustContain($welcomeFile, [
    'session_start',
    '$_SESSION',
    '"username"',
    '/ex/13-1',
    '303',
    '"flash_error"',
    'Welcome',
    'Logout',
], $errors);

mustContainAny($welcomeFile, ['htmlspecialchars', 'h('], 'should escape output (htmlspecialchars() or h()).', $errors);

// 13-1-logout.php checks
mustContain($logoutFile, ['session_start'], $errors);

// Accept either the provided helper or manual teardown.
$logoutContents = is_file($logoutFile) ? (string) file_get_contents($logoutFile) : '';
if (
    stripos($logoutContents, 'killSession(') === false &&
    stripos($logoutContents, 'session_destroy(') === false
) {
    $errors[] = '13-1-logout.php should end the session (use killSession() or session_destroy()).';
}

if ($errors !== []) {
    print 'Exercise 13-1 failed tests.' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'Exercise 13-1 passed all tests.' . PHP_EOL;
