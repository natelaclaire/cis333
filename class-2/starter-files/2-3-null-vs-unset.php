<?php
// Exercise 2-3: NULL vs. Unset
// Instructions:
// 1) $color is explicitly set to null. $shape is never defined.
// 2) Use isset and is_null to set the variables below.
// 3) The provided output lines should result in the expected output when run.
//
// Expected output:
// colorIsSet: false
// colorIsNull: true
// shapeIsSet: false

$color = null;
// $shape is intentionally unset

// Set these variables using isset and is_null (replace false with the
// appropriate expressions).
$colorIsSet = false;  // TODO
$colorIsNull = false; // TODO
$shapeIsSet = false;  // TODO


// Output the results
echo "colorIsSet: " . ($colorIsSet ? "true" : "false") . PHP_EOL;
echo "colorIsNull: " . ($colorIsNull ? "true" : "false") . PHP_EOL;
echo "shapeIsSet: " . ($shapeIsSet ? "true" : "false") . PHP_EOL;
