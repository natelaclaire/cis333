<?php
$projectRoot = __DIR__ . '/../starter-files/grant-application';

$fieldsFile = $projectRoot . '/app/lib/fields.php';
if (!file_exists($fieldsFile)) {
    print 'Missing file: app/lib/fields.php' . PHP_EOL;
    exit(1);
}

require_once $fieldsFile;

$errors = [];

if (!function_exists('grantFields')) {
    $errors[] = 'Missing function grantFields() in app/lib/fields.php';
} else {
    $fields = grantFields();
    if (!is_array($fields) || $fields === []) {
        $errors[] = 'grantFields() must return a non-empty array';
    } else {
        $requiredNames = [
            'applicantName',
            'contactEmail',
            'organizationName',
            'requestedAmount',
            'category',
            'projectSummary',
            'websiteUrl',
            'agreeToTerms',
        ];

        foreach ($requiredNames as $name) {
            if (!array_key_exists($name, $fields)) {
                $errors[] = "Missing field spec for {$name}";
            }
        }

        $email = $fields['contactEmail'] ?? null;
        if (is_array($email)) {
            $sanitize = $email['sanitize']['filter'] ?? null;
            if ($sanitize !== FILTER_SANITIZE_EMAIL) {
                $errors[] = 'contactEmail sanitize.filter must be FILTER_SANITIZE_EMAIL';
            }
            $rules = $email['rules'] ?? null;
            if (!is_array($rules) || ($rules['required'] ?? null) !== true || ($rules['email'] ?? null) !== true) {
                $errors[] = 'contactEmail rules must include required=true and email=true';
            }
            $html = $email['html'] ?? null;
            if (!is_array($html) || ($html['required'] ?? null) !== true) {
                $errors[] = 'contactEmail html must include required=true';
            }
        }

        $category = $fields['category'] ?? null;
        if (is_array($category)) {
            $options = $category['options'] ?? null;
            if (!is_array($options) || count($options) < 3) {
                $errors[] = 'category options must be an array with at least 3 options';
            }
            $rules = $category['rules'] ?? null;
            $allowed = is_array($rules) ? ($rules['in'] ?? null) : null;
            if (!is_array($allowed) || count($allowed) < 3) {
                $errors[] = 'category rules.in must be an allowlist array with at least 3 values';
            }
        }

        $terms = $fields['agreeToTerms'] ?? null;
        if (is_array($terms)) {
            if (($terms['type'] ?? null) !== 'checkbox') {
                $errors[] = 'agreeToTerms type must be checkbox';
            }
            $rules = $terms['rules'] ?? null;
            if (!is_array($rules) || ($rules['requiredTrue'] ?? null) !== true) {
                $errors[] = 'agreeToTerms rules must include requiredTrue=true';
            }
        }
    }
}

if (!empty($errors)) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;

