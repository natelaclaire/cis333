<?php
$pageTitle = 'JSON Notes Metadata';

require_once __DIR__ . '/../lib/functions.php';

$notesDir = __DIR__ . '/../storage/notes';
ensureDirExists($notesDir);

$filePath = $notesDir . '/metadata.json';

$metadata = [
    'app' => 'Class 8 Notes',
    'updatedAt' => date('c'),
    'notes' => [
        [
            'filename' => 'welcome.txt',
            'title' => 'Welcome',
            'tags' => ['intro', 'files'],
        ],
        [
            'filename' => 'todo.txt',
            'title' => 'To Do',
            'tags' => ['tasks'],
        ],
    ],
];

$json = json_encode($metadata, JSON_PRETTY_PRINT);
$encodeError = $json === false ? json_last_error_msg() : '';

$bytesWritten = false;
if ($json !== false) {
    // LOCK_EX helps prevent two requests from writing at the same time.
    $bytesWritten = file_put_contents($filePath, $json . "\n", LOCK_EX);
}

$jsonFromFile = file_get_contents($filePath);
$jsonFromFile = $jsonFromFile === false ? '' : $jsonFromFile;

$decoded = json_decode($jsonFromFile, true);
$decodeError = json_last_error() === JSON_ERROR_NONE ? '' : json_last_error_msg();
if (!is_array($decoded)) {
    $decoded = [];
}

require_once __DIR__ . '/../partials/header.php';
?>

<p><a href="../index.php">Home</a></p>

<p>This page writes a PHP array to JSON and reads it back into a PHP array.</p>

<h2>File</h2>
<p><code><?php print htmlspecialchars($filePath, ENT_QUOTES, 'UTF-8'); ?></code></p>

<h2>Status</h2>
<ul>
    <li>json_encode(): <?php print $encodeError === '' ? 'ok' : htmlspecialchars($encodeError, ENT_QUOTES, 'UTF-8'); ?></li>
    <li>file_put_contents(): <?php print $bytesWritten === false ? 'failed' : 'wrote ' . (int) $bytesWritten . ' bytes'; ?></li>
    <li>json_decode(): <?php print $decodeError === '' ? 'ok' : htmlspecialchars($decodeError, ENT_QUOTES, 'UTF-8'); ?></li>
</ul>

<h2>JSON</h2>
<pre><?php print htmlspecialchars($jsonFromFile, ENT_QUOTES, 'UTF-8'); ?></pre>

<h2>Decoded</h2>
<pre><?php var_dump($decoded); ?></pre>

<?php
require_once __DIR__ . '/../partials/footer.php';
