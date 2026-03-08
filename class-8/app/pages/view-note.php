<?php
$pageTitle = 'View Notes Safely';

require_once __DIR__ . '/../lib/functions.php';

$notesDir = __DIR__ . '/../storage/notes';
ensureDirExists($notesDir);

$noteFiles = glob($notesDir . '/*.txt');
$noteFiles = $noteFiles === false ? [] : $noteFiles;

$noteNames = array_map('basename', $noteFiles);
sort($noteNames, SORT_NATURAL | SORT_FLAG_CASE);

$requested = $_GET['note'] ?? '';
$requested = is_string($requested) ? $requested : '';
$requested = basename($requested);

$selected = '';
$noteText = '';
$error = '';

if ($requested !== '') {
    // Allowlist approach: only let the user request notes that we discovered on disk.
    if (!in_array($requested, $noteNames, true)) {
        $error = 'Unknown note.';
    } else {
        $candidatePath = $notesDir . '/' . $requested;
        $notesDirReal = realpath($notesDir);
        $candidateReal = realpath($candidatePath);

        // realpath() returns false if the path doesn't exist, but we are defensive anyway.
        if ($notesDirReal === false || $candidateReal === false) {
            $error = 'Could not resolve note path.';
        } elseif (!str_starts_with($candidateReal, $notesDirReal . DIRECTORY_SEPARATOR)) {
            // Defense-in-depth: ensures the resolved path stays inside the notes directory.
            $error = 'Blocked an unsafe path.';
        } else {
            $contents = file_get_contents($candidateReal);
            $noteText = $contents === false ? '' : $contents;
            $selected = $requested;
        }
    }
}

require_once __DIR__ . '/../partials/header.php';
?>

<p><a href="../index.php">Home</a></p>

<p>
    This page demonstrates safe path handling when selecting a file to read. The key ideas are:
    use an allowlist of known filenames, and avoid trusting user input in file paths.
</p>

<h2>Available Notes</h2>

<?php if ($noteNames === []) : ?>
    <p>No notes found.</p>
<?php else : ?>
    <ul>
        <?php foreach ($noteNames as $name) : ?>
            <li>
                <a href="view-note.php?note=<?php print urlencode($name); ?>">
                    <?php print htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php if ($error !== '') : ?>
    <p><strong><?php print htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></strong></p>
<?php endif; ?>

<?php if ($selected !== '') : ?>
    <h2>Note: <?php print htmlspecialchars($selected, ENT_QUOTES, 'UTF-8'); ?></h2>
    <pre><?php print htmlspecialchars($noteText, ENT_QUOTES, 'UTF-8'); ?></pre>
<?php endif; ?>

<?php
require_once __DIR__ . '/../partials/footer.php';

