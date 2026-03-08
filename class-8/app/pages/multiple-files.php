<?php
$pageTitle = 'Processing Multiple Files';

require_once __DIR__ . '/../lib/functions.php';
require_once __DIR__ . '/../partials/header.php';

$notesDir = __DIR__ . '/../storage/notes';
ensureDirExists($notesDir);

$pattern = $notesDir . '/*.txt';
$files = glob($pattern);
if ($files === false) {
    $files = [];
}

sort($files);

$summaries = [];
foreach ($files as $filePath) {
    $base = basename($filePath);

    $text = file_get_contents($filePath);
    if ($text === false) {
        $summaries[] = [
            'file' => $base,
            'size' => 0,
            'firstLine' => '(unreadable)',
        ];
        continue;
    }

    $lines = preg_split('/\\R/', trim($text)) ?: [];
    $firstLine = $lines[0] ?? '';

    $summaries[] = [
        'file' => $base,
        'size' => strlen($text),
        'firstLine' => $firstLine,
    ];
}
?>

<p><a href="../index.php">Home</a></p>

<p>This page uses <code>glob()</code> to find all <code>.txt</code> notes and then reads each one.</p>

<h2>Pattern</h2>
<p><code><?php print htmlspecialchars($pattern, ENT_QUOTES, 'UTF-8'); ?></code></p>

<h2>Notes</h2>
<ul>
<?php foreach ($summaries as $summary): ?>
    <li>
        <?php
        print htmlspecialchars($summary['file'], ENT_QUOTES, 'UTF-8')
            . ' ('
            . $summary['size']
            . ' bytes): '
            . htmlspecialchars($summary['firstLine'], ENT_QUOTES, 'UTF-8');
        ?>
    </li>
<?php endforeach; ?>
</ul>

<?php
require_once __DIR__ . '/../partials/footer.php';

