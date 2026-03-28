---
layout: default
title: "Chapter 11 Tutorial Map"
published: true
---

# Chapter 11 Tutorial Map (Class 10)

Chapter 11 in PHP Crash Course introduces creating and processing web forms.

This week we will cover the chapter by building a small server-rendered CRUD
application that uses HTML forms for creating, editing, and deleting data.

## High-Level Overview

Web forms are the most common way a browser sends structured input to a PHP
application.

Key ideas we will practice:

- GET vs POST (query string vs request body)
- reading request data (`$_GET`, `$_POST`)
- output escaping (prevent XSS)
- PRG (Post-Redirect-Get) to avoid duplicate submissions
- form input types and what they look like in PHP (text, date, radio, checkbox, select)

## Planned Gap (Covered Next Week)

We will intentionally keep validation light this week so we can cover it
properly next week when we work through Chapter 12.

That means:

- We will not do a deep dive on server-side validation patterns yet.
- We will not fully implement "sticky" forms yet (preserving user input and
  displaying field-level errors after validation failures).

We will still talk at a high level about *why* validation and sticky forms
matter, and we will build the app in a way that makes it easy to add them next
week.

## Project: Course Registration Manager (JSON Persistence)

We will build a simple CRUD app that tracks:

- courses (create/edit/delete)
- student registrations for courses (register/remove)

Data is stored in a single JSON file.

We will use Bootstrap for basic styling (via CDN). We will not spend much time
on Bootstrap itself.

### Secure File Structure

We will use the secure structure from Class 9:

- `public/` is the web root
- everything else (partials, helper functions, JSON data file) stays outside the
  web root

Suggested layout:

```text
class-10/course-registration/
  public/
    index.php
    router.php
    assets/
      app.css
  app/
    lib/
      functions.php
      storage.php
    views/
      partials/
        header.php
        footer.php
      pages/
        home.php
        courses-index.php
        courses-new.php
        courses-edit.php
        registrations-index.php
        registrations-new.php
    storage/
      data.json
```

### Data Model (JSON)

We will store two main arrays:

- `courses`
- `registrations`

Example shape:

```json
{
  "courses": [
    {
      "id": "c_001",
      "code": "CIS333",
      "title": "Server-Side Programming",
      "startDate": "2026-03-31",
      "department": "CIS",
      "credits": 3,
      "delivery": "in_person",
      "active": true,
      "meetingDays": ["mon", "wed"]
    }
  ],
  "registrations": [
    {
      "id": "r_001",
      "courseId": "c_001",
      "studentName": "Ada Lovelace",
      "studentEmail": "ada@example.com",
      "birthDate": "2005-12-10",
      "status": "credit",
      "acceptedPolicy": true
    }
  ]
}
```

We will generate IDs in PHP and write changes back to the JSON file with file
locking.

## Planned Tutorial Sequence

1. `10.1` Forms basics + project setup (GET vs POST, action/method, PRG overview)
2. `10.2` JSON persistence layer (read/write JSON safely, LOCK_EX, error handling)
3. `10.3` Course create form (text + date + select + radio + checkbox) + basic processing
4. `10.4` Course list + edit form (prefill values, update JSON)
5. `10.5` Course delete (POST-only delete, confirm, and what to do about existing registrations)
6. `10.6` Registration create form (text + email + date + select + radio + checkbox) + basic processing
7. `10.7` Registration list + remove registration (and filtering by course)
8. `10.8` Handling form "gotchas" (checkboxes, multi-select/arrays, missing keys, type casting)
9. `10.9` Safe rendering of user input (escaping patterns in templates)
10. `10.10` Wrap-up + DevTools form inspection (Form Data / Payload, redirects, caching concerns)

## Class-10 Folder Audit

The previous `class-10/` materials were about file permissions/directories and
an older set of exercises. Those are off-topic for Chapter 11, so they have
been moved to `holding/class-10/`.
