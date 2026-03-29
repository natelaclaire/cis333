<?php
$pageTitle = 'New Event';

require_once __DIR__ . '/../../lib/functions.php';

$missing = getString('missing') === '1';

require_once __DIR__ . '/../partials/header.php';
?>

<?php if ($missing) : ?>
    <div class="alert alert-warning">
        Please provide at least a title and an event date.
        (We will cover proper validation and sticky forms next week.)
    </div>
<?php endif; ?>

<?php
// TODO (Exercise 10-2):
// Build a form that submits via POST to /ex/events/create.
//
// Include these inputs (with correct name attributes):
// - text: title
// - email: contactEmail
// - textarea: description
// - date: eventDate
// - select: category
// - radio: format
// - checkbox: featured
// - checkbox array: tags[]
?>

<form method="post" action="/ex/events/create" class="card card-body">
    <p class="text-muted mb-0">
        TODO: build the new event form here.
    </p>
</form>

<?php
require_once __DIR__ . '/../partials/footer.php';
