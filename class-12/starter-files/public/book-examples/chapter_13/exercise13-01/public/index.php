<?php
require_once '../src/controllerFunctions.php';

$action = filter_input(INPUT_GET, 'action');

switch ($action) {
    case 'about':
        displayAbout();
        break;

    case 'contact':
        displayContactDetails();
        break;

    case 'recommendations':
        displayRecommendations();
        break;

    case 'home':
    default:
        displayHomePage();
}
