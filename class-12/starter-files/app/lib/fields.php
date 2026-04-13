<?php

require_once __DIR__ . '/functions.php';

function contactFields(): array
{

    return [
        'firstName' => [
            'label' => 'First Name',
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
            'label' => 'Email',
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
        'message' => [
            'label' => 'Message',
            'type' => 'textarea',
            'default' => '',
            'sanitize' => [
                'filter' => FILTER_UNSAFE_RAW,
            ],
            'rules' => [
                'required' => true,
                'minLength' => 10,
                'maxLength' => 2000,
            ],
            'html' => [
                'required' => true,
                'minlength' => 10,
                'maxlength' => 2000,
            ],
        ],
    ];
}

