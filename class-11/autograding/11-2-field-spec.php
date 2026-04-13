<?php
// Exercise 11-2 autograder: new validation rules (date, pattern, min/max behavior).

$projectRoot = __DIR__ . '/../starter-files/grant-application';
$validateFile = $projectRoot . '/app/lib/validate.php';

if (!file_exists($validateFile)) {
    print 'Missing file: app/lib/validate.php' . PHP_EOL;
    exit(1);
}

require_once $validateFile;

$errors = [];

if (!function_exists('validateValues')) {
    $errors[] = 'Missing function validateValues()';
} else {
    $today = date('Y-m-d');

    // Date rule + date min/max rules (inclusive)
    $fields = [
        'projectDate' => [
            'label' => 'Project date',
            'type' => 'date',
            'rules' => [
                'required' => true,
                'date' => true,
                'min' => $today,
                'max' => $today, // for inclusive check, we'll vary value
            ],
        ],
    ];

    // Invalid date should error on date rule.
    $errs = validateValues($fields, ['projectDate' => '2026-13-40']);
    if (($errs['projectDate'] ?? '') === '') {
        $errors[] = 'date rule must reject invalid date strings';
    }

    // Date min inclusive: value == min should be ok.
    $fields['projectDate']['rules']['max'] = $today;
    $errs = validateValues($fields, ['projectDate' => $today]);
    if (($errs['projectDate'] ?? '') !== '') {
        $errors[] = 'date min/max rules must be inclusive (value equal to min/max should be valid)';
    }

    // Date min: yesterday should error.
    $yesterday = date('Y-m-d', strtotime('-1 day'));
    $fields['projectDate']['rules']['max'] = date('Y-m-d', strtotime('+30 day'));
    $errs = validateValues($fields, ['projectDate' => $yesterday]);
    if (($errs['projectDate'] ?? '') === '') {
        $errors[] = 'date min rule must reject dates before the minimum';
    }

    // Date max: after max should error.
    $afterMax = date('Y-m-d', strtotime('+40 day'));
    $fields['projectDate']['rules']['max'] = date('Y-m-d', strtotime('+30 day'));
    $errs = validateValues($fields, ['projectDate' => $afterMax]);
    if (($errs['projectDate'] ?? '') === '') {
        $errors[] = 'date max rule must reject dates after the maximum';
    }

    // Pattern rule
    $fields2 = [
        'phoneNumber' => [
            'label' => 'Phone',
            'type' => 'tel',
            'rules' => [
                'required' => false,
                'pattern' => '/^\\d{3}-\\d{3}-\\d{4}$/',
            ],
        ],
    ];

    $errs = validateValues($fields2, ['phoneNumber' => '1234567890']);
    if (($errs['phoneNumber'] ?? '') === '') {
        $errors[] = 'pattern rule must reject values that do not match the regex';
    }
    $errs = validateValues($fields2, ['phoneNumber' => '123-456-7890']);
    if (($errs['phoneNumber'] ?? '') !== '') {
        $errors[] = 'pattern rule must accept values that match the regex';
    }
    $errs = validateValues($fields2, ['phoneNumber' => '']);
    if (($errs['phoneNumber'] ?? '') !== '') {
        $errors[] = 'pattern rule should not trigger for optional empty values';
    }

    // Min/max rules apply only to number fields
    $fields3 = [
        'amount' => [
            'label' => 'Amount',
            'type' => 'number',
            'rules' => [
                'min' => 10,
                'max' => 20,
            ],
        ],
        'notNumber' => [
            'label' => 'Not number',
            'type' => 'text',
            'rules' => [
                'min' => 10,
                'max' => 20,
            ],
        ],
    ];

    $errs = validateValues($fields3, ['amount' => '5', 'notNumber' => '5']);
    if (($errs['amount'] ?? '') === '') {
        $errors[] = 'min rule must apply to number fields';
    }
    if (($errs['notNumber'] ?? '') !== '') {
        $errors[] = 'min/max rules must not apply to non-number fields';
    }
}

if ($errors !== []) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;
