---
layout: default
title: "Class 11 Quiz (Chapter 12: Validating Form Data)"
published: true
---

# Class 11 Quiz (Chapter 12: Validating Form Data)

Choose the best answer for each question.

## 1) Which statement best describes server-side validation?

A. It improves the user experience but is optional if you use HTML5 `required`.  
B. It is required because all client-provided input is untrusted and can be bypassed or forged.  
C. It is only needed when JavaScript is disabled.  
D. It replaces the need for output escaping.  

## 2) What is the main difference between validation and sanitization?

A. Validation removes unwanted characters; sanitization checks rules like “required”.  
B. Validation checks whether input meets rules; sanitization cleans/normalizes input without guaranteeing it is valid.  
C. Validation runs in the browser; sanitization runs on the server.  
D. They are the same thing, just different words.  

## 3) Why is output escaping (e.g., `htmlspecialchars()`) still important even after validation passes?

A. Validation automatically converts HTML to safe entities.  
B. A value can be valid but still contain characters that would be interpreted as HTML/JS in the browser.  
C. Escaping is only needed for passwords.  
D. Escaping prevents SQL injection.  

## 4) What is the main purpose of a “sticky form” in server-side form handling?

A. To prevent XSS by automatically escaping all output  
B. To preserve user input when validation fails so the user doesn’t have to retype everything  
C. To prevent forged requests from reaching the server  
D. To ensure that all fields are optional  

## 5) Which approach best demonstrates the difference between sanitizing an email and validating an email?

A. Sanitize with `FILTER_VALIDATE_EMAIL`, then validate with `FILTER_SANITIZE_EMAIL`  
B. Sanitize with `FILTER_SANITIZE_EMAIL`, then validate with `FILTER_VALIDATE_EMAIL`  
C. Sanitize with `htmlspecialchars()`, then validate with `strip_tags()`  
D. Sanitize with `trim()`, then validate with `strlen()` only  

## 6) Why should you use strict comparison (`=== false`) when checking results from some validation filters like `FILTER_VALIDATE_INT`?

A. Because `filter_input()` always returns a string.  
B. Because `0` can be a valid value but is “falsey” in PHP.  
C. Because strict comparison is faster in all cases.  
D. Because `FILTER_VALIDATE_INT` never returns `false`.  

## 7) What is typically true about unchecked checkboxes in form submissions?

A. They are sent with a value of `"0"`.  
B. They are sent with a value of `false`.  
C. They are usually omitted from the request data entirely.  
D. They cause `filter_input()` to throw an exception.  

## 8) Which HTML5 attribute is most appropriate for enforcing a client-side “must match this regex” constraint?

A. `autocomplete`  
B. `pattern`  
C. `placeholder`  
D. `step`  

## 9) Which statement about client-side validation (HTML5 attributes or JavaScript) is most accurate?

A. Client-side validation is sufficient if you use `type="email"` and `required`.  
B. Client-side validation is mainly for UX; it can be bypassed, so server-side validation must still enforce rules.  
C. Client-side validation prevents malicious requests from reaching the server.  
D. Client-side validation removes the need for sanitization filters.  

## 10) Why should a server validate that a submitted select/radio value is in an allowlist of permitted options?

A. Because HTML option text is encrypted during submission  
B. Because browsers automatically prevent invalid option values from being submitted  
C. Because a client can submit values that were never present in your HTML form  
D. Because allowlists replace the need for output escaping  

---

## Answer Key

1) B  
2) B  
3) B  
4) B  
5) B  
6) B  
7) C  
8) B  
9) B  
10) C  
