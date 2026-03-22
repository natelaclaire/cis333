<?php
$pageTitle = 'Array Info and Safe Access';

require_once __DIR__ . '/../data.php';
require_once __DIR__ . '/../partials/header.php';

$numClubs = count($clubsById);
$firstKey = array_key_first($clubsById);
$lastKey = array_key_last($clubsById);

$maybeKey = 10;
$hasKeyIsset = isset($clubsById[$maybeKey]);
$hasKeyArrayKeyExists = array_key_exists($maybeKey, $clubsById);
?>

<p><a href="../index.php">Home</a></p>

<h2>Array Information</h2>
<ul>
    <li><?php print 'count: ' . $numClubs; ?></li>
    <li><?php print 'first key: ' . $firstKey; ?></li>
    <li><?php print 'last key: ' . $lastKey; ?></li>
</ul>

<h2>Safe Access</h2>
<p>
    <?php print 'Testing key ' . $maybeKey . ':'; ?>
</p>
<ul>
    <li><?php print 'isset: ' . ($hasKeyIsset ? 'true' : 'false'); ?></li>
    <li><?php print 'array_key_exists: ' . ($hasKeyArrayKeyExists ? 'true' : 'false'); ?></li>
</ul>

<?php if (array_key_exists($maybeKey, $clubsById)): ?>
    <p><?php print 'value: ' . $clubsById[$maybeKey]; ?></p>
<?php else: ?>
    <p><?php print 'value: (none)'; ?></p>
<?php endif; ?>

<?php
require_once __DIR__ . '/../partials/footer.php';
