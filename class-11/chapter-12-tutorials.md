---
layout: default
title: "Chapter 12 Tutorial Map"
published: true
---

# Chapter 12 Tutorial Map (Class 11)

Chapter 12 in *PHP Crash Course* focuses on validating form data.

This week we will cover the chapter concepts, and we will go beyond the book by also covering:

- sanitization filters available via `filter_input()`
- HTML5 browser-based validation via input types and attributes
- a brief look at JavaScript-based client-side validation (for UX)
- why server-side validation is still required even when client-side validation exists

## High-Level Overview

When a browser submits a form, your PHP code receives **untrusted input**.

To build safe and user-friendly web apps, we typically do three related things:

1. **Retrieve** the request data (prefer `filter_input()` / `filter_input_array()`).
2. **Validate** it (does it meet our rules? required fields, format, ranges, allowed values).
3. **Sanitize + escape** where appropriate:
   - sanitize to normalize/correct input (ex: sanitize an email address)
   - escape on output to prevent XSS (`htmlspecialchars()` in HTML contexts)

We’ll implement these ideas by building a small form generation + validation framework and applying it to a
single real-world form.

## Project: Grant Application Form (Form Builder + Validator)

We will build a small server-rendered app that accepts a "grant application" submission.

Goals:

- generate form fields from a configuration array (one source of truth)
- implement sticky forms and field-level error messages
- validate on the server (always)
- add HTML5 validation attributes for better UX
- optionally enhance the UX with light JavaScript validation (without relying on it)
- persist validated submissions to a `.json` file

Suggested inputs for the grant application:

- applicant name (text, required)
- contact email (email, required; sanitize + validate)
- organization name (text, required)
- requested amount (number/text, required; validate numeric + range)
- project category (select, required; validate in-list)
- project summary (textarea, required; validate min/max length)
- website URL (url, optional; sanitize + validate)
- agrees to terms (checkbox, required)

## References From Prior Term (Holding Folder)

We will draw patterns and examples from:

- `holding/class-8/8.2-form-validation-and-sanitization.md`
- `holding/class-8/8.3-input-filtering.md`

Key ideas we’ll reuse:

- validation vs sanitization distinction
- sticky forms + error arrays
- PHP filter functions (`filter_has_var()`, `filter_input()`, `filter_var()`)
- HTML5 attributes (`required`, `pattern`, etc.) and why they’re helpful but not sufficient

## Planned Tutorial Sequence

1. `11.1` Validation Mindset (trust boundaries, validation vs sanitization vs escaping)
2. `11.2` `filter_input()` Deep Dive (request retrieval + sanitization filters + common return values)
3. `11.3` HTML5 Validation for UX (input types + attributes like `required`, `min`, `max`, `pattern`)
4. `11.4` Designing a Field Spec (one array that describes label/name/type/default/rules/html attrs)
5. `11.5` Rendering Fields (form builder helpers + sticky values + safe output escaping)
6. `11.6` Server-Side Validation Engine (rules, per-field errors, summary errors)
7. `11.7` Sanitization + Normalization (email sanitization, trimming, stripping tags, allowed values)
8. `11.8` PRG + JSON Persistence (save only validated submissions, success page, prevent double submit)
9. `11.9` Client-Side JS Validation (brief overview; progressive enhancement; never your only guardrail)
10. `11.10` Wrap-Up + Common Pitfalls (checkbox presence, validate-int returning 0, double-escaping, etc.)

## Exercises (Planned)

After the tutorials, we’ll create reinforcement exercises that extend the same grant application project:

- add 1–2 new fields with validation rules (in the field spec only)
- add a new sanitization helper using a `FILTER_SANITIZE_*` filter
- add an additional HTML5 attribute (pattern/minlength) and discuss UX
- add a small rule like “requested amount must be a whole number and between X and Y”

We’ll draft the exact exercises after you review the tutorial map.

