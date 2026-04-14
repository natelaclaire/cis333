<?php
$projectRoot = __DIR__ . '/../starter-files';

$indexFile = $projectRoot . '/public/index.php';
$viewerFile = $projectRoot . '/app/views/pages/contact-submissions.php';

$errors = [];

if (!is_file($viewerFile)) {
    $errors[] = 'Missing viewer page: app/views/pages/contact-submissions.php';
} else {
    $php = (string) file_get_contents($viewerFile);
    // Require it to reference the TSV file path in some way.
    if (stripos($php, 'contacts.tsv') === false && stripos($php, 'dataFilePath') === false) {
        $errors[] = 'contact-submissions.php should read contacts.tsv (directly or via dataFilePath())';
    }
    // Require some escaping usage.
    if (stripos($php, 'htmlspecialchars') === false && stripos($php, 'h(') === false) {
        $errors[] = 'contact-submissions.php must escape values before output (htmlspecialchars or h())';
    }
    // Require table markup.
    if (stripos($php, '<table') === false) {
        $errors[] = 'contact-submissions.php should render a table of submissions';
    }
}

if (!is_file($indexFile)) {
    $errors[] = 'Missing front controller: public/index.php';
} else {
    $php = (string) file_get_contents($indexFile);
    if (stripos($php, "case 'contact-submissions'") === false && stripos($php, 'contact-submissions.php') === false) {
        $errors[] = 'public/index.php must route a contact-submissions page';
    }
}

if ($errors !== []) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;

