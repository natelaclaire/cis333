<?php
function displayHomePage(): void
{
    require_once '../templates/homePage.php';
}

function displayContactUs(): void
{
    require_once '../templates/contactUs.php';
}

function displayForm(): void
{
    require_once '../templates/inquiryForm.php';
}

function processForm(): void
{
    $customerName = filter_input(INPUT_POST, 'customerName',
    FILTER_SANITIZE_SPECIAL_CHARS);
    $customerEmail = filter_input(INPUT_POST, 'customerEmail',
        FILTER_SANITIZE_EMAIL);
    $inquiry = filter_input(INPUT_POST, 'inquiry',
        FILTER_SANITIZE_SPECIAL_CHARS);

    $errors = [];
    if (empty($customerName)) {
        $errors[] = 'missing customer name';
    }

    if (empty($customerEmail)) {
        $errors[] = 'missing or invalid customer email';
    }

    if (empty($inquiry)) {
        $errors[] = 'missing inquiry message';
    }

    if (sizeof($errors) > 0) {
    require_once '../templates/displayError.php';
    } else {
        confirmData($customerName, $customerEmail, $inquiry);
    }
}

function confirmData($customerName, $customerEmail, $inquiry): void
{
    require_once '../templates/confirmData.php';
}

