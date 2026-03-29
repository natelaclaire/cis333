---
layout: default
title: "Class 10 Quiz (Chapter 11: Web Forms)"
published: true
---

# Class 10 Quiz (Chapter 11: Web Forms)

Choose the best answer for each question.

## 1) Which HTTP method is most appropriate for a request that *creates* data on the server?

A. GET  
B. POST  
C. PUT (only)  
D. HEAD  

## 2) In an HTML form, what does the `action` attribute specify?

A. The HTTP method the form uses  
B. The URL that receives the form submission  
C. The list of inputs that will be submitted  
D. The encoding used to store cookies  

## 3) Which statement best describes why inputs need a `name` attribute?

A. Without `name`, the input cannot be styled with CSS  
B. Without `name`, the browser will not submit the input's value as a key/value pair  
C. Without `name`, the input will not appear on the page  
D. Without `name`, the input cannot be typed into  

## 4) In PHP, what is the main benefit of using `filter_input()` to retrieve request data?

A. It automatically escapes values for HTML output  
B. It provides a consistent way to retrieve request values and apply filtering/validation  
C. It stores request values in a database automatically  
D. It prevents all invalid user input without additional code  

## 5) What is typically true about an unchecked checkbox when a form is submitted?

A. The checkbox key is present with value `"0"`  
B. The checkbox key is present with value `false`  
C. The checkbox key is usually missing from the submitted data  
D. The browser sends a special `null` value for the checkbox  

## 6) What does the PRG pattern (Post-Redirect-Get) help prevent?

A. SQL injection  
B. Duplicate form submissions when the user refreshes the page after a POST  
C. DNS spoofing  
D. Images failing to load  

## 7) If a form input looks numeric (like credits), what is a common reason you might still cast it in PHP?

A. The browser always sends form values as strings  
B. Casting is required for `print` to work  
C. HTML forms cannot send numbers at all  
D. PHP cannot compare strings  

## 8) What is the primary purpose of escaping output with `htmlspecialchars()`?

A. To encrypt user data before saving  
B. To compress HTML for faster page loads  
C. To prevent XSS by ensuring user input is treated as text, not markup  
D. To validate that input is a correct email address  

## 9) Which option correctly describes a good use case for GET vs POST?

A. Use POST for search filters so they can be bookmarked  
B. Use GET for actions that delete data  
C. Use GET for safe retrieval/filtering and POST for actions that change server state  
D. Use GET only when a request contains a password  

## 10) What does it mean for a file to be “outside the web root” in a typical PHP project structure?

A. It cannot be executed by PHP at all  
B. It cannot be included with `require`  
C. The web server should not serve it directly as a URL-accessible file  
D. It must be stored on a different computer  

---

## Answer Key

1) B  
2) B  
3) B  
4) B  
5) C  
6) B  
7) A  
8) C  
9) C  
10) C  

