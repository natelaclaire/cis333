<?php
$projectRoot = __DIR__ . '/../starter-files/event-directory';
$studentFile = $projectRoot . '/app/views/pages/ex-events-delete.php';

if (!file_exists($studentFile)) {
    print 'Missing file: ex-events-delete.php' . PHP_EOL;
    exit(1);
}

$dataFile = $projectRoot . '/app/storage/data.json';
$seed = [
    'events' => [
        [
            'id' => 'e_test3',
            'title' => 'Delete Me',
            'description' => '',
            'eventDate' => '2026-04-05',
            'category' => 'arts',
            'format' => 'online',
            'featured' => false,
            'tags' => [],
        ],
    ],
];
file_put_contents($dataFile, json_encode($seed, JSON_PRETTY_PRINT) . PHP_EOL);

$errors = [];

// Method guard check.
$_SERVER['REQUEST_METHOD'] = 'GET';
$_POST = ['id' => 'e_test3'];
ob_start();
$result = require $studentFile;
$out = ob_get_clean();

if (http_response_code() !== 405) {
    $errors[] = 'delete handler must return 405 for non-POST requests';
}
if (strpos($out, 'Method Not Allowed') === false) {
    $errors[] = 'delete handler must print Method Not Allowed for non-POST requests';
}

// Now delete via POST.
$_SERVER['REQUEST_METHOD'] = 'POST';
$_POST = ['id' => 'e_test3'];
$result = require $studentFile;

if ($result !== '/ex/events?deleted=1') {
    $errors[] = 'delete handler must redirect to /ex/events?deleted=1 (use redirectTo(..., 303))';
}

$decoded = json_decode((string) file_get_contents($dataFile), true);
$events = is_array($decoded) ? ($decoded['events'] ?? null) : null;
if (!is_array($events) || count($events) !== 0) {
    $errors[] = 'after delete, data.json must contain 0 events';
}

if (!empty($errors)) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;

