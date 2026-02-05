<?php
// Exercise 4-2: Logical Operators
// Instructions:
// 1) Set $eligible to true when the cart total is at least 50 and the user
//    is a member, OR when the user has a coupon.
// 2) Use && and || to build the condition.
//
// Expected output:
// eligible: true

$isMember = true;
$hasCoupon = false;
$cartTotal = 55;

// TODO: Set $eligible using logical operators.
$eligible = false;

print 'eligible: ' . ($eligible ? 'true' : 'false') . PHP_EOL;
