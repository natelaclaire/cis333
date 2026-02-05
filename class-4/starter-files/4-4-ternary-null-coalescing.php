<?php
// Exercise 4-4: Ternary and Null Coalescing
// Instructions:
// 1) Use a ternary operator to set $label to 'adult' if $age >= 18,
//    otherwise set it to 'minor'.
// 2) Use null coalescing to set $displayName to $nickname if it is not null,
//    otherwise use $firstName if it is not null, otherwise use 'Guest'.
//
// Expected output:
// label: adult
// displayName: Ada

$age = 20;
$nickname = null;
$firstName = 'Ada';

// TODO: Set $label using a ternary operator.
$label = '';

// TODO: Set $displayName using null coalescing.
$displayName = '';

print 'label: ' . $label . PHP_EOL;
print 'displayName: ' . $displayName . PHP_EOL;
