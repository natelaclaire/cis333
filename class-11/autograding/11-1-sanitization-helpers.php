<?php
$projectRoot = __DIR__ . '/../starter-files/grant-application';
$functionsFile = $projectRoot . '/app/lib/functions.php';

if (!file_exists($functionsFile)) {
    print 'Missing file: app/lib/functions.php' . PHP_EOL;
    exit(1);
}

require_once $functionsFile;

$errors = [];

if (!function_exists('postEmail')) {
    $errors[] = 'Missing function postEmail()';
} else {
    $_POST = ['contactEmail' => ' bob()@exa mple.com '];
    $email = postEmail('contactEmail');
    if ($email !== 'bob@example.com') {
        $errors[] = 'postEmail() must sanitize using FILTER_SANITIZE_EMAIL (expected bob@example.com)';
    }
}

if (!function_exists('postUrl')) {
    $errors[] = 'Missing function postUrl()';
} else {
    $_POST = ['websiteUrl' => ' https://exa mple.com/path?x=1 y=2 '];
    $url = postUrl('websiteUrl');
    if ($url !== 'https://example.com/path?x=1y=2') {
        $errors[] = 'postUrl() must sanitize using FILTER_SANITIZE_URL (expected spaces removed)';
    }
}

if (!empty($errors)) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;
