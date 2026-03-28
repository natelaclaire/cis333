<?php
$projectRoot = __DIR__ . '/../starter-files/event-directory';
$editFile = $projectRoot . '/app/views/pages/ex-events-edit.php';
$updateFile = $projectRoot . '/app/views/pages/ex-events-update.php';

if (!file_exists($editFile)) {
    print 'Missing file: ex-events-edit.php' . PHP_EOL;
    exit(1);
}
if (!file_exists($updateFile)) {
    print 'Missing file: ex-events-update.php' . PHP_EOL;
    exit(1);
}

$dataFile = $projectRoot . '/app/storage/data.json';
$seed = [
    'events' => [
        [
            'id' => 'e_test2',
            'title' => 'Old Title',
            'description' => 'Old desc',
            'eventDate' => '2026-04-03',
            'category' => 'community',
            'format' => 'online',
            'featured' => false,
            'tags' => ['beginner'],
        ],
    ],
];
file_put_contents($dataFile, json_encode($seed, JSON_PRETTY_PRINT) . PHP_EOL);

// Check that the edit page renders and includes the existing values somewhere.
$_GET = ['id' => 'e_test2'];
ob_start();
require $editFile;
$output = ob_get_clean();

$errors = [];

if (strpos($output, 'name="id"') === false || strpos($output, 'value="e_test2"') === false) {
    $errors[] = 'edit form must include a hidden id input with the event id value';
}
if (strpos($output, 'Old Title') === false) {
    $errors[] = 'edit page must be pre-filled with the existing title (Old Title not found in HTML)';
}

// Now simulate an update.
$_SERVER['REQUEST_METHOD'] = 'POST';
$_POST = [
    'id' => 'e_test2',
    'title' => 'New Title',
    'description' => 'New desc',
    'eventDate' => '2026-04-04',
    'category' => 'tech',
    'format' => 'in_person',
    // featured unchecked (missing)
    'tags' => ['free'],
];

$result = require $updateFile;

if ($result !== '/ex/events?updated=1') {
    $errors[] = 'update handler must redirect to /ex/events?updated=1 (use redirectTo(..., 303))';
}

$decoded = json_decode((string) file_get_contents($dataFile), true);
$events = is_array($decoded) ? ($decoded['events'] ?? null) : null;
if (!is_array($events) || count($events) !== 1) {
    $errors[] = 'after update, data.json must still contain exactly 1 event';
} else {
    $event = $events[0];
    if (($event['title'] ?? null) !== 'New Title') {
        $errors[] = 'event title was not updated';
    }
    if (($event['eventDate'] ?? null) !== '2026-04-04') {
        $errors[] = 'eventDate was not updated';
    }
    if (($event['featured'] ?? null) !== false) {
        $errors[] = 'featured should be boolean false when checkbox is unchecked/missing';
    }
}

if (!empty($errors)) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;

