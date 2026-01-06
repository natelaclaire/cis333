# Class 1 Reinforcement Exercises: PHP Basics

## Exercise 1-1 — PHP Statements, Variables, and Comments

**Concepts**

* PHP statements
* Variables
* Single-line and multi-line comments

### Student task

Create `src/ex01.php` that:

1. Defines a variable `$studentName`
2. Defines a variable `$courseName`
3. Uses **at least one comment**
4. Outputs nothing (tests will read variables)

### Starter file (recommended)

```php
<?php
// Define the student and course variables below
```

---

## Exercise 1-2 — Expressions and Operators

**Concepts**

* Arithmetic operators
* Expressions
* Assignment

### Student task

Create `src/ex02.php` that:

1. Defines two numeric variables: `$width` and `$height`
2. Defines `$area` using a **math expression**
3. `$area` must equal width × height

### Starter file

```php
<?php
$width = 0;
$height = 0;
$area = 0;
```

---

## Exercise 1-3 — Constants and String Concatenation

**Concepts**

* Constants
* String operators
* Expressions

### Student task

Create `src/ex03.php` that:

1. Defines a constant `SITE_NAME`
2. Defines a variable `$pageTitle`
3. `$pageTitle` must combine text and `SITE_NAME` using `.`

Example result:

```
Welcome to My Site
```

### Starter file

```php
<?php
// Define SITE_NAME and pageTitle
```

---

## Exercise 1-4 — PHP Embedded in HTML (Template Text)

**Concepts**

* Switching between HTML and PHP
* Output with `echo`
* Variables inside templates

### Student task

Create `src/ex04.php` that outputs HTML:

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

Create `src/ex05.php` that:

1. Assigns `$status = "draft"`
2. Has a **commented-out assignment** that would change it to `"published"`
3. Final value of `$status` must still be `"draft"`

### Starter file

```php
<?php
// Set the page status
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
