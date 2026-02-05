<?php
// Exercise 3-2: Concatenation and Interpolation
// Instructions:
// 1) Build $fullName using concatenation with a space between first and last.
// 2) Build $message using interpolation with curly braces so the output
//    reads: Ada Lovelace has 3 items
//
// Expected output:
// fullName: Ada Lovelace
// message: Ada Lovelace has 3 items

$firstName = "Ada";
$lastName = "Lovelace";
$count = 3;

$fullName = "";
$message = "";

// TODO: Build the variables above.


echo "fullName: {$fullName}" . PHP_EOL;
echo "message: {$message}" . PHP_EOL;
