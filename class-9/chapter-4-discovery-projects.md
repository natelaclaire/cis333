## Discovery Project 3-6

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

At the moment, this won't change the functionality, but you should test to ensure that your page still loads. Don't forget to commit!

## Discovery Project 3-7

Update the $baseUrl variable in includes/config.php as follows:  
```php
$baseUrl = '/';
```

Test the home page and About Us link again. The About Us link should now point to `/about-us` and should still display the 404 page.

Don't forget to commit!
