<?php
$projectRoot = __DIR__ . '/../starter-files';

$pageFile = $projectRoot . '/app/content/pages/privacy-policy.md';
$configFile = $projectRoot . '/app/config/config.yml';

$errors = [];

if (!is_file($pageFile)) {
    $errors[] = 'Missing markdown page: app/content/pages/privacy-policy.md';
} else {
    $md = (string) file_get_contents($pageFile);
    if (strpos($md, "---\n") !== 0) {
        $errors[] = 'privacy-policy.md must start with YAML front matter (---)';
    }
    foreach (['title:', 'description:', 'robots:'] as $needle) {
        if (stripos($md, $needle) === false) {
            $errors[] = "privacy-policy.md front matter must include {$needle}";
        }
    }
}

if (!is_file($configFile)) {
    $errors[] = 'Missing config file: app/config/config.yml';
} else {
    $yml = (string) file_get_contents($configFile);
    if (strpos($yml, 'privacy-policy') === false) {
        $errors[] = 'config.yml nav must include a privacy-policy entry';
    }
}

if ($errors !== []) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;

