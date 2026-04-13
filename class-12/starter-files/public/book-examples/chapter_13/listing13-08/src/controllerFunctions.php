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

function displayHello($firstName) : void
{
    require_once '../templates/displayHello.php';
}

function displayErrorMessage(): void
{
    $errorMessage = 'invalid - name must contain at least 3 letters';
    require_once '../templates/displayError.php';
}
