<?php
// Exercise 3-1: String Literals and Escaping
// Instructions:
// 1) Set $path to: C:\temp\files using single quotes.
// 2) Set $quote to: She said, "Hello" using double quotes.
// 3) Set $multiline to a two-line string with Line 1 and Line 2 separated
//    by a newline escape sequence.
//
// Expected output:
// path: C:\temp\files
// quote: She said, "Hello"
// multiline:
// Line 1
// Line 2

$path = "";
$quote = "";
$multiline = "";

// TODO: Set the variables above.


echo "path: {$path}" . PHP_EOL;
echo "quote: {$quote}" . PHP_EOL;
echo "multiline:" . PHP_EOL;
echo $multiline . PHP_EOL;
