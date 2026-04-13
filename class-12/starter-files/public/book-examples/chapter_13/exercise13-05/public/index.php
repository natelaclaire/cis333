<?php
require_once '../src/controllerFunctions.php';

$action = filter_input(INPUT_GET, 'action');

switch ($action) {
    case 'processLogin':
        processLogin();
        break;

    case 'home':
    default:
        displayHomePage();
}
