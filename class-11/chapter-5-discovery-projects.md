---
layout: default
title: "Chapter 5 Discovery Projects"
published: false
---

## Discovery Project 5-1

PHP has an official [YAML Data Serialization](https://www.php.net/yaml) extension, but while it is very common, it is not available on all servers. Installing extensions such as this one is not always possible on shared hosting platforms because PHP extensions are written in C and compiled for the specific server platform, so installing them generally requires server administrative privileges. Additionally, there are some features of YAML that aren't supported and there are supported features that some sites don't need. As a result, developers have created a number of alternatives that are written in pure PHP, making them usable in any PHP-based application regardless of the server. Some of these can be downloaded and included using a standard `include()` statement, while others can be installed via Composer. One of the latter is the [Symfony Yaml](https://symfony.com/doc/current/components/yaml.html) component, a very simple YAML parser created as part of the [Symphony PHP framework](https://symfony.com/) and designed for simple YAML documents with a focus on features needed for configuration files. It converts YAML documents to arrays, which is perfect for our use case. And, it can be installed using Composer.

Let's install it! Within your Discovery Project Codespace, go to the Terminal and run the following command:

```
composer require symfony/yaml
```

Next, open your `includes/config.php` file and add the following after the opening PHP tag:

```php
use Symfony\Component\Yaml\Yaml;

$config = Yaml::parseFile(APP_PATH.'config/config.yaml');
```

Next, change the line in `includes/config.php` that reads `$baseUrl = '/index.php?page=';` to `$baseUrl = $config['baseUrl'];`.

Finally, create a new folder in the root of your Discovery Project repository and call it `config`. Inside the folder, create a file named `config.yml` and add the following to that file:

```yaml
---
baseUrl: "/index.php?page="
```

Now test your site and make sure that the navigation bar still includes the proper base URL.

## Discovery Project 5-2

Now that we have some YAML working, let's update our navigation bar to automatically load the list of links from the configuration file. Open `config/config.yml` again and add the following immediately below the line that reads `baseUrl: "/index.php?page="`:

```yaml
nav:
  - title: "Home"
    url: ""
  - title: "About Us"
    url: "about-us"
  - title: "Services"
    url: "services"
  - title: "Portfolio"
    url: "portfolio"
  - title: "FAQs"
    url: "faqs"
  - title: "Contact Us"
    url: "contact-us"
```

**Note:** the indentation is very important! The `nav:` line begins a sequence, which will become an indexed array. Each sequence item begins with a `-`. The `title:` and `url:` items are each named keys within the sequence items (these are called mappings, so we are defining a sequence of mappings). All dashes need to be lined up two spaces indented from `nav:` and the `title:` and `url:` lines all need to line up.

Next, open `includes/main-navigation.php`. Between the opening and closing `<ul>` tags, wrap the the first `<li>` tag inside a `foreach` statement that iterates over `$config['nav'] as $nav`. Inside the `foreach`, add the following line:

```php
$url = constructUrl($nav['url']);
```

Replace the `href` attribute value on the `<a>` tag with the following:

```php
<?=$url ?>
```

Replace the word "Home" with the following:

```php
<?=htmlspecialchars($nav['title']) ?>
```

Remove the other `<li>` tags and then test a page on the site. You should see all of the pages listed, but they will all appear with the active page formatting. Let's fixed that.

Above the `foreach` statement, add the following:

```php
$currentUrl = $_SERVER['REQUEST_URI'];
```

Within the `<a>` tag definition, replace `class="nav-link active" aria-current="page"` with the following:

```php
<?=($url==$currentUrl ? 'class="nav-link active" aria-current="page"' : 'class="nav-link"') ?>
```

That will output the proper class and `aria` attribute on the current page to indicate that it is the current page, by comparing `$_SERVER['REQUEST_URI']` to the link's `href`.

Refresh the page and then click around to ensure that the proper link displays as active. Note that even the missing pages will display as active now.

## Discovery Project 5-3

Let's update our Services page and the services list on our home page to load the list from a YAML file. This will provide a single file that we can update to update both lists.

To begin, create a new file in the `config` folder named `services.yml`. Each YAML file should begin with three dashes, which indicates the start of a YAML document. Some YAML parsers support multiple documents in a single file, but the Symphony Yaml Component does not, which is fine since we just need one document per file. This YAML file will be a single sequence of mappings, which will become an indexed array of associative arrays. Add the following to the file:

```yaml
---
- name: ""
  description: ""
```

Use the values from the `$services` array in the `includes/home-services.php` and `includes/services.php` files to populate the YAML file, repeating the above lines for each array element and placing the values inside the double quotes.

Next, open `includes/functions.php` and add the following immediately after the opening PHP tag so that we don't have to use the full namedspaced classname for the `Yaml` class in this file (it creates an alias named `Yaml`):

```php
use Symfony\Component\Yaml\Yaml;
```

Next, add the following function, which loads the `config/services.yml` file and returns the array:

```php
function fetchServices(): array {
    $services = Yaml::parseFile(APP_PATH.'config/services.yml');

    return $services;
}
```

Finally, replace the array inside `includes/home-services.php` and `includes/services.php` with the following statement:

```php
$services = fetchServices();
```

Now test the home page and Services page to ensure that both pages show the list of services and that everything appears as it should.

## Discovery Project 5-4

Next, repeat the steps that you completed in Discovery Project 5-3 for the Portfolio page, creating a file named `config/portfolio.yml` and a function named `fetchPortfolio()`. The sequence in the YAML file will contain mappings named "imageUrl", "name", "description", and "url". Place the full list of portfolio items from `includes/portfolio.php` in the `config/portfolio.yml` file. Remember to update `includes/portfolio.php` to use the `fetchPortfolio()` function. For this week, leave the portfolio on the home page as-is. In our Chapter 6 Discovery Projects, we'll look at how we can randomly choose 3 items from the portfolio to display on the home page. Once you're done, be sure to test the Portfolio page to ensure that it still displays the full portfolio.

## Discovery Project 5-5

It's finally time to do something with the `content/pages/about-us.md` file!

First, let's add a YAML header to the file. This is where we can put details about the page that will populate the `<head>` section of the page and other sections of the page. Open `content/pages/about-us.md` and add the following above what is there:

```yaml
---
title: "About Us"
classes: "about-page"
---
```

Next, open `includes/functions.php` and add the following function:

```php
function fetchPage(string $url): array {
    // initialize $page to empty array
    $page = [];

    // get the contents of the file as a string
    // (we already validated that the filename exists in the folder)
    if ($pageString = file_get_contents(APP_PATH.'content/pages/'.$url.'.md')) {
        // separate the YAML and Markdown into separate array elements
        $pageArray = explode("---\n", $pageString);

        // only proceed if there was a YAML document at the top of the file
        if (count($pageArray)==3) {
            // parse the YAML from the string into an associative array (element 0 is empty)
            $page = Yaml::parse($pageArray[1]);
    
            // parse the Markdown and add to the $page array with a key of "content"
            $parsedown = new Parsedown();
            $page['content'] = $parsedown->text($pageArray[2]);
        }
    }

    return $page;
}
```

Finally, add the `about-us` URL to the `public/index.php` file's switch statement by adding the following below the `contact-us` case:

```php
case 'about-us':
    echo '<div class="container">';
    echo fetchPage('about-us')['content'];
    echo '</div>';
    break;
```

That will load the page from the file and display the page content within a container `<div>`. Next time, we'll be restructuring `index.php` slightly so that other elements in the page get populated from the YAML and so that adding a page is as easy as adding a new `.md` file to the `content/pages` folder.

Now test the link to the About Us page and confirm that it appears!

## Discovery Project 5-6

In this project, we're going to write log files to keep track of hits to pages on our site. There will be a fresh log file for each day and new log entries will be added throughout the day. This is only an example. Apache takes care of this for us, but it's sometimes helpful to produce specialized logs in PHP.

Create a folder in the root of the repository named logs.

Open `includes/functions.php` and add the following function:

```php
function writeVisitLog(string $status): void {
    // date format is Year dash Month dash Day, e.g. 2025-03-30 
    $logFile = APP_PATH.'logs/visits-'.date('Y-m-d').'.log';

    $logData = [
        // IP of visitor
        $_SERVER['HTTP_X_REAL_IP'] ?? $_SERVER['REMOTE_ADDR'] ?? '-',
        // date and time; time is 24-Hour Hour colon Minute colon Second, e.g. 23:59:01
        date('Y-m-d H:i:s'),
        // URL requested
        $_SERVER['REQUEST_URI'] ?? '-',
        $status,
        // Page that linked to this page, if there was one
        $_SERVER['HTTP_REFERER'] ?? '-',
        // Browser's user agent string
        $_SERVER['HTTP_USER_AGENT'] ?? '-'
    ];

    // separate fields with tabs, each entry on a new line
    $logString = implode("\t", $logData)."\n"; 

    file_put_contents($logFile, $logString, FILE_APPEND);
}
```

Open `public/index.php` and add the following above the `switch` statement:

```php
$status = '200 Found';
```

Inside the `default` case, add the following:

```php
$status = '404 Not Found';
```

Below the `switch` block, add the following:

```php
writeVisitLog($status);
```

## Discovery Project 5-7

It can be quite frustrating to discover that at some point you stopped receiving emails from your site's contact form and now you don't know what messages you might have missed. Using Discovery Project 5-6 as an example, create a function named `writeEmailLog()` that records contact form submissions to a text file in the `logs` folder named `email-X.log` where X is the date of submission. The log file should include all form field values and the date and time of submission. **Do not** record a log entry if validation fails, only if the message should have been sent.
