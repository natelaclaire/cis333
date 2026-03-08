# Class 8 Quiz: Files and Directories (Chapter 9)

## Instructions
Choose the best answer for each question.

1. What does `file_get_contents($path)` return if it fails to read the file?
   A. An empty string
   B. `false`
   C. `null`
   D. It always throws an exception

2. By default, `file_put_contents($path, $data)` will:
   A. Append to the end of the file
   B. Overwrite the file (or create it if it does not exist)
   C. Refuse to write unless the file already exists
   D. Write only if the file is empty

3. Which flag tells `file_put_contents()` to append instead of overwrite?
   A. `FILE_APPEND`
   B. `FILE_OVERWRITE`
   C. `FILE_TRUNCATE`
   D. `FILE_READONLY`

4. Which `fopen()` mode opens a file for reading only and fails if the file does not exist?
   A. `'r'`
   B. `'w'`
   C. `'a'`
   D. `'x'`

5. What does `file($path, FILE_IGNORE_NEW_LINES)` return?
   A. A string containing the entire file
   B. An array of lines, with newline characters removed
   C. An array of characters
   D. A file handle (resource)

6. Which statement is correct?
   A. `file_exists($path)` returns true only for regular files, not directories
   B. `is_file($path)` can return true for directories
   C. `is_dir($path)` returns true only if the path exists and is a directory
   D. `is_dir($path)` creates the directory if it does not exist

7. Why should you call `fclose($handle)` after using `fopen()`?
   A. To convert the handle into a string
   B. To release the underlying OS resource and ensure data is flushed
   C. To automatically delete the file
   D. To reset the file pointer to the beginning

8. Which pair of functions is used to delete a file and remove an empty directory?
   A. `delete()` and `rmdir()`
   B. `unlink()` and `rmdir()`
   C. `unlink()` and `mkdir()`
   D. `remove()` and `rmdir()`

9. What is the effect of calling `json_decode($json, true)` instead of `json_decode($json)`?
   A. It pretty-prints JSON when decoding
   B. It returns associative arrays for JSON objects (instead of `stdClass` objects)
   C. It forces the JSON to be UTF-16
   D. It always returns strings for numbers

10. You are building a notes app and a user can request a note name. Which approach is safest?
    A. Use the requested string directly in the file path and trust that users will behave
    B. Remove all dots (`.`) from the requested string and then read the file
    C. Build an allowlist of known filenames and validate the request against it (optionally with `realpath()` containment)
    D. Use `trim()` on the requested string and then read the file

## Answer Key
1. B
2. B
3. A
4. A
5. B
6. C
7. B
8. B
9. B
10. C

