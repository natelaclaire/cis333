# Chapter 3 Reinforcement Exercises

## Exercise 3-1

In this project, you will create a script that validates whether a credit card number contains only integers. Th  e script will remove dashes and spaces from the string. After the dashes and spaces are removed, the script should reject the credit card number if it contains any other non-numeric characters.

1. Using your Codespace, open the public/exercises/3-1-validate-credit-card.php file in your chapter 3 repository.
2. Add the following statement to the script below the comment on line 27 and above the if block to remove dashes from the card number.

```php
$processedCardNumber = str_replace('-', '', $processedCardNumber);
```

3. Add another statement below the one that you just added. This should be nearly identical to the original statement but should remove spaces from the $processedCardNumber variable.
4. Save and test the file using the PHP CLI Dev Server to confirm that you don't see any error messages and that you do see the correct output:

> 1. This card number is invalid because it contains an empty string.
> 2. Credit Card Number 8910-1234-5678-6543 is a valid Credit Card number.
> 3. Credit Card Number OOOO-9123-4567-0123 is not a valid Credit Card number because it contains a non-numeric character.

## Exercise 3-2

In this project, you will create a script that uses comparison operators and functions to compare two strings to see if they are the same.

1. Using your Codespace, open the public/exercises/3-2-compare-strings.php file in your chapter 3 repository.
2. Add the following code inside the `if` block in the file. If the strings are different, it will compare them using `similar_text()` and `levenshtein()`:

```php
if ($firstString === $secondString) {
    echo '<p>Both strings are the same.</p>';
} else {
    echo '<p>Both strings have ' . 
        similar_text($firstString, $secondString) . 
        ' character(s) in common.<br />';
    echo '<p>You must change ' . 
        levenshtein($firstString, $secondString) . 
        ' character(s) to make the strings the same.<br />';
}
```

3. Save and test the file using the PHP CLI Dev Server to confirm that you don't see any error messages and that you do see the correct output:

> Both strings have 8 character(s) in common.
>
> You must change 3 character(s) to make the strings the same.

## Exercise 3-3

In this project, you will create a script that uses regular expressions to validate that an e-mail address is valid for delivery to a user at example.org. For an e-mail address to be in the correct format, only `username` or `first.last` may appear before the @ symbol, and only `example.org` or `mail.example.org` may appear after the @ symbol.

1. Using your Codespace, open the public/exercises/3-3-validate-local-address.php file in your chapter 3 repository.
2. Replace the comment below the array with the following code, which uses `preg_match()` to check for alignment with the above rules:

```php
foreach ($emailAddresses as $emailAddress) {
    echo "<li>The email address &ldquo;" . $emailAddress .
                "&rdquo; ";
    if (preg_match("/^(([A-Za-z]+\d+)|" .
                "([A-Za-z]+\.[A-Za-z]+))" .
                "@((mail\.)?)example\.org$/i", 
                $emailAddress)==1) {
        echo " is a valid e-mail address.</li>";
    } else {
        echo " is not a valid e-mail address.</li>";
    }
}
```

3. Save and test the file using the PHP CLI Dev Server to confirm that you don't see any error messages and that you do see the correct output:

> The email address “jsmith123@example.org” is a valid e-mail address.
>
> The email address “john.smith.mail@example.org” is not a valid e-mail address.
>
> The email address “john.smith@example.org” is a valid e-mail address.
>
> The email address “john.smith@example” is not a valid e-mail address.
>
> The email address “jsmith123@mail.example.org” is a valid e-mail address.

## Exercise 3-4

A palindrome is a word or phrase that is identical forward or back-ward, such as the word “racecar.” A standard palindrome is similar to a perfect palindrome, except that spaces and punctuation are ignored in a standard palindrome. For example, “Madam, I’m Adam” is a standard palindrome because the characters are identical forward or backward, provided you remove the spaces and punctuation marks. Write a script that checks words or phrases stored in two separate string variables to determine if they are a perfect palindrome. If you feel ambitious, see if you can modify the program to check for standard palindromes. Save the perfect palindrome script as public/exercises/3-4-perfect-palindrome.php and the standard palindrome script as public/exercises/3-4-standard-palindrome.php.

## Exercise 3-5

In this exercise, you will write a PHP program that checks the elements of a string array named `$passwords`, using regular expressions to test whether each element is a strong password.

For this exercise, a strong password must have at least one number, one lowercase letter, one uppercase letter, no spaces, and at least one character that is not a letter or number (Hint: Use the `[^0-9A-Za-z]` character class). It should also be at least 12 characters long.

1. Using your Codespace, open the public/exercises/3-5-password-strength.php file in your chapter 3 repository.
2. Below the `$passwords` array definition, create a loop to iterate over the passwords in the array.
3. Inside the loop, add your logic to test each of the conditions and report to the screen whether the password is secure and, if not, which condition(s) failed.
4. Save and test the file using the PHP CLI Dev Server to confirm that you don't see any error messages and that you do see the expected output.
