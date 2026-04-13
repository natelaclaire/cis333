<?php
$isGetMethod = ($_SERVER['REQUEST_METHOD'] === 'GET');

if ($isGetMethod) {
    require_once 'displayForm.php';
} else {
    $firstName = filter_input(INPUT_POST, 'firstName');

    if (strlen($firstName) < 3) {
        $errorMessage = 'invalid - name must contain at least letters';
        require_once 'displayError.php';
    } else {
        require_once 'displayHello.php';
    }
}
