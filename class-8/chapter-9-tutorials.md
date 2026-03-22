---
layout: default
title: "Chapter 9 Tutorial Map"
published: true
---

# Chapter 9 Tutorial Map (Class 8)

Chapter 9 in PHPCrashCourse covers working with files and directories:
reading/writing files, ensuring files and directories exist, processing
multiple files, and working with formats like JSON.

This week we will cover the chapter by building a small file-based web app.

## High-Level Overview: Why Files and Folders Matter in PHP

In many real-world PHP applications, the filesystem is part of your
application's "toolbox" for persistence and organization.

Common reasons you might work with files and directories:

- Data storage without a database (small apps, prototypes, or simple content)
- Configuration files (for example JSON files that store settings)
- Logging and debugging output (writing activity or error logs)
- Caching (saving expensive-to-compute results to disk for reuse)
- Import/export (reading and writing CSV/JSON/text files)

Working with the filesystem also introduces new responsibilities:

- Paths must be handled safely (avoid path traversal and accidental overwrites)
- File operations can fail (permissions, missing files, locked files), so you
  need to check return values and handle errors
- Apps should use predictable paths (often based on `__DIR__`) rather than
  relying on the current working directory

## Project: File-Based Notes Library (No or Simple Forms)

We will build a server-rendered app that reads and writes notes stored on
disk. Notes will be plain text files (and later JSON for metadata).

Constraints:

- No complex forms.
- If we use a form, keep it very simple (single textarea + submit).
- No database; persistence is the filesystem.
- Validate any requested note IDs against a known allowlist to avoid path
  traversal bugs.

Suggested layout:

```text
class-8/app/
  index.php
  lib/
    functions.php
  storage/
    notes/
```

## Planned Tutorial Sequence

1. `8.1` Project setup + reading a file into a string (`file_get_contents`)
2. `8.2` File and directory existence checks (`file_exists`, `is_file`, `is_dir`, `mkdir`, `touch`)
3. `8.3` Writing text notes (`file_put_contents`, append vs overwrite)
4. `8.4` Managing files and directories (`rename`, `copy`, `unlink`, `rmdir`)
5. `8.5` Reading a file into an array (`file()` and line processing)
6. `8.6` Lower-level file functions (`fopen`, `fwrite`, `fread`, `fclose`)
7. `8.7` Processing multiple files (`glob`, `scandir`, filtering by extension)
8. `8.8` JSON notes metadata (`json_encode`, `json_decode`, read/write JSON files)
9. `8.9` Safety and path handling (`__DIR__`, `basename`, `realpath`, allowlists)

## Class-8 Folder Audit (Prior Term Content)

The current `class-8/` scripts are about superglobals, form validation, input
filtering, and sending email, which are off-topic for Chapter 9. We will
move them into `holding/class-8/` and start fresh for this week.
