---
layout: default
title: "Class 1 Reinforcement Exercises: PHP Basics"
published: true
---

# Class 1 Reinforcement Exercises: PHP Basics

## Exercise 1-1 — PHP Statements, Variables, and Comments

**Concepts**

* PHP statements
* Variables
* Single-line and multi-line comments

### Student task

Create `public/ex01.php` that:

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
print $studentName . " is enrolled in " . $courseName;
```

---

## Exercise 1-2 — Expressions and Operators

**Concepts**

* Arithmetic operators
* Expressions
* Assignment

### Student task

Create `public/ex02.php` that:

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
print $area;
```

---

## Exercise 1-3 — Constants and String Concatenation

**Concepts**

* Constants
* String operators
* Expressions

### Student task

Create `public/ex03.php` that:

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

Create `public/ex04.php` that outputs HTML:

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

Create `public/ex05.php` that:

1. Assigns `$status = "draft"`
2. Has a **commented-out assignment** that would change it to `"published"`
3. Final value of `$status` must still be `"draft"`

### Starter file

```php
<?php
// Set the page status

// Output the status to prove its value is still "draft"
print $status;
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
