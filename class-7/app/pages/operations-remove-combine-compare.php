<?php
$pageTitle = 'Remove, Combine, Compare Arrays';

require_once __DIR__ . '/../data.php';
require_once __DIR__ . '/../partials/header.php';

// Removing any element: unset
$categoriesCopy = $categories;
unset($categoriesCopy['games']);

// Combining arrays: spread operator
$tech = $categories['technology'];
$creative = $categories['creative'];
$combined = [...$tech, ...$creative];
sort($combined);

// Comparing arrays: set-style checks
$allowedClubIds = ['robotics', 'chess', 'art'];
$scheduledClubIds = array_keys($meetingsByClubId);

$scheduledButNotAllowed = array_diff($scheduledClubIds, $allowedClubIds);
$allowedButNotScheduled = array_diff($allowedClubIds, $scheduledClubIds);
?>

<p><a href="../index.php">Home</a></p>

<h2>Removing an Element with unset()</h2>
<p>Original categories keys: <?php print implode(', ', array_keys($categories)); ?></p>
<p>After unset: <?php print implode(', ', array_keys($categoriesCopy)); ?></p>

<h2>Combining Arrays with the Spread Operator</h2>
<p><?php print 'Combined club IDs: ' . implode(', ', $combined); ?></p>

<h2>Comparing Arrays (Differences)</h2>
<p><?php print 'Allowed club IDs: ' . implode(', ', $allowedClubIds); ?></p>
<p><?php print 'Scheduled club IDs: ' . implode(', ', $scheduledClubIds); ?></p>

<ul>
    <li><?php print 'Scheduled but not allowed: ' . (empty($scheduledButNotAllowed) ? '(none)' : implode(', ', $scheduledButNotAllowed)); ?></li>
    <li><?php print 'Allowed but not scheduled: ' . (empty($allowedButNotScheduled) ? '(none)' : implode(', ', $allowedButNotScheduled)); ?></li>
</ul>

<?php
require_once __DIR__ . '/../partials/footer.php';

