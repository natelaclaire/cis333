<?php
// Exercise 11-1 autograder: new fields in spec.

$projectRoot = __DIR__ . '/../starter-files/grant-application';
$fieldsFile = $projectRoot . '/app/lib/fields.php';

if (!file_exists($fieldsFile)) {
    print 'Missing file: app/lib/fields.php' . PHP_EOL;
    exit(1);
}

require_once $fieldsFile;

$errors = [];

if (!function_exists('grantFields')) {
    $errors[] = 'Missing function grantFields()';
} else {
    $fields = grantFields();
    if (!is_array($fields) || $fields === []) {
        $errors[] = 'grantFields() must return a non-empty array';
    } else {
        $today = date('Y-m-d');

        // projectDate requirements
        $pd = $fields['projectDate'] ?? null;
        if (!is_array($pd)) {
            $errors[] = 'Missing field spec: projectDate';
        } else {
            if (($pd['label'] ?? null) !== 'Anticipated project initiation date') {
                $errors[] = 'projectDate label must be: Anticipated project initiation date';
            }
            if (($pd['type'] ?? null) !== 'date') {
                $errors[] = 'projectDate type must be date';
            }

            $rules = $pd['rules'] ?? null;
            if (!is_array($rules) || ($rules['required'] ?? null) !== true || ($rules['date'] ?? null) !== true) {
                $errors[] = 'projectDate rules must include required=true and date=true';
            }
            if (!is_array($rules) || ($rules['min'] ?? null) !== $today) {
                $errors[] = 'projectDate rules.min must be today (date(\'Y-m-d\'))';
            }

            $html = $pd['html'] ?? null;
            if (!is_array($html) || ($html['min'] ?? null) !== $today) {
                $errors[] = 'projectDate html.min must be today (date(\'Y-m-d\'))';
            }
        }

        // phoneNumber requirements
        $pn = $fields['phoneNumber'] ?? null;
        if (!is_array($pn)) {
            $errors[] = 'Missing field spec: phoneNumber';
        } else {
            if (($pn['label'] ?? null) !== 'Contact phone number') {
                $errors[] = 'phoneNumber label must be: Contact phone number';
            }
            if (($pn['type'] ?? null) !== 'tel') {
                $errors[] = 'phoneNumber type must be tel';
            }

            $rules = $pn['rules'] ?? null;
            $pattern = is_array($rules) ? ($rules['pattern'] ?? null) : null;
            if (!is_string($pattern) || $pattern === '') {
                $errors[] = 'phoneNumber rules.pattern must be a non-empty regex string';
            } elseif (strpos($pattern, '\\d{3}') === false || strpos($pattern, '-') === false) {
                $errors[] = 'phoneNumber rules.pattern should match a format like \\d{3}-\\d{3}-\\d{4}';
            }

            $html = $pn['html'] ?? null;
            if (!is_array($html) || !is_string($html['pattern'] ?? null) || ($html['pattern'] ?? '') === '') {
                $errors[] = 'phoneNumber html.pattern must be set';
            }
            if (!is_array($html) || !is_string($html['placeholder'] ?? null) || ($html['placeholder'] ?? '') === '') {
                $errors[] = 'phoneNumber html.placeholder must be set (example: 123-456-7890)';
            }
        }
    }
}

if ($errors !== []) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;
