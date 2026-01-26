<?php
// Exercise 2-4: Check Type and Cast
// Instructions:
// 1) Populate the $isInteger and $isFloat variables using is_int and is_float.
//    on the $quotient variable.
// 2) Populate the $asInteger and $asFloat variables by casting $quotient to
//    integer and float types respectively.
// 3) The output lines already defined below should result in output similar to the following.
//
// Expected output format (starting value is random and will be different!):
// Number: 25.67
// Is Integer: false
// Is Float: true
// As Integer: 25
// As Float: 25.67

$randDividend = rand(1, 100);
$randDivisor = rand(1, 10);
$quotient = $randDividend / $randDivisor;

// Use is_int and is_float on $quotient to set these variables.
$isInteger = false; // TODO
$isFloat = false; // TODO

// Use casting to set these variables based on $quotient.
$asInteger = 0; // TODO
$asFloat = 0.0; // TODO

echo "Number: " . number_format($quotient, 2, '.', '') . PHP_EOL;
echo "Is Integer: " . ($isInteger ? "true" : "false") . PHP_EOL;
echo "Is Float: " . ($isFloat ? "true" : "false") . PHP_EOL;
echo "As Integer: " . $asInteger . PHP_EOL;
echo "As Float: " . number_format($asFloat, 2, '.', '') . PHP_EOL;
