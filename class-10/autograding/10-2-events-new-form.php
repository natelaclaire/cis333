<?php
$projectRoot = __DIR__ . '/../starter-files/event-directory';
$studentFile = $projectRoot . '/app/views/pages/ex-events-new.php';

if (!file_exists($studentFile)) {
    print 'Missing file: ex-events-new.php' . PHP_EOL;
    exit(1);
}

$_GET = [];
ob_start();
require $studentFile;
$output = ob_get_clean();

$errors = [];

if (!preg_match('/<form[^>]*method\\s*=\\s*\"?post\"?/i', $output)) {
    $errors[] = 'missing POST form (method="post")';
}
if (strpos($output, 'action="/ex/events/create"') === false && strpos($output, "action='/ex/events/create'") === false) {
    $errors[] = 'form action must be /ex/events/create';
}

$requiredPieces = [
    'name="title"' => 'missing text input name="title"',
    'name="contactEmail"' => 'missing email input name="contactEmail"',
    'name="description"' => 'missing textarea name="description"',
    'name="eventDate"' => 'missing date input name="eventDate"',
    'name="category"' => 'missing select name="category"',
    'name="format"' => 'missing radio group name="format"',
    'name="featured"' => 'missing checkbox name="featured"',
    'name="tags[]"' => 'missing checkbox array name="tags[]"',
];

foreach ($requiredPieces as $needle => $message) {
    if (strpos($output, $needle) === false) {
        $errors[] = $message;
    }
}

// Check that students added postEmail() to functions.php and that it sanitizes.
$functionsFile = $projectRoot . '/app/lib/functions.php';
require_once $functionsFile;

if (!function_exists('postEmail')) {
    $errors[] = 'missing function postEmail() in app/lib/functions.php';
} else {
    $_POST = ['contactEmail' => ' bob()@exa mple.com '];
    $sanitized = postEmail('contactEmail');
    if ($sanitized !== 'bob@example.com') {
        $errors[] = 'postEmail() must sanitize using FILTER_SANITIZE_EMAIL (expected bob@example.com)';
    }
}

if (!empty($errors)) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;
