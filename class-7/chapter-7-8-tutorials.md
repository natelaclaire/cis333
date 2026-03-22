---
layout: default
title: "Chapters 7-8 Tutorial Map"
published: true
---

# Chapters 7-8 Tutorial Map (Class 7)

For Class 7, we will cover Chapters 7 and 8 (simple and sophisticated
arrays) by building a small PHP web app. The goal is to learn arrays in a
realistic context while staying within what we have covered so far.

## Project: Campus Club Directory (No Forms)

We will build a simple, server-rendered site that displays a directory of
campus clubs and their meeting info.

Constraints for this week:

- No form handling (`$_GET`, `$_POST`) and no user-submitted input.
- All data is stored in PHP arrays (hardcoded).
- Pages are separate PHP files (no routing framework).

What the app will do:

- Show a list of clubs (basic arrays, iteration).
- Show categories and tags (associative arrays).
- Show meeting schedules (multidimensional arrays).
- Support a few curated views: featured clubs, clubs by category, and an
  "upcoming meetings" list (array operations + callbacks).

Suggested file layout (we will build this gradually):

```text
class-7/app/
  index.php
  data.php
  lib/
    functions.php
  partials/
    header.php
    footer.php
  pages/
    featured.php
    categories.php
    schedule.php
```

## Tutorial Sequence

### 7.1 Project Setup + First Simple Array

Chapter coverage:

- Creating an array and accessing its values

Build steps:

- Create `class-7/app/index.php` and output a simple HTML page.
- Add a simple list array like `$clubs = ['Robotics', 'Chess', 'Art'];`.
- Render the list with a loop.

### 7.2 Updating Arrays (Append, Remove Last)

Chapter coverage:

- Appending an element
- Appending multiple elements
- Removing the last element

Build steps:

- Add a "featured clubs" list by appending to an array.
- Demonstrate `[] =` and `array_push()`.
- Demonstrate `array_pop()` in a safe, intentional context.

### 7.3 Array Info and Safe Access Patterns

Chapter coverage:

- Retrieving information about an array

Build steps:

- Use `count()`, `array_key_first()`, `array_key_last()`.
- Discuss undefined-key warnings and checking existence.

### 7.4 `foreach`, Keys/Values, and `implode()`

Chapter coverage:

- Looping through an array with a `for` loop after checking it's a list with `array_is_list()`
- Updating to using a `foreach` loop
- Accessing keys and values
- Imploding an array

Build steps:

- Render navigation links from an array of page definitions.
- Render a comma-separated tag list using `implode()`.

### 7.5 Variable Number of Arguments (Varargs)

Chapter coverage:

- Functions with a variable number of arguments

Build steps:

- Add `class-7/app/lib/functions.php`.
- Create helpers like `htmlList(string ...$items): string` and reuse them on
  multiple pages.

### 7.6 Array Copies vs. References

Chapter coverage:

- Array copies vs. array references

Build steps:

- Show how copying an array behaves when you modify the copy.
- Show how references can cause surprising side effects and when to avoid
  them.

### 7.7 Treating Strings as Arrays of Characters

Chapter coverage:

- Treating strings as arrays of characters

Build steps:

- Create a helper that generates a short club code/initials from a club name
  (for display), using string indexing.

### 7.8 Explicit Keys and Associative Arrays

Chapter 8 coverage:

- Declaring array keys explicitly
- Arrays with strings as keys

Build steps:

- Move club data into an associative array keyed by a stable ID.
- Add a category map like `$categories['technology'] = ['robotics', ...];`.

### 7.9 Multidimensional Arrays + Destructuring

Chapter 8 coverage:

- Multidimensional arrays
- Destructuring an array into multiple variables

Build steps:

- Add meeting schedules as nested arrays (day, time, location).
- Use destructuring (`[$day, $time, $location] = $meeting;`) when iterating.
- Use `vsprintf()` to format a meeting row from an array of values (useful
  when your data is already in an array).

### 7.10 More Operations: Removing, Combining, Comparing

Chapter 8 coverage:

- Removing any element from an array
- Combining and comparing arrays

Build steps:

- Remove clubs or meetings with `unset()` and discuss what happens to keys.
- Combine curated lists with the spread operator (`...`).
- Compare arrays where it makes sense (membership sets, allowed categories).

### 7.11 Callback Functions and Arrays

Chapter 8 coverage:

- Callback functions and arrays

Build steps:

- Use `array_map()` to build derived display data.
- Use `array_filter()` to generate the "featured" and "upcoming" views.
- Use `usort()` with an arrow function to sort meetings by time or clubs by
  name.

## Existing `class-7/` Content

The `class-7/` folder currently contains older-term files (`array-functions.md`
and `chapter-3-discovery-projects.md`). Once we begin writing the new
tutorial scripts, we can move non-relevant items into `holding/class-7/` and
keep only the current-term materials.
