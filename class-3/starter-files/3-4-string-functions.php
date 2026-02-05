<?php
// Exercise 3-4: Core String Functions
// Instructions:
// 1) Use strpos and substr to set $domain to the part after the @.
// 2) Use str_replace to set $masked to "***@example.com".
// 3) Use substr_replace to insert a dash after "CIS" in $courseCode.
//
// Expected output:
// domain: example.com
// masked: ***@example.com
// withDash: CIS-333

$email = "ada@example.com";
$courseCode = "CIS333";

$domain = "";
$masked = "";
$withDash = "";

// TODO: Complete the variables above.


echo "domain: {$domain}" . PHP_EOL;
echo "masked: {$masked}" . PHP_EOL;
echo "withDash: {$withDash}" . PHP_EOL;
