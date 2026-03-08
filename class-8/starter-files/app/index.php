<?php
$pageTitle = 'Class 8 Reinforcement Exercises';

require_once __DIR__ . '/lib/functions.php';

$notesDir = __DIR__ . '/storage/notes';
ensureDirExists($notesDir);

require_once __DIR__ . '/partials/header.php';
?>

<p>Each exercise lives in <code>app/pages/</code>.</p>

<ul>
    <li><a href="pages/8-1-safe-note-path.php">Exercise 8-1: Safe note path</a></li>
    <li><a href="pages/8-2-note-stats.php">Exercise 8-2: Note stats (file)</a></li>
    <li><a href="pages/8-3-append-activity-log.php">Exercise 8-3: Append activity log (fopen/fwrite)</a></li>
    <li><a href="pages/8-4-archive-note.php">Exercise 8-4: Archive note (rename)</a></li>
    <li><a href="pages/8-5-json-metadata.php">Exercise 8-5: JSON metadata (json_encode/json_decode)</a></li>
</ul>

<?php
require_once __DIR__ . '/partials/footer.php';

