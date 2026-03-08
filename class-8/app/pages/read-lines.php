<?php
$pageTitle = 'Read a File into an Array (file)';

require_once __DIR__ . '/../lib/functions.php';
require_once __DIR__ . '/../partials/header.php';

$notesDir = __DIR__ . '/../storage/notes';
ensureDirExists($notesDir);

$filePath = $notesDir . '/todo.txt';
ensureFileExists($filePath, "Example item\n");

$lines = file($filePath, FILE_IGNORE_NEW_LINES);
if ($lines === false) {
    $lines = [];
}

$items = [];
foreach ($lines as $line) {
    $line = trim($line);
    if ($line === '') {
        continue;
    }

    $items[] = $line;
}
?>

<p><a href="../index.php">Home</a></p>

<p>This page reads a text file into an array of lines and then filters out blank lines.</p>

<h2>Source File</h2>
<p><code><?php print htmlspecialchars($filePath, ENT_QUOTES, 'UTF-8'); ?></code></p>

<h2>Items</h2>
<ul>
<?php foreach ($items as $item): ?>
    <li><?php print htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?></li>
<?php endforeach; ?>
</ul>

<?php
require_once __DIR__ . '/../partials/footer.php';

