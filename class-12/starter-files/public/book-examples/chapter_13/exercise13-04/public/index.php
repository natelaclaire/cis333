<?php
require_once '../src/controllerFunctions.php';

$action = filter_input(INPUT_GET, 'action');

switch ($action) {
    case 'processStaffLogin':
        processStaffLogin();
        break;

    case 'processClientLogin':
        processClientLogin();
        break;

    case 'home':
    default:
        displayHomePage();
}
