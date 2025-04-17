---
layout: default
title: "Chapter 6 Discovery Projects"
published: false
---

# Chapter 6 Discovery Projects

## Discovery Project 6-1

We're nearing the end here and we've discussed that our links are kind of messy. Currently, for example, the link to our Services page is `/index.php?page=services`. Wouldn't it be nice if it was just `/services`? Well, we can make that happen using Apache's `mod_rewrite` module, an extension to the Apache Web Server that is installed but not activated by default. To activate it, we simply need to run the `sudo a2enmod rewrite` command in the Terminal (a2enmod = Apache2 Enable Module). However, that only impacts our current Codespace instance, so if it gets deleted (automatically or manually), or when someone else (such as your instructor) creates a Codespace from your repository to check your work, the command will need to be run again. Fortunately, it's pretty easy to enable it by default by running the command as part of the container's startup process using the `.devcontainer/devcontainer.json` file. Of course, keep in mind that this is the file that controls how your container is built, so if you make a mistake it could break your Codespace temporarily. I vacillated over which is the better learning experience: sending you a pull request using GitHub and giving some experience merging such a pull request or explaining how you can do the process yourself. So, I decided to do both. In the video, I'll walk you through merging the pull request and as part of that process we'll look over what change was made. Basically, we need to modify the `postCreateCommand` option in the `.devcontainer/devcontainer.json` file to add `sudo a2enmod rewrite` into the set of commands that is run after the container is created.

To merge the pull request, you'll first need to merge your current branch into the `main` branch and sync, if you haven't already. Once that's done, go to your repository in GitHub and click Pull Requests. Find the Pull Request labeled "GitHub Classroom: Sync Assignment" and open it. Take a look at the information available to you, including a "diff" showing what is being changed. Confirm that there are no merge conflicts and then click "Merge". If there are conflicts, follow the instructions to resolve them before merging.

Next, return to your Codespace and pull or sync the changes. Ensure that you see the merge's commit in the source control graph and open the `.devcontainer/devcontainer.json` file to confirm that you see the new command listed in the `postCreateCommand` option.

The final step is necessary whether you use the pull request or manually update `.devcontainer/devcontainer.json`: press Control-Shift-P or F1 and type "Rebuild" and select "Codespaces: Rebuild Container". When prompted, choose "Full Rebuild". Then wait a minute or two for the Codespace to be rebuilt and Visual Studio Code to reload. In the next Discovery Project, we'll make use of the new module.

## Discovery Project 6-2

Create a file named `.htaccess` in the `public` folder and place the following in the file:  

```conf
RewriteEngine On

# Redirect any not found file to index.php?page=<requested_path>
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php?page=$1 [L,QSA]
```

The `.htaccess` file is used to override Apache configuration options within a directory and its subdirectories.

*Explanation:*

* `RewriteEngine` On enables URL rewriting.  
* `RewriteCond %{REQUEST_FILENAME} !-f` ensures the requested file does not exist.  
* `RewriteCond %{REQUEST_FILENAME} !-d` ensures the requested directory does not exist.  
* `RewriteRule ^(.*)$ index.php?page=$1 [L,QSA]` redirects all unmatched requests to `index.php?page=<requested_path>`, preserving the original URL path.

This will work for any missing file or directory, redirecting them to `index.php?page=<requested_path>`.

At the moment, this won't change the functionality, but you should test to ensure that your page still loads. Don't forget to commit!

## Discovery Project 6-3

Update the baseUrl configuration in `config/config.yml` as follows:  

```yaml
baseUrl: "/"
```

Test the home page and About Us link. The About Us link should now point to `/about-us` and should still display the About Us page.

Note that we didn't need to change how our application determines the page to show, because as far as PHP is concerned, the user still visited `index.php` and supplied a `page` parameter in the query string. Apache takes care of converting the actual URL that the user visited to the one that our PHP script is depending on. Also note that PHP can determine the actual URL using the `$_SERVER['REQUEST_URI']` autoglobal element, so some PHP applications (such as Wordpress) use that to determine routing.

Don't forget to commit!

## Discovery Project 6-4

