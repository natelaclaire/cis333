<?php
function displayForm(): void
{
    require_once '../templates/displayForm.php';
}


function processForm(): void
{
    $firstName = filter_input(INPUT_POST, 'firstName');

    if (strlen($firstName) < 3) {
        displayErrorMessage();
    } else {
        displayHello($firstName);
    }
}
