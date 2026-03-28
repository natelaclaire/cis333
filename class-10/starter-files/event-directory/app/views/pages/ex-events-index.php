<?php
$pageTitle = 'Events';

require_once __DIR__ . '/../../lib/storage.php';

$data = loadData();
$events = $data['events'];

$created = getString('created') === '1';
$updated = getString('updated') === '1';
$deleted = getString('deleted') === '1';

require_once __DIR__ . '/../partials/header.php';
?>

<?php if ($created) : ?>
    <div class="alert alert-success">Event created.</div>
<?php endif; ?>

<?php if ($updated) : ?>
    <div class="alert alert-success">Event updated.</div>
<?php endif; ?>

<?php if ($deleted) : ?>
    <div class="alert alert-success">Event deleted.</div>
<?php endif; ?>

<div class="d-flex align-items-center justify-content-between mb-3">
    <p class="mb-0 text-muted">
        Total events: <?php print count($events); ?>
    </p>
    <a class="btn btn-primary" href="/ex/events/new">New event</a>
</div>

<?php
// TODO (Exercise 10-1):
// - If there are no events, show an empty-state message.
// - Otherwise, render a table of events.
// - Escape user-provided strings with h() when printing into HTML.
?>

<?php if ($events === []) : ?>
    <div class="alert alert-secondary">
        No events yet. Click <strong>New event</strong> to add one.
    </div>
<?php else : ?>
    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead>
            <tr>
                <th>Title</th>
                <th>Date</th>
                <th>Category</th>
                <th>Format</th>
                <th>Featured</th>
                <th>Tags</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($events as $event) : ?>
                <?php
                // TODO (Exercise 10-1): Extract safe values from $event and render them.
                // Recommended keys:
                // - id (string)
                // - title (string)
                // - eventDate (string)
                // - category (string)
                // - format (string)
                // - featured (bool)
                // - tags (array of strings)
                ?>
                <tr>
                    <td><?php print h('TODO'); ?></td>
                    <td><?php print h('TODO'); ?></td>
                    <td><?php print h('TODO'); ?></td>
                    <td><?php print h('TODO'); ?></td>
                    <td><?php print h('TODO'); ?></td>
                    <td><?php print h('TODO'); ?></td>
                    <td class="text-end">
                        <?php
                        // TODO (Exercise 10-1): Add an Edit link to /ex/events/edit?id=...
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>

<?php
require_once __DIR__ . '/../partials/footer.php';

