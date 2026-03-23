# Class 9 Quiz: Client-Server Communication (Chapter 10)

## Instructions
Choose the best answer for each question.

1. In a typical server-rendered PHP web application, which statement is most accurate?
   A. PHP runs in the browser and generates HTML locally
   B. PHP runs on the server and generates the response sent to the browser
   C. PHP runs only when JavaScript calls it
   D. PHP runs only when a database query is executed

2. Which best describes an HTTP request?
   A. A server-generated HTML page
   B. A message sent from the client to the server containing method, URL, headers, and optionally a body
   C. A file stored on disk for caching
   D. A response code like 200 or 404

3. In a URL like `/search?q=php&sort=name`, what is the query string?
   A. `/search`
   B. `q=php&sort=name`
   C. `search?q`
   D. `php&sort=name`

4. In PHP, query string parameters are placed into which superglobal?
   A. `$_POST`
   B. `$_COOKIE`
   C. `$_GET`
   D. `$_SERVER`

5. Which statement about response headers is correct?
   A. Response headers are sent from the client to the server
   B. Response headers must be set after printing the response body
   C. Response headers are metadata sent from the server to the client, and must be sent before body output
   D. Response headers are only used for JSON responses

6. Which function is commonly used in PHP to set the HTTP status code?
   A. `set_status(404)`
   B. `http_response_code(404)`
   C. `status_code(404)`
   D. `header_status(404)`

7. A redirect response typically includes which key header?
   A. `Accept`
   B. `Host`
   C. `Location`
   D. `User-Agent`

8. In browser Developer Tools, which feature is the primary source of truth for seeing the exact request/response (status code, headers, timings)?
   A. Console tab
   B. Network tab
   C. Elements tab
   D. Sources tab

9. Which statement best explains PHP stream wrappers?
   A. They only affect how PHP formats strings
   B. They allow many file functions (like `fopen()` or `file_get_contents()`) to work with different resource types such as files and URLs
   C. They are required for arrays to be passed by reference
   D. They automatically encrypt all HTTP responses

10. Why do many PHP projects use a `public/` folder as the web root?
    A. It makes PHP run faster by compiling code ahead of time
    B. It prevents the server from ever returning 404 errors
    C. It limits what files are directly accessible over HTTP, keeping non-public code/config/storage outside the web root
    D. It forces all requests to use POST instead of GET

## Answer Key
1. B
2. B
3. B
4. C
5. C
6. B
7. C
8. B
9. B
10. C
