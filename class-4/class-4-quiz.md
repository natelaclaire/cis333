# Class 4 Quiz: Conditionals and Logic

## Instructions
Choose the best answer for each question.

1. What does every conditional in PHP evaluate to?
   A. An integer
   B. A string
   C. A boolean
   D. An array

2. Which statement about braces in `if` statements is correct based on PSR-12?
   A. Braces are required by PHP in all cases
   B. Braces are optional for a single statement but should always be used
   C. Braces are optional and should be avoided for readability
   D. Braces are only required with `else`

3. What does this output?
   ```php
   <?php
   $age = 17;
   if ($age >= 18) {
       print 'adult' . PHP_EOL;
   } else {
       print 'minor' . PHP_EOL;
   }
   ?>
   ```
   A. adult
   B. minor
   C. true
   D. false

4. Which operator represents logical AND?
   A. `&&`
   B. `||`
   C. `!`
   D. `xor`

5. Which statement about XOR is correct?
   A. It is true when both sides are true
   B. It is true when both sides are false
   C. It is true when exactly one side is true
   D. It always returns false

6. Why use `switch` instead of `if...elseif`?
   A. `switch` supports range comparisons better
   B. `switch` is ideal for matching a single value to many fixed cases
   C. `switch` is required for boolean expressions
   D. `switch` always runs faster

7. Which statement about `match` is correct?
   A. It allows fall-through behavior
   B. It uses loose comparison (`==`)
   C. It returns a value
   D. It does not support a default case

8. What does the ternary operator do?
   A. Repeats a value three times
   B. Chooses between two values based on a condition
   C. Converts a value to boolean
   D. Checks if a value is null

9. What does the null coalescing operator (`??`) return?
   A. The first operand that is not false
   B. The first operand that is not null
   C. The last operand no matter what
   D. A boolean only

10. Why place a cheap or safe check first in an `&&` expression?
    A. It makes `&&` use loose comparison
    B. It prevents the second condition from ever running
    C. It allows short-circuiting to skip unnecessary work
    D. It converts the result to a string

## Answer Key
1. C
2. B
3. B
4. A
5. C
6. B
7. C
8. B
9. B
10. C
