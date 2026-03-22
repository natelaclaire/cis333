---
layout: default
title: "Chapter 10 Tutorial Map"
published: true
---

# Chapter 10 Tutorial Map (Class 9)

Chapter 10 in PHPCrashCourse introduces client-server communication and the
basic building blocks of web development: HTTP requests and responses, URLs,
query strings, headers, and the idea that the browser is constantly sending
requests and receiving responses.

This week we will cover the chapter by building a small server-rendered PHP web
app and using browser Developer Tools to observe what is happening.

## High-Level Overview

When you write PHP for the web, your code lives on the server. The browser is a
client.

At a high level:

- The browser sends an HTTP request (method + URL + headers + optional body).
- The server runs PHP to generate a response.
- The server sends an HTTP response (status code + headers + body).

The most useful skill in this chapter is learning to *see* this process clearly
using Developer Tools.

## Project: HTTP Playground (No or Simple Forms)

We will build a simple app that lets us explore request/response behavior:

- display request details (method, path, query string)
- display headers
- return different status codes
- demonstrate redirects
- demonstrate caching a remote resource to a local file

Constraints:

- No complex forms.
- If we use a form, keep it very simple (one input + submit).
- No database; any persistence uses the filesystem (like Class 8).

Suggested layout:

```text
class-9/app/
  index.php
  pages/
  partials/
  lib/
  storage/
    cache/
```

## Planned Tutorial Sequence

1. `9.1` Web request/response basics (client vs server, URLs, status codes)
2. `9.2` Using Browser Developer Tools to observe HTTP (Network tab deep dive)
3. `9.3` Query strings and GET requests (building links, reading simple inputs)
4. `9.4` Response headers and status codes in PHP (`header()`, `http_response_code()`)
5. `9.5` Redirects and the PRG idea (when and why redirects are useful) - more on this in CIS 334
6. `9.6` Request data sources overview (`$_SERVER`, `$_GET`, `$_POST`) with a simple form - more on this next week in Class 10 when we cover forms in depth
7. `9.7` Simple routing / single entrypoint (mapping paths to pages), briefly touching on `$_SERVER['REQUEST_URI']` and `parse_url()` as well as MVC - more on this in Class 12
8. `9.8` Project structure and organization with security considerations (public folder with index.php / images / css / js / other necessarily public files, all partials / lib functions / storage for caching above the public folder)
9. `9.9` PHP streams and wrappers (including fetching a URL via `https://`)
10. `9.10` Remote data + caching (save to disk, re-use cached content, basic expiration)

Notes:

- We did not cover PHP stream wrappers last week (Class 8), so we will include
  them here and connect them to web requests by demonstrating reading a web URL
  with a file function.
- The Developer Tools tutorial is essential: it ties the code to what the
  browser and server are actually doing.
- Throughout, we'll be demonstrating using HTML template text in PHP files, including
  both short echo tags and standard PHP tags, and `include`/`require` for partials.

## Planned Reinforcement Exercises (5)

We will create 5 reinforcement exercises that build onto the Class 9 project.
Two of them will be adapted from Chapter 5 reinforcement exercises (same core
idea, updated numbering/paths):

- Exercise `9-?` Remote CSV via streams (`fopen()` + `fgetcsv()`), adapted from Exercise 5-3 in class-10/chapter-5-reinforcement-exercises.md
- Exercise `9-?` Cache generated output to a file and refresh weekly, adapted from Exercise 5-4 in class-10/chapter-5-reinforcement-exercises.md
- Exercise `9-?` A simple page that executes a basic AJAX request and displays the response (using `fetch()` in JavaScript and a simple PHP endpoint that returns JSON). The JavaScript is provided and the student needs to create the PHP endpoint and then observe the behavior.

The remaining exercises will focus on Chapter 10 concepts like request/response
inspection, redirects/status codes, and basic routing.

## Class-9 Folder Audit

The current `class-9/` content is off-topic (from an earlier week). We will
move it into `holding/class-9/` and build new Class 9 materials for Chapter 10.
