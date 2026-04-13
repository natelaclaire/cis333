<?php
// Exercise 11-3 autograder: sanitization choices for the new fields.
//
// Note: `filter_input()` does not populate in PHP CLI, so this autograder checks the spec
// (and expected filter choices) rather than executing readValues().

$projectRoot = __DIR__ . '/../starter-files/grant-application';
$fieldsFile = $projectRoot . '/app/lib/fields.php';

if (!file_exists($fieldsFile)) {
    print 'Missing file: app/lib/fields.php' . PHP_EOL;
    exit(1);
}

require_once $fieldsFile;

$errors = [];

$fields = grantFields();
if (!is_array($fields) || $fields === []) {
    $errors[] = 'grantFields() must return a spec array';
} else {
    foreach (['projectDate', 'phoneNumber'] as $name) {
        $field = $fields[$name] ?? null;
        if (!is_array($field)) {
            $errors[] = "Missing field spec: {$name}";
            continue;
        }

        $sanitize = $field['sanitize']['filter'] ?? null;
        if ($sanitize !== FILTER_SANITIZE_NUMBER_INT) {
            $errors[] = "{$name} sanitize.filter must be FILTER_SANITIZE_NUMBER_INT (as recommended in the exercise)";
        }
    }
}

if ($errors !== []) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;
