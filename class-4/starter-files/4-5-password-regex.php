<?php
// Exercise 4-5: Regex Password Check
// Instructions:
// 1) Use the provided regex pattern to set $isStrong with preg_match.
// 2) Set $message to 'strong' when the password is strong and 'weak'
//    otherwise.
//
// Pattern meaning:
// - at least 8 characters
// - at least one lowercase letter
// - at least one uppercase letter
// - at least one digit
// - at least one non-alphanumeric character
//
// Expected output:
// strength: strong

$password = 'Secr3t!9';
$pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z\d]).{8,}$/';

// TODO: Set $isStrong using preg_match and the pattern in $pattern.
$isStrong = false;

// TODO: Set $message based on $isStrong (there are multiple appropriate ways to
// accomplish this - use what makes the most sense to you).
$message = '';

print 'strength: ' . $message . PHP_EOL;
