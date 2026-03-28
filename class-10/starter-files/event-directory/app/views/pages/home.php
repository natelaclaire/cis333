<?php
$pageTitle = 'Class 10 Exercises: Event Directory';

require_once __DIR__ . '/../../lib/functions.php';
require_once __DIR__ . '/../partials/header.php';
?>

<p>
    This folder contains the starter project for the Class 10 reinforcement exercises.
    All exercises build a single web app: a simple <strong>Event Directory</strong>.
</p>

<div class="alert alert-info">
    <strong>Routes are pre-defined.</strong> Do not edit <code>public/router.php</code>.
</div>

<h2 class="h5">Start Here</h2>
<ul>
    <li><a href="/ex/events">Events list</a></li>
    <li><a href="/ex/events/new">New event form</a></li>
</ul>

<?php
require_once __DIR__ . '/../partials/footer.php';

