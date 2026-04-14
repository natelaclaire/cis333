<?php
$htaccess = __DIR__ . '/../starter-files/public/.htaccess';

$errors = [];

if (!is_file($htaccess)) {
    $errors[] = 'Missing file: public/.htaccess';
} else {
    $txt = (string) file_get_contents($htaccess);
    $hasRedirect = false;

    // Accept either a mod_alias Redirect or a mod_rewrite rule.
    if (preg_match('/^\\s*Redirect\\s+301\\s+\\/home\\b\\s+\\//mi', $txt)) {
        $hasRedirect = true;
    }
    if (preg_match('/RewriteRule\\s+\\^home\\/?\\$\\s+\\/?\\s+\\[R=301,?L\\]/i', $txt)) {
        $hasRedirect = true;
    }
    if (preg_match('/RewriteRule\\s+\\^home\\/?\\$\\s+\\/?\\s+\\[L,R=301\\]/i', $txt)) {
        $hasRedirect = true;
    }

    if (!$hasRedirect) {
        $errors[] = 'public/.htaccess must redirect /home to / with a 301 redirect (Redirect 301 or RewriteRule with R=301)';
    }
}

if ($errors !== []) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;

