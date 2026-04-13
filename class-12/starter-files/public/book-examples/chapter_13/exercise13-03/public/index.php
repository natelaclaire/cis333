<?php
require_once '../src/controllerFunctions.php';

$action = filter_input(INPUT_GET, 'action');

switch ($action) {
    case 'loginStaff':
        displayStaffLogin();
        break;

    case 'processStaffLogin':
        processStaffLogin();
        break;

    case 'loginClient':
        displayClientLogin();
        break;

    case 'processClientLogin':
        processClientLogin();
        break;

    case 'home':
    default:
        displayHomePage();
}
