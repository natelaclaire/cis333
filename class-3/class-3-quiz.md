# Class 3 Quiz: Strings and Text in PHP

## Instructions
Choose the best answer for each question.

1. Outside of strings, how does PHP treat extra spaces, tabs, and newlines?
   A. It converts them to a single space
   B. It ignores them
   C. It throws a warning
   D. It treats them as part of the value

2. Which statement about whitespace inside strings is correct?
   A. It is removed automatically
   B. It is ignored by default
   C. It becomes part of the string value
   D. It is only kept in heredocs

3. Which escape sequences are recognized inside single-quoted strings?
   A. \n and \t
   B. \" and \$
   C. \\ and \'
   D. \r and \v

4. What does this output?
   ```php
   <?php
   $name = "Ada";
   echo "Hello, $name";
   ?>
   ```
   A. Hello, $name
   B. Hello, Ada
   C. Hello, "Ada"
   D. Hello, $name"

5. Which statement about nowdoc is correct?
   A. It behaves like a double-quoted string
   B. It allows variable interpolation
   C. It processes escape sequences
   D. It treats content literally

6. Which operator concatenates strings in PHP?
   A. `+`
   B. `.`
   C. `*`
   D. `&`

7. Which function finds the position of a substring?
   A. `str_find()`
   B. `strpos()`
   C. `substr()`
   D. `strstr()`

8. Why should you use strict comparison with `strpos`?
   A. It returns floats
   B. It can return 0 for a match at the start
   C. It can return negative numbers
   D. It returns true or false only

9. Which function is multibyte-safe for measuring length?
   A. `strlen()`
   B. `mb_strlen()`
   C. `str_count()`
   D. `count_chars()`

10. Which PREG function replaces matches in a string?
    A. `preg_match()`
    B. `preg_split()`
    C. `preg_replace()`
    D. `preg_grep()`

## Answer Key
1. B
2. C
3. C
4. B
5. D
6. B
7. B
8. B
9. B
10. C