After chapter 6, we have many more functions for handling arrays at our disposal. As we've discussed, we're going to use one of these to safely and securely enable our content manager(s) to add a page by creating a new Markdown file in our `content/pages` directory without the need to update any PHP files.

1. Open `includes/functions.php`
2. Create a new function called `validPage()` that takes a `string` called `$slug` as a parameter and returns a `bool`
3. Add the following lines inside the function:

```php
// static variables maintain their value between executions of a function
// which means that this line only happens once regardless of how many
// times validPage() is called...
static $pageFiles = null;

// ... and this only runs once as well because the second time the function
// is called $pageFiles already has a value
if (is_null($pageFiles)) {
    // load content of the content/pages directory into an array
    $pageFiles = scandir(APP_PATH.'content/pages');

    // remove the first two array elements, which are "." and ".."
    array_splice($pageFiles, 0, 2);
}
```

4. Below that, use the `in_array()` function to determine if `$pageFiles` contains a value of `$slug.'.md'` (the last part of the URL followed by the `.md` filename extension) and return that boolean response value
5. Open `index.php` and find the `switch ($page)` block
6. Add an `if` statement that uses the `validPage()` function to check if `$page` is a valid page
7. Move the contents of the `'about-us'` case into the `if` block and remove the `case 'about-us':` and `break;` statements
8. Add an `else` block and move the `$status = '404 Not Found';` and `include(APP_PATH.'includes/error/404.php');` statements into it
9. Modify the call to `fetchPage()` so that it fetches `$page` instead of `'about-us'`
10. Test the link to the About Us page and make sure that it still loads

## Discovery Project 6-5

