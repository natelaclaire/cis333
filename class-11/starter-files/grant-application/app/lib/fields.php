<?php
// Exercise 11-2: define the grant application field spec.

require_once __DIR__ . '/functions.php';

function grantFields(): array
{
    // TODO (Exercise 11-2): build and return the full field spec array.
    //
    // Required fields:
    // - applicantName (text, required, min/max length, HTML5 required)
    // - contactEmail (email, required, sanitize email, validate email)
    // - organizationName (text, required)
    // - requestedAmount (text/number, required, validate int range)
    // - category (select, required, allowed values)
    // - projectSummary (textarea, required, min/max length)
    // - websiteUrl (url, optional, sanitize URL, validate URL if present)
    // - agreeToTerms (checkbox, must be checked)
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

