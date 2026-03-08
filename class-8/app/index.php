<?php
$pageTitle = 'File-Based Notes Library';

require_once __DIR__ . '/lib/functions.php';

$notesDir = __DIR__ . '/storage/notes';
$noteFile = $notesDir . '/welcome.txt';

ensureDirExists($notesDir);
ensureFileExists(
    $noteFile,
    "Welcome to Class 8.\n\nThis week we are working with files and directories.\n"
);

$noteText = '';
if (is_file($noteFile)) {
    $contents = file_get_contents($noteFile);
    $noteText = $contents === false ? '' : $contents;
}

require_once __DIR__ . '/partials/header.php';
?>

<p>This page reads a sample note from disk using <code>file_get_contents()</code>.</p>

<p><a href="pages/write-demo.php">Write demo (file_put_contents)</a></p>

<h2>Sample Note: welcome.txt</h2>
<pre><?php print htmlspecialchars($noteText, ENT_QUOTES, 'UTF-8'); ?></pre>

<?php
require_once __DIR__ . '/partials/footer.php';
