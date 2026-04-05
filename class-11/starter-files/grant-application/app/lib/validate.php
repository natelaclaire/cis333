<?php
// Exercise 11-4: validate values using the field spec.

require_once __DIR__ . '/functions.php';

function validateValues(array $fields, array $values): array
{
    // Implement the rule types needed by your spec:
    // - required
    // - minLength / maxLength
    // - email (validate email format)
    // - url (validate URL format if present)
    // - integer (validate integer format)
    // - float (validate float format)
    // - min/max (within a numeric range)
    // - requiredTrue (checkbox must be checked)
    // - match (matches the value of another field, e.g. for confirm email or password)

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

