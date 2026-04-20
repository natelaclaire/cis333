<?php
$projectRoot = __DIR__ . '/../starter-files';

$fieldsFile = $projectRoot . '/app/lib/fields.php';

$errors = [];

if (!is_file($fieldsFile)) {
    $errors[] = 'Missing file: app/lib/fields.php';
} else {
    $php = (string) file_get_contents($fieldsFile);
    if (strpos($php, "'subject'") === false && strpos($php, '"subject"') === false) {
        $errors[] = 'contactFields() must include a subject field';
    }
    // Basic checks that rules are present (not strict parsing).
    if (stripos($php, 'minLength') === false || stripos($php, 'maxLength') === false) {
        $errors[] = 'subject field should include minLength and maxLength rules';
    }
    if (stripos($php, "'required'") === false) {
        $errors[] = 'subject field should include required rule';
    }
}

if ($errors !== []) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;

