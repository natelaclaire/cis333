# Chapter 4 Reinforcement Exercises

## Exercise 4-1

In this exercise, you'll create a PHP script that helps in creating "Jumble" puzzles. You'll create a sticky form that has four input fields labeled "Word 1," "Word 2," Word 3," and "Word 4," as well as "Reset" and "Submit" buttons. The script will verify that all four words are entered, that all of them contain only letters, and that all four are between 4 and 7 characters long. Once all of the words have been verified as correct, you'll use the `strtoupper()` and `str_shuffle()` functions to produce four jumbled sets of letters.

1. Using your Codespace, open the public/exercises/4-1-jumble-maker.php file in your chapter 4 repository.
2. Find the comment "declare arrays" and paste the following immediately below it:

```php
$words = ['', '', '', ''];
$jumbledWords = [];
$errors = [];
```

3. Call the `strtoupper()` and `str_shuffle()` functions inside the `jumbleWord()` function to upper-case and shuffle the characters in the `$word` variable.
4. Call the `trim()` and `strip_tags()` functions inside the `sanitizeWord()` function to remove leading and following whitespace as well as HTML tags, PHP tags, and HTML comments.
5. Inside the `outputWords()` function, in the `foreach` loop, echo opening and closing `<li>` tags to create a list item. The list item should include both the `$word` and `$jumbledWords[$key]` variables separated by `': '`.
6. Inside the `outputErrors()` function, echo opening and closing `<ul>` tags to create an unordered list. Between the tags, use a `foreach` loop to iterate through the `$errors` array, echoing each error as a list item. Each item should have red, bold type.
7. Save and test the file using the PHP Dev Server to ensure that you don't see errors and that it runs as expected. Try with several different combinations of words, checking words that are missing, too long, too short, and just right.

## Exercise 4-2

In this project, you will create a script that builds on top of the temperature conversion that you performed in Reinforcement Exercise 2-6 by accepting the Fahrenheit values via a Web form. The form will accept multiple Fahrenheit values separated by commas, which you will break apart and convert individually using either the `strtok()` or `explode()` function that we learned about in chapter 3. You will use the `filter_var()` function with the `FILTER_VALIDATE_INT` filter to ensure that the numbers entered are integers between 0 and 212. Note that the `FILTER_VALIDATE_INT` filter automatically applies `trim()` before validation, so "100,120" and "100, 120" and "100 , 120" will all be valid inputs. You will then output the Fahrenheit and Celsius values. If a value entered is invalid (not an integer or outside of the range), you will not attempt the Fahrenheit to Celsius conversion but will instead output the value entered along with something like "is not a number or is outside of the range 0-212°F" and ensure that the non-numeric value is properly sanitized using `strip_tags()` and either `htmlentities()` or `htmlspecialchars()`.

1. Using your Codespace, open the public/exercises/4-2-temperature-conversion.php file in your chapter 4 repository.
2. Note that the PHP code block is inside an ordered list (`<ol>`), so you will need to output list items (`<li>`), which will form a numbered list.
3. Add an `if` block that will only execute if `$_SERVER["REQUEST_METHOD"] == "POST"`.
4. Inside the `if` block, use `isset()` to ensure that the `$_POST` array contains a `temps` key.
5. Use either `strtok()` or `explode()` (see videos 6.11 and 6.12 from week 6) and the appropriate looping structure to split the value of `$_POST['temps']` by commas and process each comma-separated value individually.
6. Use `filter_var()` with the `FILTER_VALIDATE_INT` filter to validate that each value is an integer in the range of 0-212. Remember that, by default, `filter_var()` with the `FILTER_VALIDATE_INT` filter will return `false` if the value is invalid but 0 is a valid value in our range. Therefore, in order to check to see if an invalid value was supplied, you'll need to use the strict (type-safe) equality operator (`===`) and compare to `false` (or use `!== false` to check if it's valid).
7. If the value was invalid, output a list item that includes the value entered, sanitized using `strip_tags()` and either `htmlentities()` or `htmlspecialchars()`, along with a message indicating that the value was not an integer or out of range.
8. If the value was valid, perform the conversion from Fahrenheit to Celsius (as defined in Reinforcement Exercise 2-6) and output a list item indicating both the Fahrenheit and Celsius values.
9. Save and test the file using the PHP CLI Dev Server to confirm that you don't see any error messages and that you do see the correct output. Make sure that you test it using values above the range, below the range, in the range, and non-numeric values.

## Exercise 4-3

Create an include file to assist with debugging Web forms. The include file should create a table to display the contents of the `$_REQUEST` superglobal. The table will have two columns showing each name/value pair. Use the advanced `foreach` statement syntax to retrieve the index and value of each element of the `$_REQUEST` array. Be sure to use the `strip_tags()` and `htmlentities()` functions before displaying the text in the Web page. Save the document as public/exercises/4-3-request-dump-inc.php in your chapter 4 repository. Create a second document to test the include file and save it as public/exercises/4-3-request-dump-test.php. The 4-3-request-dump-test.php file should include the 4-3-request-dump-inc.php and include some HTML that will cause the `$_REQUEST` superglobal to be populated. For example, it could include a form or some links that include URL parameters.

## Exercise 4-4

Create a form that calculates an employee’s weekly gross salary, based on the number of hours worked and an hourly wage that you choose. The form and logic should be in a PHP document named 4-4-paycheck.php in the public/exercises folder of the chapter 4 Git repository. The form should contain two text boxes—one for the number of hours worked and one for the hourly wage. Upon submission, output the numbers entered and the total gross salary. Compute any hours over 40 as time-and-a-half. Be sure to verify, validate, and sanitize the submitted form data and provide appropriate error messages for invalid values.

## Exercise 4-5

Create a sticky form to solve the common “two trains are moving toward each other” word problem. The form should have three inputs, all numbers greater than 0: the speed of Train A (`$speedA`), the speed of Train B (`$speedB`), and the distance between the two trains (`$distance`). For this problem, you will need the following equations:

```php
$distanceA = (($speedA / $speedB) * $distance) / (1 + ($speedA / $speedB));
$distanceB = $distance - $distanceA;
$timeA = $distanceA / $speedA;
$timeB = $distanceB / $speedB;
```

In the preceding equations, `$distanceA` and `$distanceB` are the distances traveled by Trains A and B, respectively; `$timeA` and `$timeB` are how long Trains A and B traveled, respectively (`$timeA` should equal `$TimeB`). If `$speedA` or `$speedB` is allowed to be 0, PHP will display a “division by zero not allowed” error.

Save the document as public/exercises/4-5-two-trains.php in your chapter 4 repository.

## Exercise 4-6 (optional - extra credit)

In this optional exercise for extra credit, you will create a form that accepts a list of passwords in a `<textarea>` with each password on a new line (in other words, they are separated by `\n`). This is similar to exercise 3-5, but the rules are slightly different and you'll be accepting the passwords from a form instead of hard-coding them in an array in your code.

You will process each password entered as follows:

1. You will use `preg_replace()` to remove any whitespace characters (`\s`), any single quotes (`'`), any double quotes (`"`), any less than signs (`<`), and any greater than signs (`>`).
2. You will use `preg_match()` with the pattern `/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{12,}$/`  (which is based on [the pattern provided at the end of this blog post](https://www.coding.academy/blog/how-to-use-regular-expressions-to-check-password-strength)) to inform the user that the password is invalid if it does not contain at least 12 characters, including one lower-case letter, one capital letter, one number, and one of a set of special characters.
3. You will use `htmlentities()` to output the result of #1 and the status from #2.

Save the document as public/exercises/4-6-password-strength.php in your chapter 4 repository.
