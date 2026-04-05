<?php
$projectRoot = __DIR__ . '/../starter-files/grant-application';

require_once $projectRoot . '/app/lib/fields.php';
require_once $projectRoot . '/app/lib/validate.php';

$fields = grantFields();

$errors = [];

$values = [
    'applicantName' => '',
    'contactEmail' => 'not-an-email',
    'organizationName' => 'Org',
    'requestedAmount' => '999999',
    'category' => 'not_allowed',
    'projectSummary' => 'short',
    'websiteUrl' => 'not a url',
    'agreeToTerms' => false,
];

$errs = validateValues($fields, $values);
if (!is_array($errs)) {
    $errors[] = 'validateValues() must return an array';
} else {
    $mustError = [
        'applicantName',
        'contactEmail',
        'requestedAmount',
        'category',
        'projectSummary',
        'websiteUrl',
        'agreeToTerms',
    ];
    foreach ($mustError as $name) {
        $msg = $errs[$name] ?? '';
        if (!is_string($msg) || $msg === '') {
            $errors[] = "{$name} must produce a non-empty error message for invalid input";
        }
    }
}

if (!empty($errors)) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;

