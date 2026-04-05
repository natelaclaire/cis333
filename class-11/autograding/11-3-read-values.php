<?php
$projectRoot = __DIR__ . '/../starter-files/grant-application';

require_once $projectRoot . '/app/lib/fields.php';
require_once $projectRoot . '/app/lib/input.php';

$errors = [];

$fields = grantFields();
if (!is_array($fields) || $fields === []) {
    $errors[] = 'grantFields() must return a spec array before readValues() can be graded';
}

$_SERVER['REQUEST_METHOD'] = 'POST';
$_POST = [
    'applicantName' => '  Ada Lovelace  ',
    'contactEmail' => ' ada()@exa mple.com ',
    'organizationName' => '  Analytical Engines  ',
    'requestedAmount' => ' 1500 ',
    'category' => 'education',
    'projectSummary' => "  Hello world  ",
    'websiteUrl' => ' https://exa mple.com/path?x=1 y=2 ',
    // checkbox
    'agreeToTerms' => '1',
];

$values = readValues($fields);

if (!is_array($values)) {
    $errors[] = 'readValues() must return an array';
} else {
    if (($values['applicantName'] ?? null) !== 'Ada Lovelace') {
        $errors[] = 'applicantName must be trimmed';
    }

    $email = $values['contactEmail'] ?? null;
    if (!is_string($email) || $email !== 'ada@example.com') {
        $errors[] = 'contactEmail must be sanitized (expected ada@example.com)';
    }

    $url = $values['websiteUrl'] ?? null;
    if (!is_string($url) || $url !== 'https://example.com/path?x=1y=2') {
        $errors[] = 'websiteUrl must be sanitized (expected spaces removed)';
    }

    $terms = $values['agreeToTerms'] ?? null;
    if ($terms !== true) {
        $errors[] = 'agreeToTerms must be a boolean true when checkbox is present';
    }
}

if (!empty($errors)) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;

