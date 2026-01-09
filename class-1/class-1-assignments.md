---
layout: default
title: "Class 1 Reinforcement Exercises: PHP Basics"
published: true
---

# Class 1 Reinforcement Exercises: PHP Basics

You'll need to have accepted the assignment in Brightspace to access the GitHub repository for these exercises.

After completing each exercise, remember to commit your changes with a meaningful message (such as "Completed exercise 1-1") and push/sync them to GitHub. You will need to provide the URL to your repository in Brightspace for grading.

If you need help with committing and pushing, refer to the 1.1 Intro to GitHub Codespaces video or reach out if that doesn't clarify things.

If you hit a roadblock and need help with any of the exercises, please commit what you have so far with a message like "Partial work on exercise 1-x", push/sync it to GitHub, and reach out for assistance, including the link to your repo.

## Exercise 1-1 — PHP Statements, Variables, and Comments

**Concepts**

* PHP statements
* Variables
* Single-line and multi-line comments

### Student task

Create `public/exercises/1-1-statements.php` that:

1. Defines a variable `$studentName`
2. Defines a variable `$courseName`
3. Uses **at least one comment**
4. Outputs a message like:

```
Ada is enrolled in CIS 333
```

### Starter file (recommended)

```php
<?php
// Define the student and course variables below

// Output the enrollment message
print $studentName . " is enrolled in " . $courseName . "\n";
```

---

## Exercise 1-2 — Expressions and Operators

**Concepts**

* Arithmetic operators
* Expressions
* Assignment

### Student task

Create `public/exercises/1-2-expressions.php` that:

1. Defines two numeric variables: `$width` and `$height`
2. Defines `$area` using a **math expression**
3. `$area` must equal width × height

### Starter file

```php
<?php
// Define width and height (change the values)
$width = 0;
$height = 0;

// Calculate area (add the expression with the proper operator and operands)
$area = 0;

// Output area
print $area . "\n";
```

---

## Exercise 1-3 — Constants and String Concatenation

**Concepts**

* Constants
* String operators
* Expressions

### Student task

Create `public/exercises/1-3-constants.php` that:

1. Defines a constant `SITE_NAME`
2. Defines a variable `$pageTitle`
3. `$pageTitle` must combine some text that you choose and `SITE_NAME` using `.`
4. Outputs `$pageTitle`

Example result:

```
Welcome to My Site
```

### Starter file

```php
<?php
// Define SITE_NAME and pageTitle

// Output pageTitle
```

---

## Exercise 1-4 — PHP Embedded in HTML (Template Text)

**Concepts**

* Switching between HTML and PHP
* Output with `echo`
* Variables inside templates

### Student task

Create `public/exercises/1-4-embedded-html.php` that outputs HTML:

```html
<h1>Welcome</h1>
<p>Hello, Ada!</p>
```

Where the name comes from a PHP variable `$name`.

### Starter file

```php
<?php
$name = "Ada";
?>
<!-- Add HTML output below -->
```

---

## Exercise 1-5 — Comments and Disabled Code

**Concepts**

* Comments for readability
* Commenting out code
* Variable reassignment

### Student task

Create `public/exercises/1-5-comments.php` that:

1. Assigns `$status = "draft"`
2. Has a **commented-out assignment** that would change it to `"published"`
3. Final value of `$status` must still be `"draft"`

### Starter file

```php
<?php
// Set the page status

// Output the status to prove its value is still "draft"
print $status . "\n";
```

---

## What this week reinforces

| Skill                     | Where         |
| ------------------------- | ------------- |
| Running PHP in Codespaces | All exercises |
| Editing files in a repo   | All           |
| Making commits            | All           |
| Variables & constants     | 1, 3          |
| Expressions & operators   | 2, 3          |
| Comments                  | 1, 5          |
| PHP inside HTML           | 4             |
