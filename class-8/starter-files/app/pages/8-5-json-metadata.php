<?php
// Exercise 8-5: JSON Metadata (json_encode + json_decode)
//
// Goal: Load structured JSON data into a PHP array, update it, then save it.
//
// Instructions:
// 1) Implement loadJsonAssoc() below.
//    - Read the file with file_get_contents().
//    - Decode with json_decode($json, true).
//    - Return an array (return [] on failure).
// 2) Implement saveJsonAssoc() below.
//    - Encode with json_encode(..., JSON_PRETTY_PRINT).
//    - Write with file_put_contents(..., LOCK_EX).
//    - Return true on success, false on failure.
//
// Expected output:
// ok: yes
// count: 2
// first: todo.txt|To Do

require_once __DIR__ . '/../lib/functions.php';

$tmpDir = __DIR__ . '/../storage/_tmp';
ensureDirExists($tmpDir);

$metadataPath = $tmpDir . '/metadata.json';

$initial = [
    'notes' => [
        [
            'filename' => 'welcome.txt',
            'title' => 'Welcome',
        ],
    ],
];
file_put_contents($metadataPath, json_encode($initial, JSON_PRETTY_PRINT) . "\n", LOCK_EX);

function loadJsonAssoc(string $filePath): array
{
    // TODO: Implement per instructions.
    return [];
}

function saveJsonAssoc(string $filePath, array $data): bool
{
    // TODO: Implement per instructions.
    return false;
}

$metadata = loadJsonAssoc($metadataPath);
if (!isset($metadata['notes']) || !is_array($metadata['notes'])) {
    $metadata['notes'] = [];
}

$metadata['notes'][] = [
    'filename' => 'todo.txt',
    'title' => 'To Do',
];

usort(
    $metadata['notes'],
    function (array $a, array $b): int {
        return ($a['filename'] ?? '') <=> ($b['filename'] ?? '');
    }
);

$ok = saveJsonAssoc($metadataPath, $metadata);
$reloaded = loadJsonAssoc($metadataPath);

$count = isset($reloaded['notes']) && is_array($reloaded['notes']) ? count($reloaded['notes']) : 0;
$first = $reloaded['notes'][0] ?? [];

print 'ok: ' . ($ok ? 'yes' : 'no') . PHP_EOL;
print 'count: ' . $count . PHP_EOL;
print 'first: ' . ($first['filename'] ?? '') . '|' . ($first['title'] ?? '') . PHP_EOL;

