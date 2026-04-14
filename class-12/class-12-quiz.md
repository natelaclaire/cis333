---
layout: default
title: "Class 12 Quiz (Composer, Rewriting, YAML, Markdown, and Forms)"
published: true
---

# Class 12 Quiz (Comprehension Check)

Choose the best answer for each question.

## 1) What is Composer primarily used for in PHP projects?

A. Rendering HTML templates  
B. Managing dependencies and autoloading libraries  
C. Running Apache rewrite rules  
D. Storing data in YAML files  

## 2) What is the purpose of `composer.lock`?

A. It stores PHP syntax rules for the project  
B. It records the exact dependency versions installed for reproducible installs  
C. It replaces `composer.json` in production  
D. It is only used when you deploy to Apache  

## 3) What does `vendor/autoload.php` do?

A. It validates form input automatically  
B. It loads every PHP file in your project recursively  
C. It registers Composer’s autoloader so classes from installed packages can be used without manual `require`s  
D. It enables `.htaccess` rules for PHP’s built-in dev server  

## 4) In Apache rewriting, why do we typically include conditions like `!-f` and `!-d`?

A. To force all requests to use HTTPS  
B. To rewrite requests only when the target is not an existing file or directory (so assets still work)  
C. To remove query strings from URLs  
D. To block search engine crawlers  

## 5) What does the `[QSA]` flag do in a rewrite rule?

A. Quotes special characters automatically  
B. Appends the existing query string to the rewritten URL  
C. Disables caching  
D. Forces a 404 when the query string is present  

## 6) Why doesn’t PHP’s built-in dev server (`php -S ...`) behave the same as Apache with `.htaccess` rewrites?

A. PHP’s dev server ignores all query parameters  
B. PHP’s dev server does not process `.htaccess`, so rewrite rules are not applied  
C. Apache cannot serve PHP files  
D. `.htaccess` only works on Windows  

## 7) Which statement best describes YAML in this project?

A. YAML is used to write PHP code more quickly  
B. YAML is used for configuration and metadata, and is parsed into PHP arrays  
C. YAML is the same as Markdown  
D. YAML is used to replace Composer  

## 8) Which statement best describes Markdown in this project?

A. Markdown is a database format  
B. Markdown is plain text content that is converted into HTML using a library  
C. Markdown is required for all PHP pages  
D. Markdown replaces the need for HTML escaping  

## 9) What is the main purpose of a “front controller” in a PHP web application?

A. To replace Composer so dependencies can be installed without `vendor/`  
B. To provide a single entry point that bootstraps the app and routes requests to the correct handler/template  
C. To store site navigation in YAML  
D. To ensure all URLs include `.php`  

## 10) Why should metadata values (like `title` or `description`) be escaped when printed into HTML?

A. Escaping makes pages load faster  
B. Escaping prevents XSS and broken markup if metadata contains special characters  
C. Escaping is only required for numbers  
D. Escaping converts YAML into JSON  

---

## Answer Key

1) B  
2) B  
3) C  
4) B  
5) B  
6) B  
7) B  
8) B  
9) B  
10) B  
