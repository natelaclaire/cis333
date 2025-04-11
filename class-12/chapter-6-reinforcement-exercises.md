# Chapter 6 Reinforcement Exercises

## Exercise 6-1

In this exercise, you'll create a Song Organizer script.

1. Using your Codespace, open the `public/exercises/6-1-song-organizer.php` file in your chapter 6 repository.
2. Inside the `switch` block, fill in the appropriate logic for each case:
   - To remove duplicates, use `$songs = array_unique($songs);`
   - To sort in ascending order, use `sort($songs);`
   - To sort in descending order, use `rsort($songs);`
   - To shuffle the array's order, use `shuffle($songs);`
3. Notice how we are using `!in_array()` (read "not in array") to ensure that the song name isn't in the list already before adding it. `in_array()` returns `true` if the value is in the array, so we use the `!` (NOT) operator to return `false` if it is in the array, which will cause the `if` condition to fail and the `else` block to execute.
4. Save and test the file using the PHP Dev Server to ensure that you don't see errors and that it runs as expected. Here are a few tips:
   - Try adding several songs and then use the different buttons to ensure that they do what you expect.
   - Note that you shouldn't be able to add the same song twice, which means that the "Remove Duplicates" button won't do anything unless you...
   - ...try manually adding duplicate songs to the `public/exercises/6-1-songs.txt` file and then test the "Remove Duplicates" button to ensure that it works.

## Exercise 6-2

In this exercise, you'll create a multidimensional array that contains the measurements, in inches, for several boxes that a shipping company might use to determine the volume of a box.

1. Using your Codespace, open the `public/exercises/6-2-box-array.php` file in your chapter 6 repository.
2. Complete the definition for the `$boxes` array using the following table as a guide (the box type should be the associative array key and each array element should be an associative array with keys of "Length", "Width", and "Depth" and the values shown below - note that the keys are case sensitive!):

| Box Type       | Length (in)      | Width (in)      | Depth (in)      |
| -------------- | ---------------- | --------------- | --------------- |
| Small          | 12               | 10              | 2.5             |
| Medium         | 30               | 20              | 4               |
| Large          | 60               | 40              | 11.5            |

3. Inside the `foreach` loop, add a statement to calculate the volume of each box (Length times Width times Depth - remember to use `*` for multiplication) and store the value in a variable named `$volume`.
4. Below the volume calculation, add an `echo` statement that outputs a table row containing five cells containing the box type, length, width, depth, and volume, respectively.
5. Save and test the file using the PHP Dev Server to ensure that you don't see errors and that it runs as expected.
6. Add an additional "Extra Large" box type with dimensions of your choice, save and reload the page to ensure that everything works as it should.

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
