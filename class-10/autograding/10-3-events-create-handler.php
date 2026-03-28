<?php
$projectRoot = __DIR__ . '/../starter-files/event-directory';
$studentFile = $projectRoot . '/app/views/pages/ex-events-create.php';

if (!file_exists($studentFile)) {
    print 'Missing file: ex-events-create.php' . PHP_EOL;
    exit(1);
}

$dataFile = $projectRoot . '/app/storage/data.json';
file_put_contents($dataFile, json_encode(['events' => []], JSON_PRETTY_PRINT) . PHP_EOL);

$_SERVER['REQUEST_METHOD'] = 'POST';
$_POST = [
    'title' => 'PHP Meetup',
    'description' => 'A meetup about PHP.',
    'eventDate' => '2026-04-02',
    'category' => 'tech',
    'format' => 'in_person',
    'featured' => '1',
    'tags' => ['free', 'networking'],
];

$result = require $studentFile;

$decoded = json_decode((string) file_get_contents($dataFile), true);
$events = is_array($decoded) ? ($decoded['events'] ?? null) : null;

$errors = [];

if ($result !== '/ex/events?created=1') {
    $errors[] = 'create handler must redirect to /ex/events?created=1 (use redirectTo(..., 303))';
}

if (!is_array($events) || count($events) !== 1) {
    $errors[] = 'data.json must contain exactly 1 event after create';
} else {
    $event = $events[0];
    if (!is_array($event)) {
        $errors[] = 'saved event must be an array';
    } else {
        if (!is_string($event['id'] ?? null) || $event['id'] === '') {
            $errors[] = 'saved event must include a non-empty id';
        }
        if (($event['title'] ?? null) !== 'PHP Meetup') {
            $errors[] = 'saved event title mismatch';
        }
        if (($event['eventDate'] ?? null) !== '2026-04-02') {
            $errors[] = 'saved event eventDate mismatch';
        }
        if (($event['featured'] ?? null) !== true) {
            $errors[] = 'saved event featured must be boolean true when checkbox checked';
        }
        $tags = $event['tags'] ?? null;
        if (!is_array($tags) || $tags === []) {
            $errors[] = 'saved event tags must be a non-empty array';
        }
    }
}

if (!empty($errors)) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;

