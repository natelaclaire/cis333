<?php
$pageTitle = 'Strings as Arrays of Characters';

require_once __DIR__ . '/../data.php';
require_once __DIR__ . '/../lib/functions.php';
require_once __DIR__ . '/../partials/header.php';
?>

<p><a href="../index.php">Home</a></p>

<p>This page generates a short code for each club using string indexing.</p>

<h2>Club Codes</h2>
<ul>
<?php foreach ($clubsById as $clubId => $clubName): ?>
    <li><?php print clubCode($clubName) . ' - ' . $clubName; ?></li>
<?php endforeach; ?>
</ul>

<?php
require_once __DIR__ . '/../partials/footer.php';
