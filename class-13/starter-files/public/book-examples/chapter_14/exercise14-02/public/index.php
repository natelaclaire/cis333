<?php
session_start();

$message = '(no guess found in session)';

if (isset($_SESSION['guess'])) {
    $message = 'guess value in session = ' . $_SESSION['guess'];
    $_SESSION['guess'] = rand(1, 10);
} else {
    $_SESSION['guess'] = 0;
}


print $message;