# Chapter 2 Discovery Projects

## Discovery Project 2-1

Before we begin, create a new branch for chapter-2.

Then, open the public/index.php file from the Git repository in Visual Studio Code. Throughout the file, you will find HTML comments identifying that sections of the document represent the contents of PHP include files. For example:
```html
<!-- begin includes/main-navigation.php -->
…
<!-- end includes/main-navigation.php -->
 ```

We need to create each of these PHP files, copy the code into those files, and replace the code in the index.php file with an include statement. Let's start with includes/main-navigation.php.

First, create a folder named includes in the root of the Git repository. It will be a sibling to the public folder.

Create a new file named main-navigation.php in the includes folder that you just created. Copy the code that starts with ```<!-- begin includes/main-navigation.php -->``` and ends with ```<!-- end includes/main-navigation.php -->``` into the new file and save it. Now, return to index.php and replace the copied code with the following PHP code block:
```php
<?php
include(APP_PATH.'includes/main-navigation.php');
?>
```
  
We're using the APP_PATH constant that we created a couple of weeks ago to help construct the path to the file.

Start the Apache Web server and open index.php in a Web browser to verify that the main navigation bar is unchanged, which indicates that you have successfully moved the code to the include file and properly included it in the index.php file.

## Discovery Project 2-2

Repeat the process from discovery project 2-1 for the includes/footer.php file. Remember, the steps are:

1. Create a file named footer.php in the includes folder
2. Copy the code that begins with ```<!-- begin includes/footer.php -->``` and ends with ```<!-- end includes/footer.php -->``` into the new file and save it
3. Replace the copied code with a PHP block that includes an include statement to include the new file
4. Refresh index.php in your Web browser and verify that the footer still appears (only once!)
  
## Discovery Project 2-3

Repeat the same process for includes/home-text.php, includes/home-portfolio.php, and includes/home-services.php. Make sure that you verify that each of the changes is successful.

## Discovery Project 2-4

Open includes/home-services.php and modify it to use a for loop:

1. Create an array that contains all of the services listed in the file. Last week we learned about associative arrays, which have named keys, and multidimensional arrays, which are arrays inside other arrays. Take the list of services within the file and create a multidimensional array that stores the information about the services. This will be an indexed array where each array element is an associative array with a name element and a description element. Confused? Here's an example with the first two services:  
```php
$services = [
    [  
        'name' => 'Custom Website Development',  
        'description' => 'Tailored website solutions built from the ground up to meet specific client needs, ensuring unique designs and functionalities.',  
    ],  
    
    [  
        'name' => 'E-Commerce Solutions',  
        'description' => 'Development of online stores with secure payment gateways, product management systems, and user-friendly interfaces to enhance the shopping experience.',  
    ], // it's safe and best practice to include a comma at the end of each array element, even the final one  
    
// add the remaining services here  
];  
```

2. Write a for loop that outputs the HTML code to display each of those services. To refer to elements of a multidimensional array, you use multiple sets of square brackets. For example:  
```php
$services[0]['name']  
$services[0]['description']  
// within your for loop, this would look more like:  
$services[$i]['name']  
$services[$i]['description']  
```

3. Remove the original HTML that you've replaced with the for loop
4. Test your index.php and confirm that the change that you just made didn't change the visible output.

## Discovery Project 2-5

Open includes/home-portfolio.php and modify it to use a foreach loop:

1. Create a multidimensional array named $portfolio made up of an indexed array where each element is an associative array. The associative array elements should be:
    - The Thumbnail URL of each portfolio image (named imageUrl)
    - The Site Name associated with each portfolio image (named name)
    - The Description of each site in the portfolio (named description)
    - The Site URL of each site in the portfolio (named url)
2. Populate the array with the information about the 3 sites in the portfolio on the home page
3. Write a foreach loop that outputs the HTML code to display each of those portfolio tiles
4. Remove the original HTML that you've replaced with the loop
5. Test your index.php and confirm that the change that you just made didn't change the visible output.

## Discovery Project 2-6

We're going to keep the configuration variables in a single PHP file. Eventually, we'll use this same file to load the configuration that's stored in a YAML file. Create a new file named config.php in the includes folder. At the very start of the file, open a PHP code block. Do not close it. This file will contain nothing but PHP code. This allows us to include the file in any PHP script without running the risk of sending the HTTP headers.

Over the next few weeks, we're going to be gradually improving both the logic behind the construction of our navigation bar and the logic that determines which page to display. To begin, open the includes/config.php file. Create a variable named $baseUrl and assign it the value of ```/index.php?page=``` as shown here:
```php
<?php
$baseUrl = '/index.php?page=';
```

We'll be using this variable to construct our navigation links throughout the site. This will provide us with flexibility: if we decide to change the site's base URL in the future, we only need to modify this one variable. This is useful in our case because right now our URLs need to refer to the index.php file, but we're going to change that in the future.

## Discovery Project 2-7

We're also going to keep common functions in a single PHP file. Create a new file named functions.php in the includes folder.

We're going to use the ```$baseUrl``` variable to construct our page links. Our first function can be used in our other files to construct links. Add the following to the file:

```php
<?php
function constructUrl(string $url = ''): string
{
    global $baseUrl; // bind local variable from global scope

    if ($url=='') { // for the home page, we don't need the $baseUrl

        return '/';

    } else {

        return $baseUrl . $url;

    }

}
```  

Like config.php, don't close the PHP code block since the file will contain pure PHP.

Next, open index.php and add the following two lines below the ```define()``` statement:

```php
require_once(APP_PATH.'includes/config.php');
require_once(APP_PATH.'includes/functions.php');
```

Finally, let's test our changes out! Open includes/main-navigation.php and replace the first two ```<li>``` lines with the following:

```html
    <li class="nav-item"><a href="<?=constructUrl(); ?>" class="nav-link active" aria-current="page">Home</a></li>
    <li class="nav-item"><a href="<?=constructUrl('about-us'); ?>" class="nav-link">About Us</a></li>
```
