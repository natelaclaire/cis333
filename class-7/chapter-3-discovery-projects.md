# Chapter 3 Discovery Projects

## Discovery Project 3-1

Follow the instructions to merge the pull request.

## Discovery Project 3-2

Create a new file named `home.php` in the includes folder under the Git repository’s root. Copy the code that starts with `<!-- begin includes/home.php -->` and ends with `<!-- end includes/home.php -->` into the new file and save it. Now, return to index.php and replace the copied code with the following PHP code block:  

```php
<?php  
include('includes/home.php');  
?>
```

Note that you should not modify the include statements in the copied code. Remember that file paths are relative to the called file, not the included file, so even though the include files are now siblings to the home.php file that contains the include statements, since the called file is still `index.php` no change is needed.

## Discovery Project 3-3

Create a new folder inside the includes folder called error. Create a new file inside `includes/error` named `404.php` and populate it with the following:  

```php
<h1>Oops! Lost in Cyberspace 🚀</h1>

<p>Looks like you took a wrong turn. The page you’re looking for isn’t here—maybe it moved, maybe it never existed, or maybe it’s just hiding.</p>

<p>👉 Go back to where you came from, or head to our homepage to find what you need.</p>

<p><em>(Or just stare at this page and ponder the mysteries of the internet. We won’t judge.)</em></p>

<p><a href="<?=constructUrl(); ?>">🔙 Go Home</a></p>
```

## Discovery Project 3-4

Open `index.php` and add the following logic to the top of the file, below the `require_once()` lines:  

```php
$page = '';  
if (isset($_GET['page']) && $_GET['page']!='') {  
    $page = trim($_GET['page']);  
    $page = strtolower($page);  
    $page = str_replace('_', '-', $page);  
    $page = preg_replace('//[\/\\\\:*?"<>|.]|\\s//', '', $page);   
}
```

## Discovery Project 3-5

In `index.php`, add the following somewhere between the opening and closing `<head>` tags:  

```php
<link rel="canonical" href="https://<?php  
echo htmlspecialchars($_SERVER['SERVER_NAME'].constructUrl($page));  
?\>" />
```

## Discovery Project 3-6

In `index.php`, replace the line to include `includes/home.php` with the following logic to include the correct PHP file based on the page parameter:  

```php
<?php  
switch ($page) {  
    case '': // home page case  
        include('includes/home.php');  
        break;

    // we’ll be adding more cases later

    default: // display a "page not found" page in all other cases  
        include('includes/404.php');  
}  
?>
```

Test the home page and About Us page. The About Us link should point to `/index.php?page=about-us` and should display the 404 page.

## Discovery Project 3-7

Create a file named .htaccess in the public folder and place the following in the file:  

```conf
RewriteEngine On

# Redirect any not found file to index.php?page=<requested_path>
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php?page=$1 [L,QSA]
```

*Explanation:*

* `RewriteEngine` On enables URL rewriting.  
* `RewriteCond %{REQUEST_FILENAME} !-f` ensures the requested file does not exist.  
* `RewriteCond %{REQUEST_FILENAME} !-d` ensures the requested directory does not exist.  
* `RewriteRule ^(.*)$ index.php?page=$1 [L,QSA]` redirects all unmatched requests to `index.php?page=<requested_path>`, preserving the original URL path.

This will work for any missing file or directory, redirecting them to `index.php?page=<requested_path>`.

## Discovery Project 3-8

Update the $baseUrl variable at the top of index.php as follows:  
```php
$baseUrl = '/';
```

Test the home page and About Us link again. The About Us link should now point to `/about-us` and should still display the 404 page.
