<?php
// Exercise 11-3: sanitize the new fields.

require_once __DIR__ . '/functions.php';

function initValuesAndErrors(array $fields): array
{
    $values = [];
    $errors = [];

    foreach ($fields as $name => $field) {
        if (!is_string($name) || !is_array($field)) {
            continue;
        }

        $values[$name] = $field['default'] ?? '';
        $errors[$name] = '';
    }

    return [$values, $errors];
}

function readValues(array $fields): array
{
    foreach ($fields as $name => $field) {
        if (!is_string($name) || !is_array($field)) {
            continue;
        }

        $values[$name] = readValue($name, $field);
    }

    return $values;
}

function readValue(string $name, array $field): string|array|bool
{
    $type = is_string($field['type'] ?? null) ? $field['type'] : 'text';

    if ($type === 'checkbox') {
        // For checkboxes, we want to return a boolean indicating whether the checkbox was checked.
        $value = filter_input(INPUT_POST, $name, FILTER_UNSAFE_RAW);
        return $value === $field['value'] ?? 'yes';
    }

    if ($type === 'checkboxes') {
        // For a group of checkboxes, we want to return an array of the selected values, but only those that are allowed.
        $arr = filter_input(INPUT_POST, $name, FILTER_UNSAFE_RAW, FILTER_REQUIRE_ARRAY);
        $selected = is_array($arr) ? $arr : [];
        $allowed = is_array($field['options'] ?? null) ? array_keys($field['options']) : [];
        return array_values(array_intersect($selected, $allowed));
    }

    if ($type === 'select' || $type === 'radio') {
        // For select/radio fields, we want to ensure the submitted value is one of the allowed options.
        if ($field['multiple'] ?? false) {
            // For a multi-select, we want to return an array of the selected values, but only those that are allowed.
            $arr = filter_input(INPUT_POST, $name, FILTER_UNSAFE_RAW, FILTER_REQUIRE_ARRAY);
            $selected = is_array($arr) ? $arr : [];
            $allowed = is_array($field['options'] ?? null) ? array_keys($field['options']) : [];
            return array_values(array_intersect($selected, $allowed));
        }

        $value = filter_input(INPUT_POST, $name, FILTER_UNSAFE_RAW);
        $allowed = is_array($field['options'] ?? null) ? array_keys($field['options']) : [];
        return in_array($value, $allowed, true) ? $value : '';
    }

    // TODO (Exercise 11-3): implement sanitization for the new fields in the spec:
    // - Apply appropriate sanitization filters to the new fields in the spec so
    //   that they are sanitized when retrieved in `readValues()`. For example:
    //   - For `projectDate`, you could indicate in the spec to sanitize using
    //     `FILTER_SANITIZE_NUMBER_INT` since it's a date field and we can assume
    //     that the browser will only send numeric digits and hyphens, which are
    //     allowed by the filter (the plus sign is allowed as well, but we can
    //     leave it up to validation to handle that).
    //   - For `phoneNumber`, you might also use `FILTER_SANITIZE_NUMBER_INT` if
    //     you are using the US phone number format described above, but if you
    //     choose to allow other formats, you might end up wanting to create
    //     type-specific sanitization logic in the `readValue()` function.

    // For other field types, we will apply sanitization based on the spec and return the sanitized string value.
    $sanitize = $field['sanitize']['filter'] ?? FILTER_UNSAFE_RAW;
    $sanitizeFlags = $field['sanitize']['flags'] ?? 0;
    $value = filter_input(INPUT_POST, $name, $sanitize, $sanitizeFlags);
    return is_string($value) ? trim($value) : '';
}
