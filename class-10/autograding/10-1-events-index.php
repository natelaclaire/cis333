<?php
$projectRoot = __DIR__ . '/../starter-files/event-directory';
$studentFile = $projectRoot . '/app/views/pages/ex-events-index.php';

if (!file_exists($studentFile)) {
    print 'Missing file: ex-events-index.php' . PHP_EOL;
    exit(1);
}

$dataFile = $projectRoot . '/app/storage/data.json';
$seed = [
    'events' => [
        [
            'id' => 'e_test1',
            'title' => '<script>alert(1)</script>',
            'description' => 'desc',
            'eventDate' => '2026-04-01',
            'category' => 'tech',
            'format' => 'online',
            'featured' => true,
            'tags' => ['free', 'beginner'],
        ],
    ],
];
file_put_contents($dataFile, json_encode($seed, JSON_PRETTY_PRINT) . PHP_EOL);

$_GET = [];
ob_start();
require $studentFile;
$output = ob_get_clean();

$errors = [];

if (strpos($output, '<script>alert(1)</script>') !== false) {
    $errors[] = 'title must be HTML-escaped (raw <script> tag found)';
}
if (strpos($output, '&lt;script&gt;alert(1)&lt;/script&gt;') === false) {
    $errors[] = 'expected escaped title (&lt;script&gt;...) not found';
}
if (strpos($output, '/ex/events/edit?id=') === false) {
    $errors[] = 'missing Edit link to /ex/events/edit?id=...';
}

if (!empty($errors)) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;

