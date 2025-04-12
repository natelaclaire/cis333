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

## Exercise 6-3

In this exercise, you'll create a tool that looks up the distance between two European cities and also displays a table of values. 

1. Using your Codespace, open the `public/exercises/6-3-european-travel.php` file in your chapter 6 repository.
2. Inside the `cityOptions()` function, find the comment "Concatenate an `<option>` tag for each city" and add the following code:

```php
$options .= "<option value=\"$city\"";
if ($city == $selectedCity) {
      $options .= " selected";
}
$options .= ">$city</option>";
```

3. Find the comment "Check if the distance exists in the array...If it does, display the distance in kilometers and miles" and add the following code:

```php
if (isset($distances[$startIndex][$endIndex])) {
   echo "<p>The distance from $startIndex to $endIndex is " .
        $distances[$startIndex][$endIndex] . " kilometers, or " .
        round(($kmToMiles * $distances[$startIndex][$endIndex]), 2) . 
        " miles.</p>\n";
} else {
   echo "<p>The distance from " . htmlspecialchars($startIndex) . " to " .
        htmlspecialchars($endIndex) . " is not available.</p>\n";
}
```

4. Find the comment "Get the city names from the keys of the $distances array" and add the following code:

```php
$cityNames = array_keys($distances);
```

5. Find the comment "Check if the distance exists in the array...If it does, display the distance...If it doesn't, display N/A" and add the following code:

```php
$distance = isset($otherCities[$otherCity]) && $otherCities[$otherCity] > 0 
            ? $otherCities[$otherCity] 
            : 'N/A';
```

6. Note that when generating the table we are using the `$cityNames` array to ensure that the order of the values matches the order of the columns. This ensures that if we make a mistake when ordering one or more set(s) of distances it won't mess up the table.
7. Save and test the file using the PHP Dev Server to ensure that you don't see errors and that it runs as expected.

## Exercise 6-4

Use the techniques you learned this week to create a Guest Book script that stores visitor names and e-mail addresses in a text file or JSON file. Include functionality that allows users to view the guest book and prevents the same user name from being entered twice. Also, include code that sorts the guest book by name and deletes duplicate entries. Name the PHP file `6-4-guest-book.php` and save it in `public/exercises`.

## Exercise 6-5

Create an online order form as a Web form. The order form should list all items for sale (at least 5), including the name, description, and price, and should provide space for the visitor to provide the quantity desired of each. The quantity should allow 0 or more - the visitor can buy some of each item but doesn't need to buy more than one of the items. You can use an `<input type="number">` or a `<select>` box for each quantity, with appropriate options/attributes. A total for each item (quantity times price) and a grand total (sum of all item totals) should be displayed. The form should have buttons to update the totals for the quantities entered and to submit the order. Save the orders to a subdirectory called `6-5-online-orders` in the `public/exercises` directory and save the PHP file as `public/exercises/6-5-online-orders.php`. Use the date and time to create a unique filename for each order.
