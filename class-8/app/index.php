<?php
$pageTitle = 'File-Based Notes Library';

$noteFile = __DIR__ . '/storage/notes/welcome.txt';
$noteText = file_get_contents($noteFile);

require_once __DIR__ . '/partials/header.php';
?>

<p>This page reads a sample note from disk using <code>file_get_contents()</code>.</p>

<h2>Sample Note: welcome.txt</h2>
<pre><?php print htmlspecialchars($noteText === false ? '' : $noteText, ENT_QUOTES, 'UTF-8'); ?></pre>

<?php
require_once __DIR__ . '/partials/footer.php';

