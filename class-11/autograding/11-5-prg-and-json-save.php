<?php
$projectRoot = __DIR__ . '/../starter-files/grant-application';

$pageFile = $projectRoot . '/app/views/pages/ex-grant.php';
if (!file_exists($pageFile)) {
    print 'Missing file: app/views/pages/ex-grant.php' . PHP_EOL;
    exit(1);
}

$dataFile = $projectRoot . '/app/storage/data.json';
file_put_contents($dataFile, json_encode(['applications' => []], JSON_PRETTY_PRINT) . PHP_EOL);

// Valid POST should save and redirect.
$_SERVER['REQUEST_METHOD'] = 'POST';
$_GET = [];
$_POST = [
    'applicantName' => 'Ada Lovelace',
    'contactEmail' => ' ada()@exa mple.com ',
    'organizationName' => 'Analytical Engines',
    'requestedAmount' => '1500',
    'category' => 'education',
    'projectSummary' => str_repeat('x', 80),
    'websiteUrl' => ' https://exa mple.com/path?x=1 y=2 ',
    'agreeToTerms' => '1',
];

ob_start();
$result = require $pageFile;
ob_end_clean();

$errors = [];

if ($result !== '/ex/grant?success=1') {
    $errors[] = 'ex-grant.php must return redirectTo(/ex/grant?success=1, 303) for valid POST submissions';
}

$decoded = json_decode((string) file_get_contents($dataFile), true);
$apps = is_array($decoded) ? ($decoded['applications'] ?? null) : null;
if (!is_array($apps) || count($apps) !== 1) {
    $errors[] = 'Valid POST must save exactly 1 application record to data.json';
} else {
    $app = $apps[0];
    if (!is_array($app)) {
        $errors[] = 'Saved application must be an array';
    } else {
        if (!is_string($app['id'] ?? null) || ($app['id'] ?? '') === '') {
            $errors[] = 'Saved application must include a non-empty id';
        }
        if (!is_string($app['createdAt'] ?? null) || ($app['createdAt'] ?? '') === '') {
            $errors[] = 'Saved application must include createdAt';
        }
        if (($app['contactEmail'] ?? null) !== 'ada@example.com') {
            $errors[] = 'Saved contactEmail must be sanitized (expected ada@example.com)';
        }
        if (($app['agreeToTerms'] ?? null) !== true) {
            $errors[] = 'Saved agreeToTerms must be boolean true';
        }
    }
}

// Invalid POST should not save.
file_put_contents($dataFile, json_encode(['applications' => []], JSON_PRETTY_PRINT) . PHP_EOL);
$_SERVER['REQUEST_METHOD'] = 'POST';
$_POST = [
    'applicantName' => '',
    'contactEmail' => 'bad',
    'organizationName' => '',
    'requestedAmount' => 'abc',
    'category' => '',
    'projectSummary' => 'short',
    'websiteUrl' => 'not a url',
    // missing agreeToTerms
];

ob_start();
$result2 = require $pageFile;
ob_end_clean();

$decoded2 = json_decode((string) file_get_contents($dataFile), true);
$apps2 = is_array($decoded2) ? ($decoded2['applications'] ?? null) : null;
if (!is_array($apps2) || count($apps2) !== 0) {
    $errors[] = 'Invalid POST must not save an application record to data.json';
}

if (!empty($errors)) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;

