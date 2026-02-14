<?php
// Exercise 5.4: Variable Scope and Checkout Total
// Instructions:
// 1) Use the global keyword inside calculateTax() to access $taxRate
//    and return the tax amount as subtotal * taxRate.
// 2) Add the logic to calculateShipping() based on the subtotal,
//    where shipping is 0 when subtotal >= 50, otherwise shipping is 5.
// 3) Compute total as: subtotal + tax + shipping. 
//
// Expected output:
// total: 52.70

$taxRate = 0.06;

function calculateTax(float $subtotal): float
{
    // TODO: Use global $taxRate and return the tax amount ($subtotal * $taxRate).

    return 0.00;
}

function calculateShipping(float $subtotal): float
{
    // TODO: Return 0 if subtotal >= 50, otherwise return 5.
    return 0.00;
}

function checkoutTotal(float $subtotal): float
{
    // TODO: Call the calculateTax() and calculateShipping() functions and return the total.
    return 0.0;
}

$subtotal = 45.0;
$total = checkoutTotal($subtotal);

print 'total: ' . number_format($total, 2, '.', '') . PHP_EOL;

