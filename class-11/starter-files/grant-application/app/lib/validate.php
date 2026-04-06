<?php
// Exercise 11-2: add validation rules for the new fields.

require_once __DIR__ . '/functions.php';

function validateValues(array $fields, array $values): array
{
    $errors = [];
    foreach ($fields as $name => $field) {
        if (!is_string($name) || !is_array($field)) {
            continue;
        }

        $value = $values[$name] ?? '';

        // The empty() function considers the following values to be empty: "", 0, 0.0, "0", null, false, and empty arrays.
        // We're using is_string() here to ensure that we only treat 0-length (after trimming whitespace) strings as empty, since "0" might
        // be a valid value for some fields. The empty() function will then capture empty arrays and boolean false for checkboxes,
        // as arrays and booleans are the only non-string values we'll be processing at this point.
        if (isset($field['rules']['required']) && $field['rules']['required'] && (is_string($value) ? trim($value) === '' : empty($value))) {
            $errors[$name] = 'This field is required.';
            continue;
        }

        if (isset($field['rules']['minLength']) && is_string($value) && strlen($value) < $field['rules']['minLength']) {
            $errors[$name] = 'Must be at least ' . $field['rules']['minLength'] . ' characters.';
            continue;
        }

        if (isset($field['rules']['maxLength']) && is_string($value) && strlen($value) > $field['rules']['maxLength']) {
            $errors[$name] = 'Must be no more than ' . $field['rules']['maxLength'] . ' characters.';
            continue;
        }

        if (isset($field['rules']['email']) && $field['rules']['email'] && is_string($value) && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $errors[$name] = 'Must be a valid email address.';
            continue;
        }

        if (isset($field['rules']['url']) && $field['rules']['url'] && is_string($value) && $value !== '' && !filter_var($value, FILTER_VALIDATE_URL)) {
            $errors[$name] = 'Must be a valid URL.';
            continue;
        }

        if (isset($field['rules']['integer']) && $field['rules']['integer'] && is_string($value) && !filter_var($value, FILTER_VALIDATE_INT)) {
            $errors[$name] = 'Must be an integer.';
            continue;
        }

        if (isset($field['rules']['float']) && $field['rules']['float'] && is_string($value) && !filter_var($value, FILTER_VALIDATE_FLOAT)) {
            $errors[$name] = 'Must be a float.';
            continue;
        }

        // TODO (Exercise 11-2): new min and max rules for date values:
        // - Update the current `min` and `max` rules so that they only apply
        //   to fields with a type of `number`.
        // - Add new `min` and `max` rules that apply only to fields with a
        //   type of `date`, using `strtotime()` to compare the input date
        //   against the specified minimum and maximum dates - they should be
        //   inclusive (`<=` and `>=`) and should be two separate rules. Based
        //   on what you have learned so far, I would use `strtotime()` to convert
        //   both the input date and the min/max dates to timestamps for comparison,
        //   but there are other approaches.
        if (isset($field['rules']['min']) && is_numeric($value) && $value < $field['rules']['min']) {
            $errors[$name] = 'Must be at least ' . $field['rules']['min'] . '.';
            continue;
        }

        if (isset($field['rules']['max']) && is_numeric($value) && $value > $field['rules']['max']) {
            $errors[$name] = 'Must be no more than ' . $field['rules']['max'] . '.';
            continue;
        }

        if (isset($field['rules']['requiredTrue']) && $field['rules']['requiredTrue'] && $value !== true) {
            $errors[$name] = 'You must agree to the terms.';
            continue;
        }

        if (isset($field['rules']['match']) && is_string($field['rules']['match'])) {
            $otherName = $field['rules']['match'];
            $otherValue = $values[$otherName] ?? '';
            if ($value !== $otherValue) {
                $otherLabel = is_string($fields[$otherName]['label'] ?? null) ? $fields[$otherName]['label'] : $otherName;
                $errors[$name] = 'Must match ' . ($field['label'] ?? $otherLabel) . '.';
                continue;
            }
        }

        // TODO (Exercise 11-2): implement validation for the new rules needed for
        // the new fields in the spec:
        // - For the `date` rule, check if the value is a valid date format (you
        //   can use `strtotime()` to attempt to parse the date and check if it
        //   returns a valid timestamp - it returns `false` if the date is invalid
        //   or the number of seconds since the Unix Epoch otherwise).
        // - For the `pattern` rule, use `preg_match()` to check if the value matches
        //   the provided regex pattern.


        $errors[$name] = '';
    }

    return $errors;
}

function hasErrors(array $errors): bool
{
    foreach ($errors as $message) {
        if (is_string($message) && $message !== '') {
            return true;
        }
    }
    return false;
}

