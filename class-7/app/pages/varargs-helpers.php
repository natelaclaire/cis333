<?php
$pageTitle = 'Varargs Helpers';

require_once __DIR__ . '/../data.php';
require_once __DIR__ . '/../lib/functions.php';
require_once __DIR__ . '/../partials/header.php';
?>

<p><a href="../index.php">Home</a></p>

<p>This page uses a custom helper with a variable number of arguments.</p>

<h2>Clubs (Rendered with htmlList)</h2>
<?php print htmlList(...array_values($clubsById)); ?>

<h2>Two Featured Clubs (Passing Individual Arguments)</h2>
<?php print htmlList($clubsById['robotics'], $clubsById['cyber']); ?>

<?php
require_once __DIR__ . '/../partials/footer.php';
