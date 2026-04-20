<?php
$projectRoot = __DIR__ . '/../starter-files';

$faqsFile = $projectRoot . '/app/content/pages/faqs.md';
$headerFile = $projectRoot . '/app/views/partials/header.php';

$errors = [];

if (!is_file($faqsFile)) {
    $errors[] = 'Missing file: app/content/pages/faqs.md';
} else {
    $md = (string) file_get_contents($faqsFile);
    if (stripos($md, 'twitterCard:') === false) {
        $errors[] = 'faqs.md must include twitterCard in YAML front matter';
    }
}

if (!is_file($headerFile)) {
    $errors[] = 'Missing file: app/views/partials/header.php';
} else {
    $php = (string) file_get_contents($headerFile);
    if (stripos($php, 'twitter:card') === false) {
        $errors[] = 'header.php must output a meta tag for twitter:card when twitterCard is present';
    }
    // Basic "escape is used" check.
    if (stripos($php, 'htmlspecialchars') === false && stripos($php, 'htmlentities') === false) {
        $errors[] = 'header.php should escape metadata values when printing tags';
    }
}

if ($errors !== []) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;

