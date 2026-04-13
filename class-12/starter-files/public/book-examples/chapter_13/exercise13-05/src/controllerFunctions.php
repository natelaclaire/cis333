<?php
function displayHomePage(): void
{
    require_once '../templates/home.php';
}

function processLogin(): void
{
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');


    if (filter_has_var(INPUT_POST, 'staffButton')) {
        processStaffLogin($username, $password);
    } else {
        processClientLogin($username, $password);
    }

}

function processStaffLogin(string $username, string $password): void
{
    if($username == 'author' && $password == 'words') {
        require_once '../templates/successStaff.php';
    } else {
        require_once '../templates/loginError.php';
    }

}


function processClientLogin(string $username, string $password): void
{
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');

    if($username == 'customer' && $password == 'paying') {
        require_once '../templates/successClient.php';
    } else {
        require_once '../templates/loginError.php';
    }

}
