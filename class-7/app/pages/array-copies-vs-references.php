<?php
$pageTitle = 'Array Copies vs. References';

require_once __DIR__ . '/../data.php';
require_once __DIR__ . '/../partials/header.php';

$originalClubs = $clubsById;

$clubsCopy = $clubsById;
$clubsCopy[] = 'Film Club';

$clubsRef = &$clubsById;
$clubsRef[] = 'Math Club';
?>

<p><a href="../index.php">Home</a></p>

<h2>Copy</h2>
<p>Copies are independent. Updating the copy does not change the original.</p>
<ul>
    <li><?php print 'original count: ' . count($originalClubs); ?></li>
    <li><?php print 'copy count: ' . count($clubsCopy); ?></li>
</ul>

<h2>Reference</h2>
<p>References point to the same array. Updating the reference changes the original.</p>
<ul>
    <li><?php print 'original count before ref update: ' . count($originalClubs); ?></li>
    <li><?php print 'original count after ref update: ' . count($clubsById); ?></li>
    <li><?php print 'ref count: ' . count($clubsRef); ?></li>
</ul>

<h2>Why References Can Surprise You</h2>
<p>If you keep a reference around, you can mutate data in ways that are easy to miss.</p>

<?php
require_once __DIR__ . '/../partials/footer.php';
