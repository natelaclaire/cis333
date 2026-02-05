<?php
// Exercise 3-5: Multibyte and Regex Basics
// Instructions:
// 1) Use mb_strlen to set $charCount to the number of characters in $word.
// 2) Use preg_replace to collapse whitespace in $messy into single spaces.
// 3) Use preg_match with a case-insensitive pattern to set $hasPhp to true
//    if $sentence contains "php".
//
// Expected output:
// multi-byte-safe char count: 5
// char count from strlen(): 6
// clean: Too much space
// hasPhp: true

$word = "na\u{00EF}ve";
$messy = "Too   much\tspace";
$sentence = "PHP is fun";

$charCount = 0;
$clean = "";
$hasPhp = false;

// TODO: Complete the variables above.


echo "multi-byte-safe char count: {$charCount}" . PHP_EOL;
echo "char count from strlen(): " . strlen($word) . PHP_EOL;
echo "clean: {$clean}" . PHP_EOL;
echo "hasPhp: " . ($hasPhp ? "true" : "false") . PHP_EOL;
