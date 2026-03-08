<?php
$pageTitle = 'Write Demo (file_put_contents)';

require_once __DIR__ . '/../lib/functions.php';
require_once __DIR__ . '/../partials/header.php';

$notesDir = __DIR__ . '/../storage/notes';
ensureDirExists($notesDir);

$noteFile = $notesDir . '/log.txt';

// Overwrite the file with a fresh header.
$header = 'Log start: ' . date('Y-m-d H:i:s') . PHP_EOL;
file_put_contents($noteFile, $header);

// Append a few lines.
file_put_contents($noteFile, 'Event: opened write-demo page' . PHP_EOL, FILE_APPEND);
file_put_contents($noteFile, 'Event: appended a second line' . PHP_EOL, FILE_APPEND);

$text = file_get_contents($noteFile);
$text = $text === false ? '' : $text;
?>

<p><a href="../index.php">Home</a></p>

<p>This page demonstrates writing a text file by overwriting and appending.</p>

<h2>File</h2>
<p><code><?php print htmlspecialchars($noteFile, ENT_QUOTES, 'UTF-8'); ?></code></p>

<h2>Contents</h2>
<pre><?php print htmlspecialchars($text, ENT_QUOTES, 'UTF-8'); ?></pre>

<?php
require_once __DIR__ . '/../partials/footer.php';

