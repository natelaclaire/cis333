<?php
// Exercise 5.1: Including Files
// Instructions:
// 1) Add a require_once statement to include 5.1-includes-functions.php.
// 2) Use the __DIR__ constant to build the path.
// 3) Implement fullName() in the functions file.
//
// Expected output:
// fullName: Ada Lovelace

// TODO: Require the functions file here using require_once and __DIR__.

$name = fullName('Ada', 'Lovelace');
print 'fullName: ' . $name . PHP_EOL;

