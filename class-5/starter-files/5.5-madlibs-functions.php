<?php
// Exercise 5.5: Mad Libs (CLI) - Functions
// Instructions:
// - Do not change prompt() or requireNonEmpty().
// - Implement aOrAn() and buildStory() where marked TODO.
//
// Autograding notes:
// - Autograding will call aOrAn() and buildStory() directly with test inputs.
// - Be careful about whitespace and newlines in your returned story string.

function prompt(string $question): string
{
    $input = readline($question);
    if ($input === false) {
        return '';
    }

    return trim($input);
}

function requireNonEmpty(string $question): string
{
    $answer = prompt($question);

    while ($answer === '') {
        print 'Please enter something.' . PHP_EOL;
        $answer = prompt($question);
    }

    return $answer;
}

// TODO: Write a function named aOrAn that takes a word, determines if it
// should be preceded by 'a' or 'an', and returns the correct article as a
// string ('a' or 'an').
//
// Keep it simple: check the first letter for a vowel (a, e, i, o, u).
// Hint: you can use $word[0] to get the first character and strtolower()
// to compare in lowercase.
function aOrAn(string $word): string
{
    return '';
}

// TODO: Write a function named buildStory that takes all the user input
// (studentName, major, adjective, campusPlace, object, verb) and returns a
// full story string.
//
// Use string concatenation and/or interpolation. One possible template is:
// It was [a/an] [adjective] morning on campus.
// [studentName], [a/an] [major] major, was walking toward [campusPlace].
// Suddenly, a mysterious [object] blocked the path.
// Without hesitation, [studentName] decided to [verb].
// By the end of the day, the whole campus was talking about it.
//
// Ensure your returned string ends with a newline.
function buildStory(
    string $studentName,
    string $major,
    string $adjective,
    string $campusPlace,
    string $object,
    string $verb
): string
{
    return '';
}
