# Chapter 3 Discovery Projects

## Discovery Project 3-1

Create a new file named `home.php` in the includes folder under the Git repository’s root. Copy the code that starts with `<!-- begin includes/home.php -->` and ends with `<!-- end includes/home.php -->` into the new file and save it. Now, return to index.php and replace the copied code with the following PHP code block:  

```php
<?php  
include('includes/home.php');  
?>
```

Note that you should not modify the include statements in the copied code. Remember that file paths are relative to the called file, not the included file, so even though the include files are now siblings to the home.php file that contains the include statements, since the called file is still `index.php` no change is needed.

Don't forget to test and commit!

## Discovery Project 3-2

Create a new folder inside the includes folder called error. Create a new file inside `includes/error` named `404.php` and populate it with the following:  

```php
<div class="album py-5">
    <div class="container">
        <h1 class="pb-2 border-bottom">Oops! Lost in Cyberspace 🚀</h1>

        <p>Looks like you took a wrong turn. The page you&rsquo;re looking for isn&rsquo;t here—maybe it moved, maybe it never existed, or maybe it&rsquo;s just hiding.</p>

        <p>👉 Go back to where you came from, or head to our homepage to find what you need.</p>

        <p><em>(Or just stare at this page and ponder the mysteries of the internet. We won&rsquo;t judge.)</em></p>

        <p><a href="<?=constructUrl(); ?>">🔙 Go Home</a></p>
    </div>
</div>
```

Don't forget to commit!

## Discovery Project 3-3

Open `index.php` and add the following logic to the top of the file, below the `require_once()` lines:  

```php
$page = '';  
if (isset($_GET['page']) && $_GET['page']!='') {
    $page = trim($_GET['page']);
    $page = strtolower($page);
    $page = str_replace('_', '-', $page);
    $page = preg_replace('/[\\/\\\\:*?"<>|.]|\\s/', '', $page); // /[\/\\:*?"<>|.]|\s/
}
```

Don't forget to test and commit!

## Discovery Project 3-4

In `index.php`, add the following somewhere between the opening and closing `<head>` tags:  

```php
<link rel="canonical" href="https://<?php  
echo htmlspecialchars($_SERVER['SERVER_NAME'].constructUrl($page));  
?>">
```

The `$_SERVER['SERVER_NAME']` would work on many servers, but because Codespaces uses a reverse proxy to provide access to our Apache server and PHP Dev Server, it contains just "localhost" and therefore doesn't do what we need. Let's see what we should use instead. Add the following at the very top of `index.php` to output a PHP info page and stop execution of the rest of the page:

```php
<?php
phpinfo(); // output the familiar PHP Info page
exit();    // terminate the script - nothing below this point executes
?>
```

Open `index.php` in a browser and you will see the PHP info page without the rest of the `index.php` content. Scroll down to "PHP Variables" and look at the `$_SERVER` array contents. `$_SERVER['HTTP_X_FORWARDED_HOST']` is a common variable that can be used in place of `$_SERVER['SERVER_NAME']` when a reverse proxy server is in use. Modify the link tag to use that instead, remove the `phpinfo();` and `exit;` lines from the top of `index.php` and test the file.

Don't forget to commit!

## Discovery Project 3-5

In `index.php`, replace the line to include `includes/home.php` with the following logic to include the correct PHP file based on the page parameter:  

```php
<?php  
switch ($page) {  
    case '': // home page case  
        include(APP_PATH.'includes/home.php');  
        break;

    // we’ll be adding more cases later

    default: // display a "page not found" page in all other cases  
        include(APP_PATH.'includes/error/404.php');  
}  
?>
```

Test the home page and About Us page. The About Us link should point to `/index.php?page=about-us` and should display the 404 page.

Don't forget to commit!

## Discovery Project 3-6

Recall that I mentioned last week that we will be creating dedicated Portfolio and Services pages? These will each be stored in PHP files inside our `includes` folder. Although we will be populating them with data from YAML files, for now let's set up the pages. Let's start with the Portfolio page:

1. Open `home-portfolio.php` and save it as `portfolio.php` by pressing Control-Shift-S on Windows or Command-Shift-S on Mac.
2. In `portfolio.php`, remove the `bg-body-tertiary` from the outermost `<div>` tag.
3. Change the `<h2>` tag to `<h1>`.
4. Change the `<h3>` tag inside the loop to `<h2>`.
5. Add a few additional sites to your `$portfolio` array. You can use sites that you built (such as in other classes) or you could use site templates from a template site. Please note in the description if it's a template or something you built and include a link to the template in the `url` array element.
6. Open `index.php` and add a new `case` to the `switch` statement that includes `APP_PATH.'includes/portfolio.php'` when the case is `'portfolio'` (copy the first case, including the `break` statement).
7. Open `main-navigation.php` and fix the `href` for the Portfolio link using the `constructUrl()` function as we did with the About Us link.

Now test to ensure that your link works and that it takes you to your new Portfolio page! Once you are satisfied, commit your changes.

## Discovery Project 3-7

Next, repeat the process from Project 3-6 to create a `includes/services.php` file from the `includes/home-services.php` file. Steps 2 and 5 will not be necessary, but the other steps will be quite similar. Feel free to modify the layout as you feel appropriate. For example, you might adjust the classes on the `<div>` tag with a class of `row` to change the number of columns that appear at each breakpoint (see the [Bootstrap documentation](https://getbootstrap.com/docs/4.4/layout/grid/#row-columns) for details), or you could completely change the HTML to create an entirely new layout for the page.
