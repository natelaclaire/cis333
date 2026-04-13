<?php
require_once '../src/controllerFunctions.php';

$action = filter_input(INPUT_GET, 'action');

switch ($action) {
    case 'contactUs':
        displayContactDetails();
        break;

    case 'inquiryForm':
        displayForm();
        break;

    case 'processForm':
        processForm();
        break;

    default:
        displayHomePage();
}
