# Chapter 2 Reinforcement Exercises

## Exercise 2-1

In this project, you will create a simple document that contains a conditional operator you will rewrite into an `if . . . else` statement.

1. Using your Codespace, create a new PHP file in the public/exercises folder of your chapter 2 repository named 2-1-conditional-script.php.
2. Copy the HTML structure from basic-page.php and paste it into 2-1-conditional-script.php and then place "Conditional Script" between the opening and closing `<title>` tags to specify that the title of the document is "Conditional Script".
3. Create a script section in the document body that includes the following code, but replace the conditional expression statement with an `if . . . else` statement. Note that the strings are enclosed in single quotation marks so that the name of the variable will be displayed, not the value.

```php
<?php
$intVariable = 75;
($intVariable > 100) ? $result = '$intVariable is greater than 100' : $result = '$intVariable is less than or equal to 100';
echo "<p>$result</p>";
?>
```

4. Save and test the file using the PHP CLI Dev Server to confirm that you don't see any error messages and that you do see the correct message.

## Exercise 2-2

In this project, you will write a `while` statement that displays all odd numbers between 1 and 100 on the screen.

1. Using your Codespace, create a new PHP file in the public/exercises folder of your chapter 2 repository named 2-2-odd-numbers.php.
2. Copy the HTML structure from basic-page.php and paste it into 2-2-odd-numbers.php and update the title of the page to "Odd Numbers".
3. Create a script section in the document body with a `while` statement that displays all odd numbers between 1 and 100 on the screen.
4. Save and test the file using the PHP CLI Dev Server to confirm that you don't see any error messages and that you do see what you expect.

## Exercise 2-3

In this project, you will identify and correct the logic flaws in a `while` statement.

1. Using your Codespace, open the public/exercises/2-3-while-logic.php file in your chapter 2 repository.
2. Examine the PHP code block. It is supposed to fill the array with the numbers 1 through 100 and then display them on the screen. However, the code contains _several_ logic flaws that prevent it from running correctly. Identify and correct all of the logic flaws.
3. Save and test the file using the PHP CLI Dev Server to confirm that you don't see any error messages and that you do see what you expect.

## Exercise 2-4

In this project, you will modify a nested if statement so it instead uses a compound conditional expression. You will use logical operators such as `||` (or) and `&&` (and) to execute a conditional or looping statement based on multiple criteria.

1. Using your Codespace, open the public/exercises/2-4-gas-prices.php file in your chapter 2 repository.
2. Modify the nested `if` statement in the PHP code block so that it uses a single `if` statement with a compound conditional expression. You will need to use the `&&` (and) logical operator.
3. Add an `else` clause to the `if` statement that displays "Gas prices are not between $2.00 and $3.00" if the compound conditional expression returns `false`.
4. Save and test the file using the PHP CLI Dev Server to confirm that you don't see any error messages and that you do see what you expect.
5. Test the script a few times, using different values for the `$gasPrice` variable to ensure that it behaves as expected.

## Exercise 2-5

In this project, you will create header and footer files that you will add to a Web page with the include statement.

1. Using your Codespace, open the public/exercises/2-5-coast-city-computers.php file in your chapter 2 repository.
2. Add `include("header.php");` in place of the comment that reads "header include statement goes here".
3. Using step 2 as an example, add an include statement for footer.php in place of the "footer include statement goes here" comment.
4. Save and test the file using the PHP CLI Dev Server to confirm that you don't see any error messages and that you do see the contents of the header.php and footer.php files appearing where they should.

## Exercise 2-6

You will use an appropriate looping statement to write a script that displays a list of the Celsius equivalents of zero degrees Fahrenheit through 100 degrees Fahrenheit. To convert Fahrenheit to Celsius, subtract 32 from the Fahrenheit temperature, and then multiply the remainder by (5/9). To convert Celsius to Fahrenheit, multiply the Celsius temperature by (9/5), and then add 32. Use the round() function you learned in Chapter 1 to display the Celsius temperature to one place after the decimal point. Save the document as 2-6-temp-conversion.php.
