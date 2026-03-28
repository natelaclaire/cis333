<?php
$pageTitle = 'Courses';

require_once __DIR__ . '/../../lib/storage.php';

$data = loadData();
$courses = $data['courses'];

$created = getString('created') === '1';
$updated = getString('updated') === '1';

require_once __DIR__ . '/../partials/header.php';
?>

<?php if ($created) : ?>
    <div class="alert alert-success">Course created.</div>
<?php endif; ?>

<?php if ($updated) : ?>
    <div class="alert alert-success">Course updated.</div>
<?php endif; ?>

<div class="d-flex align-items-center justify-content-between mb-3">
    <p class="mb-0 text-muted">
        Total courses: <?php print count($courses); ?>
    </p>
    <a class="btn btn-primary" href="/courses/new">New course</a>
</div>

<?php if ($courses === []) : ?>
    <div class="alert alert-secondary">
        No courses yet. Click <strong>New course</strong> to create one.
    </div>
<?php else : ?>
    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead>
            <tr>
                <th>Code</th>
                <th>Title</th>
                <th>Start date</th>
                <th>Department</th>
                <th>Credits</th>
                <th>Delivery</th>
                <th>Active</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($courses as $course) : ?>
                <?php
                $code = is_string($course['code'] ?? null) ? $course['code'] : '';
                $title = is_string($course['title'] ?? null) ? $course['title'] : '';
                $startDate = is_string($course['startDate'] ?? null) ? $course['startDate'] : '';
                $department = is_string($course['department'] ?? null) ? $course['department'] : '';
                $credits = (int) ($course['credits'] ?? 0);
                $delivery = is_string($course['delivery'] ?? null) ? $course['delivery'] : '';
                $active = (bool) ($course['active'] ?? false);
                $id = is_string($course['id'] ?? null) ? $course['id'] : '';
                ?>
                <tr>
                    <td><code><?php print h($code); ?></code></td>
                    <td><?php print h($title); ?></td>
                    <td><?php print h($startDate); ?></td>
                    <td><?php print h($department); ?></td>
                    <td><?php print $credits; ?></td>
                    <td><?php print h($delivery); ?></td>
                    <td><?php print $active ? 'yes' : 'no'; ?></td>
                    <td class="text-end">
                        <?php if ($id !== '') : ?>
                            <a class="btn btn-sm btn-outline-secondary" href="/courses/edit?id=<?php print h(rawurlencode($id)); ?>">Edit</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>

<?php
require_once __DIR__ . '/../partials/footer.php';
