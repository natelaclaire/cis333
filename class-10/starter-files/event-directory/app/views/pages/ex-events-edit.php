<?php
$pageTitle = 'Edit Event';

require_once __DIR__ . '/../../lib/storage.php';

$id = getString('id');
if ($id === '') {
    http_response_code(400);
    header('Content-Type: text/plain; charset=UTF-8');
    print 'Missing event id.' . "\n";
    exit;
}

$data = loadData();
$events = $data['events'];

$event = null;
foreach ($events as $e) {
    if (is_array($e) && ($e['id'] ?? null) === $id) {
        $event = $e;
        break;
    }
}

if (!is_array($event)) {
    http_response_code(404);
    header('Content-Type: text/plain; charset=UTF-8');
    print 'Event not found.' . "\n";
    exit;
}

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
// TODO (Exercise 10-4):
// - Extract values from $event and pre-fill the form fields.
// - Include all the same inputs as the "new event" form.
// - Submit via POST to /ex/events/update.
?>

<form method="post" action="/ex/events/update" class="card card-body">
    <input type="hidden" name="id" value="<?php print h($id); ?>">
    <p class="text-muted mb-0">
        TODO: build the edit event form here (pre-filled from JSON).
    </p>
</form>

<form
    method="post"
    action="/ex/events/delete"
    class="mt-3"
    onsubmit="return confirm('Delete this event? This cannot be undone.');"
>
    <input type="hidden" name="id" value="<?php print h($id); ?>">
    <button class="btn btn-outline-danger" type="submit">Delete event</button>
</form>

<?php
require_once __DIR__ . '/../partials/footer.php';
