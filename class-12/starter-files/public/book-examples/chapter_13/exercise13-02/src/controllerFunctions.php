<?php
function displayHomePage(): void
{
    require_once '../templates/home.php';
}

function displayStaffLogin(): void
{
    require_once '../templates/loginStaff.php';
}

function processStaffLogin(): void
{
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');

    if($username == 'author' && $password == 'words') {
        require_once '../templates/successStaff.php';
    } else {
        require_once '../templates/loginError.php';
    }

}
