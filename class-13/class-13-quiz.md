---
layout: default
title: "Class 13 Quiz (State, Cookies, and Sessions)"
published: true
---

# Class 13 Quiz (Comprehension Check)

Choose the best answer for each question.

## 1) Why do we say HTTP is “stateless”?

A. The server cannot generate HTML  
B. Each request is independent unless we add a state mechanism (cookies, sessions, etc.)  
C. Browsers cannot send headers  
D. PHP cannot read query strings  

## 2) Which statement best describes a cookie?

A. A server-side file that stores user data between requests  
B. A client-side key/value that the browser stores and sends back to the server on later requests  
C. A PHP variable that persists automatically after the script ends  
D. A database row created by `session_start()`  

## 3) In a typical PHP session, what ties a browser to a server-side session record?

A. The user agent string  
B. A session id, usually stored in a cookie  
C. The IP address always uniquely identifies the user  
D. A hidden `<input>` field automatically added to all forms  

## 4) Why does `setcookie()` usually need to be called before you print any HTML?

A. Cookies only work on Fridays  
B. Cookies are part of the HTTP response headers, which must be sent before the response body  
C. `setcookie()` can only be used in `functions.php`  
D. `setcookie()` only works for GET requests  

## 5) Which cookie flag is most directly intended to reduce the risk of JavaScript reading a cookie (mitigating some XSS impact)?

A. `HttpOnly`  
B. `Path`  
C. `Expires`  
D. `Domain`  

## 6) What is the main purpose of the Post/Redirect/Get (PRG) pattern after handling a form submission?

A. To make GET requests faster  
B. To prevent accidental form resubmission when the user refreshes the page  
C. To avoid the need for escaping output  
D. To ensure cookies are never stored  

## 7) What is a “flash message” in web applications?

A. A message stored in a cookie forever  
B. A message stored temporarily (often in the session) that is displayed once and then cleared  
C. A message displayed only with JavaScript animations  
D. A message that can only appear on 404 pages  

## 8) Which statement is the best security guidance about what to store in cookies vs sessions?

A. Store anything sensitive in cookies because they are encrypted automatically  
B. Store sensitive data (like secrets) server-side (sessions); keep cookies minimal (often just an id or preference)  
C. Cookies are always safer than sessions because they live in the browser  
D. It is safe to store plain-text passwords in cookies if you use HTTPS  

## 9) What is “session fixation,” and what is a common mitigation after login?

A. A bug where sessions don’t expire; mitigate by changing cookie Path  
B. An attack where an attacker tries to force a known session id; mitigate by regenerating the session id after authentication  
C. A problem where cookies are blocked; mitigate by using GET parameters for passwords  
D. A server crash caused by too many sessions; mitigate by disabling `session_start()`  

## 10) Which statement about sessions is most accurate?

A. `session_start()` is optional even if you use `$_SESSION`  
B. Sessions are stored entirely in the browser by default  
C. You must start the session (e.g., `session_start()`) before reading/writing `$_SESSION` in a request  
D. Sessions only work when using the PHP CLI  

---

## Answer Key

1) B  
2) B  
3) B  
4) B  
5) A  
6) B  
7) B  
8) B  
9) B  
10) C  
