<?php
// Exercise 5.3: Pass-by-Reference
// Instructions:
// 1) Implement normalizeWhitespace() so it modifies $text in place.
// 2) It should trim leading/trailing whitespace and collapse internal
//    whitespace (spaces, tabs, newlines) into a single space (one of our
//    week 3 assignments did this, in case you need a refresher).
//
// Expected output:
// text: Too much space

function normalizeWhitespace(string &$text): void
{
    // TODO: Modify $text in place.
}

$text = "  Too   much\tspace  ";
normalizeWhitespace($text);

print 'text: ' . $text . PHP_EOL;
