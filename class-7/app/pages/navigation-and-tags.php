<?php
$pageTitle = 'foreach, Keys/Values, and implode()';

require_once __DIR__ . '/../data.php';
require_once __DIR__ . '/../partials/header.php';

$navLinks = [
    'Home' => '../index.php',
    'Featured' => 'featured.php',
    'Array Info' => 'array-info.php',
    'This Page' => 'navigation-and-tags.php',
];

$clubNames = array_values($clubsById);
$isClubsList = array_is_list($clubNames);
?>

<p><a href="../index.php">Home</a></p>

<h2>Navigation (Associative Array)</h2>
<ul>
<?php foreach ($navLinks as $label => $href): ?>
    <li><a href="<?php print $href; ?>"><?php print $label; ?></a></li>
<?php endforeach; ?>
</ul>

<h2>Looping Through a List</h2>
<p><?php print 'array_is_list($clubNames): ' . ($isClubsList ? 'true' : 'false'); ?></p>

<h3>Using a for Loop (Indexes)</h3>
<ul>
<?php if ($isClubsList): ?>
    <?php for ($i = 0; $i < count($clubNames); $i++): ?>
        <li><?php print 'i=' . $i . ' club=' . $clubNames[$i]; ?></li>
    <?php endfor; ?>
<?php endif; ?>
</ul>

<h3>Using foreach (Values)</h3>
<ul>
<?php foreach ($clubNames as $clubName): ?>
    <li><?php print $clubName; ?></li>
<?php endforeach; ?>
</ul>

<h2>Keys and Values + implode()</h2>
<p>Here we loop through the tags map and print a comma-separated list of tags.</p>

<ul>
<?php foreach ($clubTagsById as $clubId => $tags): ?>
    <li>
        <?php print $clubsById[$clubId] . ' tags: ' . implode(', ', $tags); ?>
    </li>
<?php endforeach; ?>
</ul>

<?php
require_once __DIR__ . '/../partials/footer.php';