Add a file to `content/pages` called `faqs.md`. Add the Markdown provided in Brightspace. Feel free to modify as you see fit, but keep the YAML header as-is for now (you'll see why in a moment). Test the link to the FAQs page to ensure that the page now loads.

## Discovery Project 6-6

As you know, we have the page title and one or more body classes in the YAML header of our Markdown files, but currently this information is not being used our `index.php` outputs the HTML `<head>` section and opening `<body>` tag before the `switch` block. Why? Well, our pages that are powered by PHP include files output HTML directly within the logic rather than populating a variable that could be output later. Additionally, the 404 header isn't being output when the 404 page is displayed because we can't output headers after HTML has been output, but we don't know if the page doesn't exist until after the HTML has started being output. How can we fix this? Fortunately, PHP has a solution for us: [output buffering](https://www.php.net/manual/en/book.outcontrol.php). Let's give this a try!

1. Open `index.php`.
2. Add a statement to echo `$pageContent` right above the `$status = '200 Found';` statement.
3. Move the statements starting with `$status = '200 Found';` through `writeVisitLog($status);`, including the `switch` block to the end of the PHP block immediately above the `<!doctype html>` line. There should only be a single PHP block above the `<!doctype html>` line.
4. Above the moved code, add the following `ob_start();` in order to start output buffering and create an empty array for page information. While output buffering is active no output is sent from the script, instead the output is stored in an internal buffer. Consequently, any output from within the `switch` block will not be sent to the browser until we are ready:

```php
ob_start();
$pageInfo = [];
```

5. Below the moved code, add the following to stop output buffering and store what is in the buffer in a `$pageContent` variable:

```php
$pageContent = ob_get_clean();
```

6. Replace `echo fetchPage($page)['content'];` with the following to overwrite the `$pageInfo` array with the info from the Markdown file:

```php
$pageInfo = fetchPage($page);
echo $pageInfo['content'];
```

7. Add the following below the line that reads `$status = '404 Not Found';` in order to send a status header to the browser indicating that the page doesn't exist:

```php
header("HTTP/1.0 404 Not Found");
```

8. Replace the content between the `<title>` tags with the following code immediately followed by your business name:

```php
<?=(isset($pageInfo['title']) ? $pageInfo['title'].' | ' : '') ?>
```

9. Inside the opening `<body>` tag, after the `body`, add the following:

```php
class="<?=($pageInfo['classes'] ?? '') ?>"
```

10. Within the `switch` block, add statements to populate the `$pageInfo['title']` array element with an appropriate title for the `services`, `portfolio`, and `contact-us` cases.

## Discovery Project 6-7

Let's add some additional configuration to the YAML headers in our Markdown files that will populate `<meta>` tags in our pages' head sections if present, in order to improve search engine optimization and social media sharing. Here is a list of `<meta>` tags that we want to add:

| YAML Config Name | Meta Tag                                                                        |
| ---------------- | ------------------------------------------------------------------------------- |
| description      | `<meta name="description" content="[value from YAML]">`                         |
| robots           | `<meta name="robots" content="[value from YAML]">`                              |
| ogTitle          | `<meta property="og:title" content="[value from YAML]">`                        |
| ogType           | `<meta property="og:type" content="[value from YAML]">`                         |
| ogImage          | `<meta property="og:image" content="[value from YAML]">`                        |
| ogDescription    | `<meta property="og:description" content="[value from YAML]">`                  |

To implement these, you'll need to modify your `index.php` file, adding logic that adds these to the `<head>` section if the options are populated in the `$pageInfo` array. I'll leave the exact implementation up to you, but let's look at how we might approach one of these:

```php
<?php
if (array_key_exists('description', $pageInfo)) {
    echo '<meta name="description" content="'.htmlentities($pageInfo['description']).'">'.PHP_EOL;
}
?>
```

That's just one idea. Feel free to use an entirely different approach, such as some sort of loop.

For testing purposes, these have already been added to the top of `content/pages/faqs.md`. Feel free to add some to the About Us page, remove/change some from the FAQs page, etc. in order to test to ensure that the tags show up when appropriate and don't show up when that is appropriate. Make sure that there are no error messages if any option is missing from a Markdown file's YAML header.

A few specific requirements:

- All values should be processed using `htmlentities()` before being output.
- The `ogImage` in the YAML will be a relative URL, but the `<meta>` content needs to be an absolute URL. Concatenate the `$_SERVER['HTTP_X_FORWARDED_HOST']` autoglobal onto the value provided in the YAML to turn the relative URL into an absolute URL, like we are doing with the `href` on the `<link rel="canonical">` tag.
- If a `description` is provided and an `ogDescription` is not, use the value from `description` for both.
- If no `ogTitle` is provided, use the value from `title`.

## Discovery Project 6-8

There is one more meta tag "required" by the [Open Graph protocol](https://ogp.me/): `og:url`. This contains the canonical URL, which we are already building, but it's possible that we might want to override the canonical URL with something specific to a page. We need to make two changes:

1. Add an `if` statement and set up the logic so that if `$pageInfo['canonical']` is set, that value is used in place of the URL that we are currently using for the `<link rel="canonical">` tag. `$pageInfo['canonical']` should be an absolute URL.
2. Add a `<meta property="og:url" content="[canonical URL]" />` tag, replacing the `content` attribute's value with the same value used in the `<link rel="canonical">` tag.

Test it by adding a `canonical` option to one of the Markdown files in `content/pages` and ensure that the URL supplied there appears as expected in the `<head>` section of the page (and only that page!).

## Discovery Project 6-9

In our chapter 5 discovery projects, we updated our `includes/portfolio.php` file to load the portfolio from our `config/portfolio.yml` file using the `fetchPortfolio()` function that we wrote. Now we want to use this same function to load 3 random portfolio entries to display on the home page. Here's what we need to do:

1. Modify the `fetchPortfolio()` function in `includes/functions.php` so that it accepts an `int` parameter named `$count` that defaults to `null` and a `bool` parameter named `$random` that defaults to `false`. **Note: because `null` is allowed for `$count`, the `int` should be prefixed with a question mark (`?int`) to indicate that the parameter is nullable.**
2. Before the `return` statement in the function, use the `shuffle()` function to randomize the order of the `$portfolio` array only if `$random` is true.
3. After that (and still before the `return` statement), check to see if `$count` is not null. If it is not null, use `array_slice()` to extract `$count` elements from somewhere in the `$portfolio` array and return those instead of the entire array.

Next, update `includes/home-portfolio.php` to call `fetchPortfolio(3, true)` to populate the `$portfolio` variable with 3 random portfolio entries, removing the hard-coded array that is in that file.

Test it by going to the home page and reloading a few times to ensure that 3 random items appear.
