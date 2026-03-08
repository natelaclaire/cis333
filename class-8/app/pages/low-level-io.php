<?php
$pageTitle = 'Lower-Level File I/O (fopen/fwrite/fread)';

require_once __DIR__ . '/../lib/functions.php';
require_once __DIR__ . '/../partials/header.php';

$notesDir = __DIR__ . '/../storage/notes';
ensureDirExists($notesDir);

$filePath = $notesDir . '/low-level-log.txt';

$handle = fopen($filePath, 'a');
if ($handle !== false) {
    fwrite($handle, 'Log entry at ' . date('Y-m-d H:i:s') . PHP_EOL);
    fclose($handle);
}

$contents = '';
$readHandle = fopen($filePath, 'r');
if ($readHandle !== false) {
    $contents = fread($readHandle, 4096);
    if ($contents === false) {
        $contents = '';
    }
    fclose($readHandle);
}
?>

<p><a href="../index.php">Home</a></p>

<p>This page appends a line using <code>fopen()</code> and <code>fwrite()</code>, then reads a chunk with <code>fread()</code>.</p>

<h2>File</h2>
<p><code><?php print htmlspecialchars($filePath, ENT_QUOTES, 'UTF-8'); ?></code></p>

<h2>First 4096 Bytes</h2>
<pre><?php print htmlspecialchars($contents, ENT_QUOTES, 'UTF-8'); ?></pre>

<?php
require_once __DIR__ . '/../partials/footer.php';

