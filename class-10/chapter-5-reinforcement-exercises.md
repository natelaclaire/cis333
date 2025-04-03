# Chapter 5 Reinforcement Exercises

## Exercise 5-1

In this exercise, you'll create a PHP script that displays a "hit counter," a counter of how many times the page has been visited.

1. Using your Codespace, open the `public/exercises/5-1-hit-counter.php` file in your chapter 5 repository.
2. Find the comment "initialize the counter" and add a line that initializes a variable named `$counter` with an integer value of 0.
3. Find the comment "open the existing file for reading and writing, with the pointer at the beginning of the file" and add the following line below it: `$file = fopen($counterFile, 'r+');`
4. Find the comment "the file was opened successfully, read the current counter value from the file" and add a line that:
   - Reads `filesize($counterFile)` bytes from the `$file` file handle using the `fread()` function,
   - Casts the read value to an `int`,
   - And places the value in the `$counter` variable.
5. Find the comment "the file does not exist, so open it for writing" and add a line below it that opens a file handle named `$file` for writing only, creating the file since it doesn't exist. Hint: the code will be nearly identical to step three, but the second attribute will be different. See the table on page 268 in the textbook.
6. Save and test the file using the PHP Dev Server to ensure that you don't see errors and that it runs as expected. Try refreshing the page several times to ensure that the counter increments. Also, check to see if you see a file named `5-1-counter.txt` in the `public/exercises` folder and that it contains the number expected.

## Exercise 5-2

In this exercise, you'll modify the hit counter to not use file stream functions.

1. Using your Codespace, open the `public/exercises/5-1-hit-counter.php` file that you completed in exercise 5-1 and save a copy of it as `public/exercises/5-2-hit-counter.php`.
2. Modify the code as follows:
   - Modify the `$counterFile` variable so that the script uses a file named `5-2-counter.txt`.
   - If the file named in `$counterFile` exists, use `file_get_contents()` to read the value from the file (you'll still need to cast to an `int` and store in `$counter`). There is no need to `rewind()` and nothing to do before incrementing `$counter` if the file doesn't exist.
   - After incrementing `$counter`, save the value of `$counter` to the file named in `$counterFile` using the `file_put_contents()` function. Remember that there is no need to close the file and that `file_put_contents()` returns false if it fails.
3. Save and test the file using the PHP Dev Server to ensure that you don't see errors and that it runs as expected. Try refreshing the page several times to ensure that the counter increments. Also, check to see if you see a file named `5-2-counter.txt` in the `public/exercises` folder and that it contains the number expected.

## Exercise 5-3

In this exercise, you'll create a PHP script that uses `fopen()` to fetch CSV data from an open dataset published by the State of Maine. 

1. Using your Codespace, open the `public/exercises/5-3-population-data.php` file in your chapter 5 repository.
2. Find the comment "open the URL for reading" and add a line that uses `fopen()` to opens a file stream for the URL in `$dataUrl` for reading only (see the table on page 268 in the textbook) and stores the file handle in a variable named `$file`.
3. Find the comment "read the data from the file and display it in the table" and add the following below it to read each line of the streamed file and convert the comma-separated values into an indexed array named `$line`, stopping when `fgetcsv()` returns false:

```php
while (($line = fgetcsv($file)) !== false) {
    
}
```

4. Inside the while loop, add an `if` block that checks if the value of `$line[1]` is "County" since we only want to output the population figures for the Maine counties.
5. Inside the if block, echo a table row (`<tr>` tag) containing two cells (`<td>` tags) with the first cell containing `$line[0]` and the second cell containing `$line[6]`.
6. Save and test the file using the PHP Dev Server to ensure that you don't see errors and that it runs as expected. It will take several seconds to run since it needs to download and process about 44 KB of data from a slow Web server.

## Exercise 5-4

In this exercise, you will modify the script from exercise 5-3 so that it caches the generated table to a file named "5-4-cached-population-data.html" and only redownloads the source data once a week. Begin by saving a copy of `public/exercises/5-3-population-data.php` as `public/exercises/5-4-cached-population-data.php`. Beyond that, the exact implementation is up to you but here are some tips:

- You'll need to check if the "5-4-cached-population-data.html" file exists and, if so, compare the file modification timestamp (see page 244 in the textbook) to the output of the [`time()` function](https://www.php.net/manual/en/function.time.php), which returns the current time as a UNIX timestamp. A UNIX timestamp is an integer measured in seconds.
- There are 86400 seconds in each day and we can output the "5-4-cached-population-data.html" file instead of having to redownload the source data as long as the file is no more than 7 days old.
- If you have to download the CSV file and create the table, you'll need to store the HTML in a variable instead of directly outputting it, so that you can then both store it in a file and output it.

## Exercise 5-5

Create a Web form for uploading pictures for a high school reunion and save it as `public/exercises/5-5-reunion-photos.php`. The form should have text input fields for the person's name and a description of the image, and a file input field for the image. When an image is successfully uploaded, it should be moved to a subdirectory inside `public/exercises` named `5-5-photos`. If the subdirectory doesn't exist, it should be created. When moving the photo to its destination, name the file with the person's name followed by the output of the `time()` function followed by the file extension (for example: `nate laclaire 1743261271.jpg` if the person uploaded a JPEG file, entered "nate laclaire" as their name, and uploaded it at the UNIX timestamp 1743261271). You can either use the original filename or the `type` key from the `$_FILES` array to determine the proper extension and to determine if the file is an acceptable image (see [image MIME types from MDN Web Docs](https://developer.mozilla.org/en-US/docs/Web/HTTP/Guides/MIME_types#image_types)). After moving the file, append the final filename, the person's name, and the photo description to an array and store it as JSON in a file named `5-5-photos.json`. Finally, display all uploaded photos, names, and descriptions in a table.
