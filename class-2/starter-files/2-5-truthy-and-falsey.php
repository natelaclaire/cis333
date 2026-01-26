<?php
// Exercise 2-5: Truthy and Falsey
// Instructions:
// 1) Update the variables below to represent truthy and falsey values (that is, values that
//    evaluate to true or false, respectively, in a boolean context).
// 2) The output lines already defined below should result in the expected output when run.
//
// Expected output:
// bool(true)
// bool(true)
// bool(true)
// bool(true)
// bool(true)
// bool(false)
// bool(false)
// bool(false)
// bool(false)
// bool(false)

// TODO: Change the following variables to represent truthy and falsey values, as indicated.
// $truthy1 and $falsey1 can be left as-is if you want, but the others must be changed and
// the right side of each assignment statement should be different for each line (no repeating!).
// Truthy values
$truthy1 = !false; // not false
$truthy2 = true;
$truthy3 = true;
$truthy4 = true;
$truthy5 = true;

// Falsey values
$falsey1 = !true; // not true
$falsey2 = false;
$falsey3 = false;
$falsey4 = false;
$falsey5 = false;

var_dump((bool)$truthy1);
var_dump((bool)$truthy2);
var_dump((bool)$truthy3);
var_dump((bool)$truthy4);
var_dump((bool)$truthy5);
var_dump((bool)$falsey1);
var_dump((bool)$falsey2);
var_dump((bool)$falsey3);
var_dump((bool)$falsey4);
var_dump((bool)$falsey5);