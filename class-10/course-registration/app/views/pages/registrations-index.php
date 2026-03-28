<?php
$pageTitle = 'Registrations';

require_once __DIR__ . '/../../lib/storage.php';

$data = loadData();
$courses = $data['courses'];
$registrations = $data['registrations'];

// Build a lookup table for course labels.
$courseLabels = [];
foreach ($courses as $course) {
    if (!is_array($course)) {
        continue;
    }
    $id = $course['id'] ?? null;
    $code = $course['code'] ?? null;
    $title = $course['title'] ?? null;
    if (!is_string($id) || !is_string($code) || !is_string($title)) {
        continue;
    }
    $courseLabels[$id] = $code . ' - ' . $title;
}

$filterCourseId = getString('courseId');
$filterApplied = $filterCourseId !== '';

$created = getString('created') === '1';
$deleted = getString('deleted') === '1';

require_once __DIR__ . '/../partials/header.php';
?>

<?php if ($created) : ?>
    <div class="alert alert-success">Registration created.</div>
<?php endif; ?>

<?php if ($deleted) : ?>
    <div class="alert alert-success">Registration removed.</div>
<?php endif; ?>

<?php if ($courses !== []) : ?>
    <form class="card card-body mb-3" method="get" action="/registrations">
        <div class="row g-3 align-items-end">
            <div class="col-md-8">
                <label class="form-label" for="courseId">Filter by course</label>
                <select class="form-select" id="courseId" name="courseId">
                    <option value="">(all courses)</option>
                    <?php foreach ($courses as $course) : ?>
                        <?php
                        if (!is_array($course)) {
                            continue;
                        }
                        $id = is_string($course['id'] ?? null) ? $course['id'] : '';
                        $code = is_string($course['code'] ?? null) ? $course['code'] : '';
                        $title = is_string($course['title'] ?? null) ? $course['title'] : '';
                        if ($id === '') {
                            continue;
                        }
                        $label = trim($code . ' - ' . $title);
                        $selected = $filterCourseId === $id ? ' selected' : '';
                        print '<option value="' . h($id) . '"' . $selected . '>' . h($label) . '</option>';
                        ?>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-md-4 d-flex gap-2">
                <button class="btn btn-primary" type="submit">Apply filter</button>
                <a class="btn btn-outline-secondary" href="/registrations">Reset</a>
            </div>
        </div>
    </form>
<?php endif; ?>

<div class="d-flex align-items-center justify-content-between mb-3">
    <p class="mb-0 text-muted">
        Total registrations: <?php print count($registrations); ?>
    </p>
    <a class="btn btn-primary" href="/registrations/new">New registration</a>
</div>

<?php if ($courses === []) : ?>
    <div class="alert alert-warning">
        You need at least one course before you can create a registration.
        <a href="/courses/new">Create a course</a>.
    </div>
<?php elseif ($registrations === []) : ?>
    <div class="alert alert-secondary">
        No registrations yet. Click <strong>New registration</strong> to add one.
    </div>
<?php else : ?>
    <?php
    $visibleRegistrations = [];
    foreach ($registrations as $registration) {
        if (!is_array($registration)) {
            continue;
        }
        if ($filterApplied) {
            $cid = $registration['courseId'] ?? null;
            if (!is_string($cid) || $cid !== $filterCourseId) {
                continue;
            }
        }
        $visibleRegistrations[] = $registration;
    }
    ?>

    <?php if ($visibleRegistrations === []) : ?>
        <div class="alert alert-secondary">
            No registrations match that filter.
        </div>
    <?php else : ?>
    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead>
            <tr>
                <th>Student</th>
                <th>Email</th>
                <th>Birth date</th>
                <th>Course</th>
                <th>Status</th>
                <th>Accepted policy</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($visibleRegistrations as $registration) : ?>
                <?php
                if (!is_array($registration)) {
                    continue;
                }
                $id = is_string($registration['id'] ?? null) ? $registration['id'] : '';
                $studentName = is_string($registration['studentName'] ?? null) ? $registration['studentName'] : '';
                $studentEmail = is_string($registration['studentEmail'] ?? null) ? $registration['studentEmail'] : '';
                $birthDate = is_string($registration['birthDate'] ?? null) ? $registration['birthDate'] : '';
                $courseId = is_string($registration['courseId'] ?? null) ? $registration['courseId'] : '';
                $status = is_string($registration['status'] ?? null) ? $registration['status'] : '';
                $acceptedPolicy = (bool) ($registration['acceptedPolicy'] ?? false);

                $courseLabel = $courseLabels[$courseId] ?? '(unknown course)';
                ?>
                <tr>
                    <td><?php print h($studentName); ?></td>
                    <td><?php print h($studentEmail); ?></td>
                    <td><?php print h($birthDate); ?></td>
                    <td><?php print h($courseLabel); ?></td>
                    <td><?php print h($status); ?></td>
                    <td><?php print $acceptedPolicy ? 'yes' : 'no'; ?></td>
                    <td class="text-end">
                        <?php if ($id !== '') : ?>
                            <form
                                method="post"
                                action="/registrations/delete"
                                class="d-inline"
                                onsubmit="return confirm('Remove this registration?');"
                            >
                                <input type="hidden" name="id" value="<?php print h($id); ?>">
                                <input type="hidden" name="courseId" value="<?php print h($filterCourseId); ?>">
                                <button class="btn btn-sm btn-outline-danger" type="submit">Remove</button>
                            </form>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php endif; ?>
<?php endif; ?>

<?php
require_once __DIR__ . '/../partials/footer.php';
