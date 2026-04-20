<?php
session_start();
$message = '(no username found in session)';

if (isset($_SESSION['username'])) {
    $message = 'username value in session = ' . $_SESSION['username'];
}

$_SESSION['username'] = 'matt';

print $message;
