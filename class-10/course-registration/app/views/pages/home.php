<?php
$pageTitle = 'Class 10: Forms Basics';

require_once __DIR__ . '/../../lib/functions.php';
require_once __DIR__ . '/../partials/header.php';
?>

<p>
    This week we start building a course registration CRUD app.
    For now, this project focuses on form basics and request/response behavior.
</p>

<div class="alert alert-info">
    <strong>Note:</strong> We will cover validation and sticky forms in detail next week (Chapter 12).
</div>

<h2 class="h5">Try It</h2>
<ul>
    <li><a href="/debug/get">GET form demo</a> (query string and $_GET)</li>
    <li><a href="/debug/post">POST form demo</a> (request body and $_POST, plus PRG redirect)</li>
</ul>

<?php
require_once __DIR__ . '/../partials/footer.php';
