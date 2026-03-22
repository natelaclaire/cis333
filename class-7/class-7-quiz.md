# Class 7 Quiz: Arrays (Chapters 7-8)

## Instructions
Choose the best answer for each question.

1. In PHP, an array is best described as:
   A. A sequence of characters
   B. A mapping of keys to values
   C. A boolean expression
   D. A function return type

2. In a list array, what kind of keys does PHP assign by default?
   A. Random integers
   B. Sequential integers starting at 1
   C. Sequential integers starting at 0
   D. Strings based on the values

3. Which is a common way to append a new value to the end of an array?
   A. `$array += $value;`
   B. `$array[] = $value;`
   C. `$array() = $value;`
   D. `$array->add($value);`

4. Which function removes and returns the last element of an array?
   A. `array_shift()`
   B. `array_pop()`
   C. `array_unshift()`
   D. `array_push()`

5. Which loop is designed specifically for iterating over arrays?
   A. `switch`
   B. `do...while`
   C. `foreach`
   D. `match`

6. What does `implode(', ', $items)` do?
   A. Splits a string into an array
   B. Converts an array into a string with a separator between elements
   C. Sorts an array alphabetically
   D. Removes duplicate values from an array

7. What does a variadic parameter like `function f(string ...$items)` do?
   A. Forces `$items` to be a string
   B. Collects extra arguments into an array
   C. Requires exactly three arguments
   D. Disables type checking

8. Which statement about arrays and references is correct?
   A. Arrays are always passed by reference
   B. Assigning an array to a new variable always creates a reference
   C. A reference (`&`) can cause updates through one variable to affect another
   D. References make arrays immutable

9. What is a multidimensional array?
   A. An array that only stores strings
   B. An array whose elements are themselves arrays
   C. An array with both integers and floats
   D. An array with keys in multiple data types

10. Which statement about callback-based array functions is correct?
    A. `array_map()` transforms elements and returns a new array
    B. `array_filter()` always sorts the array
    C. `usort()` returns a new array and leaves the original unchanged
    D. Callbacks cannot be anonymous functions

## Answer Key
1. B
2. C
3. B
4. B
5. C
6. B
7. B
8. C
9. B
10. A
