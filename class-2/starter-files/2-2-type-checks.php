<?php
// Exercise 2-2: Type Checks
// Instructions:
// 1) Use is_numeric to count how many items are numeric and store in $numericCount.
// 2) Use ctype_digit to count how many items are digits only and store in $digitCount.
// 3) The output lines already defined below should result in the
//    expected output when run.
//
// Expected output:
// numeric: 3
// digits: 2

$input1 = "42";
$input2 = "4.2";
$input3 = "42a";
$input4 = "007";

$numericCount = 0;
$digitCount = 0;

// TODO: Use the is_numeric and ctype_digit functions to update the counts
// for each of the inputs above, utilizing the ternary operator, and
// the combined addition assignment operator (+=).
// e.g. $numericCount += is_numeric($input1) ? 1 : 0;



echo "numeric: {$numericCount}" . PHP_EOL;
echo "digits: {$digitCount}" . PHP_EOL;
