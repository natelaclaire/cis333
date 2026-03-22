<?php
$pageTitle = 'Featured Clubs';

require_once __DIR__ . '/../data.php';
require_once __DIR__ . '/../partials/header.php';

// Start with an empty array and build it up.
$featuredClubs = [];

// Appending elements (two equivalent approaches).
$featuredClubs[] = $clubsById['robotics'];
$featuredClubs[] = $clubsById['cyber'];

// Append multiple elements at once.
array_push($featuredClubs, $clubsById['chess'], $clubsById['art']);

// Add an element with a specific key (explicit string key).
$featuredClubs['film'] = 'Film Club';

// Remove the last element (this removes the last value, regardless of key).
$removed = array_pop($featuredClubs);
?>

<p><a href="../index.php">Home</a></p>

<p>This page demonstrates updating arrays: append, append multiple values, set a
specific key, and remove the last element.</p>

<p>Removed last element: <strong><?php print $removed; ?></strong></p>

<h2>Featured Clubs</h2>
<ul>
<?php foreach ($featuredClubs as $key => $club): ?>
    <li><?php print $key . ': ' . $club; ?></li>
<?php endforeach; ?>
</ul>

<?php
require_once __DIR__ . '/../partials/footer.php';
