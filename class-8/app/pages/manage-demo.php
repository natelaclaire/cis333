<?php
$pageTitle = 'Manage Files and Directories';

require_once __DIR__ . '/../lib/functions.php';
require_once __DIR__ . '/../partials/header.php';

$notesDir = __DIR__ . '/../storage/notes';
ensureDirExists($notesDir);

$source = $notesDir . '/welcome.txt';
ensureFileExists($source, "Welcome to Class 8.\n");

$copy = $notesDir . '/welcome-copy.txt';
$renamed = $notesDir . '/welcome-renamed.txt';

$messages = [];

if (copy($source, $copy)) {
    $messages[] = 'copied welcome.txt to welcome-copy.txt';
} else {
    $messages[] = 'copy failed';
}

if (file_exists($renamed)) {
    unlink($renamed);
}

if (rename($copy, $renamed)) {
    $messages[] = 'renamed welcome-copy.txt to welcome-renamed.txt';
} else {
    $messages[] = 'rename failed';
}

if (is_file($renamed) && unlink($renamed)) {
    $messages[] = 'deleted welcome-renamed.txt';
} else {
    $messages[] = 'delete failed (or file missing)';
}

$tempDir = $notesDir . '/tmp';
ensureDirExists($tempDir);
$messages[] = 'ensured tmp directory exists';

// Only remove tmp if it is empty.
$tmpEntries = array_values(array_diff(scandir($tempDir) ?: [], ['.', '..']));
if (count($tmpEntries) === 0) {
    if (rmdir($tempDir)) {
        $messages[] = 'removed empty tmp directory';
    } else {
        $messages[] = 'rmdir failed';
    }
} else {
    $messages[] = 'tmp not empty; skipped rmdir';
}
?>

<p><a href="../index.php">Home</a></p>

<p>This page demonstrates basic file/directory management.</p>

<h2>Actions</h2>
<ul>
<?php foreach ($messages as $message): ?>
    <li><?php print htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></li>
<?php endforeach; ?>
</ul>

<?php
require_once __DIR__ . '/../partials/footer.php';

