<?php
$pageTitle = 'Campus Club Directory';

require_once __DIR__ . '/data.php';
require_once __DIR__ . '/partials/header.php';
?>

<p>This week, our data lives in PHP arrays. No forms yet.</p>

<p><a href="pages/featured.php">Featured clubs (array updates)</a></p>
<p><a href="pages/array-info.php">Array info and safe access</a></p>
<p><a href="pages/navigation-and-tags.php">foreach, keys/values, and implode</a></p>
<p><a href="pages/varargs-helpers.php">Varargs helper functions</a></p>
<p><a href="pages/array-copies-vs-references.php">Array copies vs references</a></p>
<p><a href="pages/club-codes.php">Strings as arrays (club codes)</a></p>
<p><a href="pages/schedule.php">Meeting schedule (multidimensional arrays)</a></p>
<p><a href="pages/operations-remove-combine-compare.php">Remove/combine/compare arrays</a></p>
<p><a href="pages/callbacks-map-filter-sort.php">Callbacks: map/filter/sort</a></p>

<h2>Clubs</h2>
<ul>
<?php foreach ($clubsById as $clubId => $clubName): ?>
    <li><?php print $clubId . ': ' . $clubName; ?></li>
<?php endforeach; ?>
</ul>

<?php
require_once __DIR__ . '/partials/footer.php';
