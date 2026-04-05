<?php
// Simple rendering helpers used by the grant application project.
//
// Students do not need to edit this file for the exercises, but they can read it.

require_once __DIR__ . '/functions.php';

function renderAttrs(array $attrs): string
{
    $out = [];
    foreach ($attrs as $key => $value) {
        if (!is_string($key) || $key === '') {
            continue;
        }

        if ($value === true) {
            $out[] = h($key);
            continue;
        }

        if ($value === false || $value === null) {
            continue;
        }

        $out[] = h($key) . '="' . h((string) $value) . '"';
    }

    return implode(' ', $out);
}

function renderError(string $name, array $errors): string
{
    $message = $errors[$name] ?? '';
    if (!is_string($message) || $message === '') {
        return '';
    }

    return '<div class="invalid-feedback d-block">' . h($message) . '</div>';
}

function renderField(array $field, string $name, array $values, array $errors): string
{
    $label = is_string($field['label'] ?? null) ? $field['label'] : $name;
    $type = is_string($field['type'] ?? null) ? $field['type'] : 'text';
    $htmlAttrs = is_array($field['html'] ?? null) ? $field['html'] : [];

    $hasError = ($errors[$name] ?? '') !== '';

    $value = $values[$name] ?? ($field['default'] ?? '');

    $out = '';

    if ($type === 'textarea') {
        $attrs = $htmlAttrs;
        $attrs['name'] = $name;
        $attrs['id'] = $name;
        if ($hasError) {
            $attrs['aria-invalid'] = 'true';
        }

        $class = 'form-control' . ($hasError ? ' is-invalid' : '');
        $out .= renderLabel($name, $label);
        $out .= '<textarea class="' . h($class) . '" ' . renderAttrs($attrs) . '>' . h((string) $value) . '</textarea>';
        $out .= renderError($name, $errors);
        return $out;
    }

    if ($type === 'select') {
        $options = is_array($field['options'] ?? null) ? $field['options'] : [];
        $selectedValue = is_string($value) ? $value : '';

        $attrs = $htmlAttrs;
        $attrs['name'] = $name;
        $attrs['id'] = $name;
        $attrs['multiple'] = $field['multiple'] ?? false ? 'multiple' : null;
        if ($hasError) {
            $attrs['aria-invalid'] = 'true';
        }

        $class = 'form-select' . ($hasError ? ' is-invalid' : '');
        $out .= renderLabel($name, $label);
        $out .= '<select class="' . h($class) . '" ' . renderAttrs($attrs) . '>';
        $out .= '<option value="">' . h('-- Choose --') . '</option>';
        foreach ($options as $optValue => $optLabel) {
            if (!is_string($optValue) || !is_string($optLabel)) {
                continue;
            }
            if ($attrs['multiple'] === 'multiple') {
                // For a multi-select, $value is expected to be an array of selected values.
                $selected = is_array($value) && in_array($optValue, $value, true) ? ' selected' : '';
            } else {
                // For a single-select, $value is expected to be a string.
                $selected = ($optValue === $selectedValue) ? ' selected' : '';
            }
            $out .= '<option value="' . h($optValue) . '"' . $selected . '>' . h($optLabel) . '</option>';
        }
        $out .= '</select>';
        $out .= renderError($name, $errors);
        return $out;
    }

    if ($type === 'radio') {
        $options = is_array($field['options'] ?? null) ? $field['options'] : [];
        $selectedValue = is_string($value) ? $value : '';

        $attrs = $htmlAttrs;
        $attrs['name'] = $name;
        if ($hasError) {
            $attrs['aria-invalid'] = 'true';
        }

        $class = 'form-check-input' . ($hasError ? ' is-invalid' : '');
        foreach ($options as $optValue => $optLabel) {
            if (!is_string($optValue) || !is_string($optLabel)) {
                continue;
            }
            $checked = ($optValue === $selectedValue) ? ' checked' : '';
            $out .= '<div class="form-check">';
            $out .= '<input class="' . h($class) . '" type="radio" name="' . h($name) . '" id="' . h($name . '_' . $optValue) . '" value="' . h($optValue) . '"' . $checked . '>';
            $out .= renderLabel($name . '_' . $optValue, $optLabel, ['form-check-label']);
            $out .= '</div>';
        }
        $out .= renderError($name, $errors);
        return $out;
    }

    if ($type === 'checkboxes') {
        $options = is_array($field['options'] ?? null) ? $field['options'] : [];
        $selectedValues = is_array($value) ? $value : [];

        $attrs = $htmlAttrs;
        $attrs['name'] = $name . '[]';
        if ($hasError) {
            $attrs['aria-invalid'] = 'true';
        }

        $class = 'form-check-input' . ($hasError ? ' is-invalid' : '');
        foreach ($options as $optValue => $optLabel) {
            if (!is_string($optValue) || !is_string($optLabel)) {
                continue;
            }
            $checked = in_array($optValue, $selectedValues, true) ? ' checked' : '';
            $out .= '<div class="form-check">';
            $out .= '<input class="' . h($class) . '" type="checkbox" name="' . h($name) . '[]" id="' . h($name . '_' . $optValue) . '" value="' . h($optValue) . '"' . $checked . '>';
            $out .= renderLabel($name . '_' . $optValue, $optLabel, ['form-check-label']);
            $out .= '</div>';
        }
        $out .= renderError($name, $errors);
        return $out;
    }

    if ($type === 'checkbox') {
        $checked = ($value === true || $value === '1' || $value === 1) ? ' checked' : '';

        $attrs = $htmlAttrs;
        $attrs['name'] = $name;
        $attrs['id'] = $name;
        $attrs['type'] = 'checkbox';
        $attrs['value'] = $field['value'] ?? 'yes';

        $class = 'form-check-input' . ($hasError ? ' is-invalid' : '');

        $out .= '<div class="form-check">';
        $out .= renderLabel($name, $label, ['form-check-label']);
        $out .= '<input class="' . h($class) . '" ' . renderAttrs($attrs) . $checked . '>';
        $out .= '</div>';
        $out .= renderError($name, $errors);
        return $out;
    }

    // Default: text-like input
    $stringValue = is_string($value) ? $value : '';

    $attrs = $htmlAttrs;
    $attrs['name'] = $name;
    $attrs['id'] = $name;
    $attrs['type'] = $type;
    $attrs['value'] = $stringValue;
    if ($hasError) {
        $attrs['aria-invalid'] = 'true';
    }

    $prepend = $append = '';

    // For "input group" style fields, we want to wrap the input in a div and add the appropriate classes.
    if (isset($field['prepend']) && is_string($field['prepend'])) {
        $prepend = '<span class="input-group-text">' . h($field['prepend']) . '</span>';
    }

    if (isset($field['append']) && is_string($field['append'])) {
        $append = '<span class="input-group-text">' . h($field['append']) . '</span>';
    }

    $class = 'form-control' . ($hasError ? ' is-invalid' : '');
    $out .= renderLabel($name, $label);
    $out .= '<div class="input-group">';
    $out .= $prepend;
    $out .= '<input class="' . h($class) . '" ' . renderAttrs($attrs) . '>';
    $out .= $append;
    $out .= '</div>';
    $out .= renderError($name, $errors);
    return $out;
}

function renderLabel(string $for, string $text, array $classes = ['form-label']): string
{
    $class = (!empty($classes) ? ' ' . implode(' ', $classes) : '');
    return '<label class="' . h($class) . '" for="' . h($for) . '">' . h($text) . '</label>';
}
