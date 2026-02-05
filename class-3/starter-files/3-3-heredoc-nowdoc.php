<?php
// Exercise 3-3: Heredoc and Nowdoc
// Instructions:
// 1) Build $heredocMessage using heredoc so it interpolates $name and
//    includes a newline escape sequence between Line 1 and Line 2.
// 2) Build $nowdocMessage using nowdoc so $name and \n are literal.
//
// Expected output:
// heredoc:
// Hello, Ada.
// Line 1
// Line 2
// nowdoc:
// Hello, $name.\nLine 1\nLine 2

$name = "Ada";

$heredocMessage = "";
$nowdocMessage = "";

// TODO: Build the variables above.


echo "heredoc:" . PHP_EOL;
echo $heredocMessage . PHP_EOL;
echo "nowdoc:" . PHP_EOL;
echo $nowdocMessage . PHP_EOL;
