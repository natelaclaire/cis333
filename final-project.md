# Final Project — Open-Ended PHP Web Application

## Overview

For the final project, you will build a **small, interactive PHP web application** that runs in a web browser. The project is intentionally open-ended. You may build a traditional data-driven application **or** an interactive experience such as a web-based game or story.

Your project must demonstrate correct and thoughtful use of the PHP concepts covered in **Chapters 1–16** of the course textbook. No database is required or expected.

---

## Project Options

You may choose **one** of the following approaches:

### Option A: Data-Driven Application (CRUD optional)

Examples:

* Recipe manager
* Movie or book catalog
* Simple inventory tracker
* Contact list

CRUD features (create, update, delete) are **allowed but not required**. A read-only or partially editable application is acceptable as long as it meets the core requirements below.

### Option B: Web-Based Game or Interactive Experience

Examples:

* Chess, checkers, or other turn-based games
* Solitaire or card-style games
* Text-based adventure game
* Choose-your-own-adventure or visual novel
* Quiz or trivia game

Games do **not** need advanced graphics or JavaScript. Turn logic, state tracking, and user interaction may be handled entirely with PHP, HTML, and forms.

---

## Core Requirements (All Projects)

Your project **must** include all of the following:

### 1. Multiple Pages or States

* The application must support more than one screen, view, or state.
* Navigation may use links, forms, or query parameters.

### 2. User Input

* Accept input using HTML forms and PHP (`$_GET`, `$_POST`, or both).
* Validate all user input (required fields, reasonable values, etc.).
* Display helpful error messages when input is invalid.

### 3. Control Structures

* Use conditionals (`if`, `else`, `switch`) to control application behavior.
* Use loops (`for`, `foreach`, `while`) where appropriate.

### 4. Functions

* Define and use your own PHP functions.
* Functions should reduce repetition and improve readability.

### 5. Arrays

* Use arrays to store and manage application data.
* This may include indexed arrays, associative arrays, or nested arrays.

### 6. File Handling

* Read from and/or write to a file so that data or state persists.
* Acceptable formats include text files, CSV, or JSON.
* Examples:

  * Saved game state
  * Story progress
  * High scores
  * Application data records

### 7. Output and Presentation

* Generate HTML output using PHP.
* Use basic HTML and optional CSS for layout and readability.
* The interface should be understandable and usable.

---

## What Is *Not* Required

* No database (MySQL, SQLite, etc.)
* No JavaScript frameworks
* No authentication or user accounts
* No external libraries

---

## Optional Enhancements (Extra Credit)

You may implement additional features for extra credit, such as:

* Editable or deletable records
* Multiple save files or game states
* Difficulty levels or branching logic
* Pagination or filtering
* Limited AJAX (must be discussed with the instructor first)

Extra credit is awarded for **thoughtful design**, not raw complexity.

---

## Submission Requirements

### 1. Code

* All PHP files
* Any data files used by the application
* Optional CSS or image assets

### 2. Documentation (README)

Include a short written explanation covering:

* What your project does
* How to run it
* Which PHP concepts from the course you used
* Any optional or extra-credit features

### 3. Demonstration

* Screenshots **or**
* A short video walkthrough (2–5 minutes)

---

## Grading Rubric

| Criteria                                   | Weight |
| ------------------------------------------ | ------ |
| Meets core requirements                    | 40%    |
| Use of PHP syntax, control flow, functions | 20%    |
| Input validation and file handling         | 15%    |
| Code organization and readability          | 15%    |
| Creativity and overall design              | 10%    |

---

## Learning Goals

By completing this project, you will:

* Apply core PHP concepts in a complete application
* Practice handling user input and application state
* Gain experience reading from and writing to files
* Design a small but functional web application

---

## Learning Outcomes

When planning and completing your project, ensure that it demonstrates your mastery of the course's learning outcomes:

- [ ] Create PHP code blocks
- [ ] Use functions to organize PHP code
- [ ] Learn about variable scope and autoglobal variables
- [ ] Use control structures, nested control structures, and looping structures
- [ ] Construct, parse, and compare text strings and use regular expressions
- [ ] Handle user input from forms and hyperlinks
- [ ] Work with files and directories
- [ ] Manipulate arrays

---

## Example Projects

Students may use these descriptions directly or propose their own project idea that meets the same requirements. All custom project ideas must be approved before development begins.

---

### Example Project 1: Interactive Recipe Explorer

*(Data-driven application, CRUD optional)*

#### Project Description

Create a PHP web application that allows users to explore and manage a collection of recipes. The application focuses on reading, searching, and displaying data. Editing and deleting recipes is optional.

#### Required Features

* Display a list of all recipes
* View the full details of a single recipe
* Search recipes by name or ingredient
* Display a random recipe
* Add new recipes using a form

#### Technical Requirements

* Store recipes in an array while the script runs
* Persist recipes to a file using JSON or CSV
* Validate all form input (no empty fields)
* Use functions to:

  * Load data from a file
  * Save data to a file
  * Search recipes
* Use conditionals to handle missing or invalid input

#### Example Data Fields

* Recipe name
* Number of servings
* Ingredients (comma-separated)
* Instructions

#### Optional Enhancements

* Edit or delete recipes
* Filter by ingredient or serving size
* Show a “featured recipe of the day”

---

### Example Project 2: Choose-Your-Own-Adventure Story

*(Interactive narrative / visual novel)*

#### Project Description

Build a browser-based choose-your-own-adventure story using PHP. The player reads story text and makes choices that affect what happens next.

#### Required Features

* Present story text and choices on each page
* Allow the player to choose between at least two options per scene
* Track the player’s current location in the story
* Allow the player to restart the story at any time

#### Technical Requirements

* Store story nodes and choices in arrays
* Use query parameters or form submissions to track progress
* Use conditionals to determine which scene to show
* Organize repeated logic using functions
* Save the player’s progress to a file so it persists across reloads

#### Example Structure

Each story node might include:

* Scene ID
* Story text
* Available choices
* Next scene IDs for each choice

#### Optional Enhancements

* Multiple endings
* Inventory items that unlock choices
* Simple CSS styling or images
* A “previous choice” history display

---

### Example Project 3: Turn-Based Web Game (Tic-Tac-Toe or Similar)

*(Game logic and state management)*

#### Project Description

Create a simple turn-based web game played entirely in the browser using PHP and HTML forms. Examples include tic-tac-toe, a guessing game, or a simplified board or card game.

#### Required Features

* Display the current game state
* Allow the player to make a move using a form
* Update the game state after each move
* Detect win, loss, or draw conditions
* Allow the player to restart the game

#### Technical Requirements

* Store the game board or state in an array
* Use conditionals to validate moves and check win conditions
* Use loops to display the game board
* Use functions for:
  * Rendering the board
  * Checking game rules
  * Resetting the game
* Save the game state to a file between requests

#### Optional Enhancements

* Two-player mode
* Computer opponent with simple logic
* Score tracking across games
* Difficulty levels
