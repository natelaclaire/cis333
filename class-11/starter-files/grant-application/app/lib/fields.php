<?php
// Exercise 11-1: add fields to the grant application field spec.
// Exercise 11-3: implement sanitization for the new fields in the spec.

require_once __DIR__ . '/functions.php';

function grantFields(): array
{
    // TODO (Exercise 11-1): add two new fields to the spec:
    // - `projectDate`
    //   - *Label*: Anticipated project initiation date
    //   - *Type*: date
    //   - *Required*: yes
    //   - *Validation*: add a `date` rule to the `rules` array with a
    //     value of `true` to validate that the input is a valid date format
    //     and add a `min` rule with a value of today’s date to ensure the
    //     date is not in the past (use `date('Y-m-d')` in PHP)
    //   - *HTML5 UX*: add `min` attribute to the `html` array set to today’s
    //     date (like above, use `date('Y-m-d')` in PHP)
    // - `phoneNumber`
    //   - *Label*: Contact phone number
    //   - *Type*: tel
    //   - *Required*: no
    //   - *Validation*: add a `pattern` rule for a valid phone number format
    //     (use a regex pattern, such as `\d{3}-\d{3}-\d{4}` for US numbers)
    //   - *HTML5 UX*: Add a `pattern` attribute to the `html` array to help
    //     users enter a valid phone number format (e.g. `\d{3}-\d{3}-\d{4}`
    //     for US numbers)
    //   - *Placeholder*: Add a `placeholder` attribute to the `html` array
    //     to show an example format that matches your pattern (e.g.
    //     `123-456-7890`)

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

    return [
        'applicantName' => [
            'label' => 'Applicant Name',
            'type' => 'text',
            'default' => '',
            'sanitize' => [
                'filter' => FILTER_UNSAFE_RAW,
            ],
            'rules' => [
                'required' => true,
                'minLength' => 2,
                'maxLength' => 80,
            ],
            'html' => [
                'required' => true,
                'minlength' => 2,
                'maxlength' => 80,
                'autocomplete' => 'name',
            ],
        ],
        'contactEmail' => [
            'label' => 'Contact Email',
            'type' => 'email',
            'default' => '',
            'sanitize' => [
                'filter' => FILTER_SANITIZE_EMAIL,
            ],
            'rules' => [
                'required' => true,
                'email' => true,
                'maxLength' => 255,
            ],
            'html' => [
                'required' => true,
                'maxlength' => 255,
                'autocomplete' => 'email',
            ],
        ],
        'organizationName' => [
            'label' => 'Organization Name',
            'type' => 'text',
            'default' => '',
            'sanitize' => [
                'filter' => FILTER_UNSAFE_RAW,
            ],
            'rules' => [
                'required' => true,
                'minLength' => 2,
                'maxLength' => 100,
            ],
            'html' => [
                'required' => true,
                'minlength' => 2,
                'maxlength' => 100,
                'autocomplete' => 'organization',
            ],
        ],
        'requestedAmount' => [
            'label' => 'Requested Amount',
            'type' => 'number',
            'default' => '',
            'prepend' => '$',
            'append' => '.00',
            'sanitize' => [
                'filter' => FILTER_SANITIZE_NUMBER_INT,
            ],
            'rules' => [
                'required' => true,
                'integer' => true,
                'min' => 1000,
                'max' => 1000000,
            ],
            'html' => [
                'required' => true,
                'min' => 1000,
                'max' => 1000000,
                'step' => 1000,
            ],
        ],
        'category' => [
            'label' => 'Category',
            'type' => 'select',
            'default' => '',
            'multiple' => false,
            'options' => [
                'education' => 'Education',
                'health' => 'Health',
                'community' => 'Community',
                'environment' => 'Environment',
                'arts' => 'Arts & Culture',
                'technology' => 'Technology',
                'other' => 'Other',
            ],
            'rules' => [
                'required' => true,
            ],
            'html' => [
                'required' => true,
            ],
        ],
        'projectSummary' => [
            'label' => 'Project Summary',
            'type' => 'textarea',
            'default' => '',
            'sanitize' => [
                'filter' => FILTER_UNSAFE_RAW,
            ],
            'rules' => [
                'required' => true,
                'minLength' => 20,
                'maxLength' => 2000,
            ],
            'html' => [
                'required' => true,
                'minlength' => 20,
                'maxlength' => 2000,
            ],
        ],
        'websiteUrl' => [
            'label' => 'Project Website URL',
            'type' => 'url',
            'default' => '',
            'sanitize' => [
                'filter' => FILTER_SANITIZE_URL,
            ],
            'rules' => [
                'required' => false,
                'url' => true,
                'maxLength' => 255,
            ],
            'html' => [
                'maxlength' => 255,
                'autocomplete' => 'url',
            ],
        ],
        'agreeToTerms' => [
            'label' => 'I agree to the terms and conditions',
            'type' => 'checkbox',
            'default' => false,
            'value' => 'yes',
            'rules' => [
                'requiredTrue' => true,
            ],
            'html' => [
                'required' => true,
            ],
        ],
    ];
}

