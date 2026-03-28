<?php
$pageTitle = 'Edit Course';

require_once __DIR__ . '/../../lib/storage.php';

$id = getString('id');
if ($id === '') {
    http_response_code(400);
    header('Content-Type: text/plain; charset=UTF-8');
    print 'Missing course id.' . "\n";
    exit;
}

$data = loadData();
$courses = $data['courses'];

$course = null;
foreach ($courses as $c) {
    if (is_array($c) && ($c['id'] ?? null) === $id) {
        $course = $c;
        break;
    }
}

if (!is_array($course)) {
    http_response_code(404);
    header('Content-Type: text/plain; charset=UTF-8');
    print 'Course not found.' . "\n";
    exit;
}

$missing = getString('missing') === '1';

$code = is_string($course['code'] ?? null) ? $course['code'] : '';
$title = is_string($course['title'] ?? null) ? $course['title'] : '';
$startDate = is_string($course['startDate'] ?? null) ? $course['startDate'] : '';
$department = is_string($course['department'] ?? null) ? $course['department'] : 'CIS';
$credits = (int) ($course['credits'] ?? 3);
$delivery = is_string($course['delivery'] ?? null) ? $course['delivery'] : 'in_person';
$active = (bool) ($course['active'] ?? false);
$meetingDays = $course['meetingDays'] ?? [];
if (!is_array($meetingDays)) {
    $meetingDays = [];
}

require_once __DIR__ . '/../partials/header.php';
?>

<?php if ($missing) : ?>
    <div class="alert alert-warning">
        Please provide both a course code and a title.
        (We will cover proper validation and sticky forms next week.)
    </div>
<?php endif; ?>

<form method="post" action="/courses/update" class="card card-body">
    <input type="hidden" name="id" value="<?php print h($id); ?>">

    <div class="row g-3">
        <div class="col-md-4">
            <label class="form-label" for="code">Course code</label>
            <input class="form-control" id="code" name="code" type="text" value="<?php print h($code); ?>">
        </div>

        <div class="col-md-8">
            <label class="form-label" for="title">Title</label>
            <input class="form-control" id="title" name="title" type="text" value="<?php print h($title); ?>">
        </div>

        <div class="col-md-4">
            <label class="form-label" for="startDate">Start date</label>
            <input class="form-control" id="startDate" name="startDate" type="date" value="<?php print h($startDate); ?>">
        </div>

        <div class="col-md-4">
            <label class="form-label" for="department">Department</label>
            <select class="form-select" id="department" name="department">
                <?php
                $departments = ['CIS', 'ENG', 'MATH', 'BIO'];
                foreach ($departments as $dept) {
                    $selected = $department === $dept ? ' selected' : '';
                    print '<option value="' . h($dept) . '"' . $selected . '>' . h($dept) . '</option>';
                }
                ?>
            </select>
        </div>

        <div class="col-md-4">
            <label class="form-label" for="credits">Credits</label>
            <select class="form-select" id="credits" name="credits">
                <?php
                $creditOptions = [1, 2, 3, 4, 5];
                foreach ($creditOptions as $c) {
                    $selected = $credits === $c ? ' selected' : '';
                    print '<option value="' . h((string) $c) . '"' . $selected . '>' . h((string) $c) . '</option>';
                }
                ?>
            </select>
        </div>

        <div class="col-md-6">
            <label class="form-label d-block">Delivery</label>
            <?php
            $deliveryOptions = [
                'in_person' => 'In person',
                'online' => 'Online',
                'hybrid' => 'Hybrid',
            ];
            foreach ($deliveryOptions as $value => $label) {
                $checked = $delivery === $value ? ' checked' : '';
                print '<div class="form-check">';
                print '<input class="form-check-input" id="delivery_' . h($value) . '" name="delivery" type="radio" value="' . h($value) . '"' . $checked . '>';
                print '<label class="form-check-label" for="delivery_' . h($value) . '">' . h($label) . '</label>';
                print '</div>';
            }
            ?>
        </div>

        <div class="col-md-6">
            <label class="form-label d-block">Meeting days</label>
            <?php
            $days = [
                'mon' => 'Mon',
                'tue' => 'Tue',
                'wed' => 'Wed',
                'thu' => 'Thu',
                'fri' => 'Fri',
            ];
            foreach ($days as $value => $label) {
                $checked = in_array($value, $meetingDays, true) ? ' checked' : '';
                print '<div class="form-check form-check-inline">';
                print '<input class="form-check-input" id="day_' . h($value) . '" name="meetingDays[]" type="checkbox" value="' . h($value) . '"' . $checked . '>';
                print '<label class="form-check-label" for="day_' . h($value) . '">' . h($label) . '</label>';
                print '</div>';
            }
            ?>
        </div>

        <div class="col-md-6">
            <?php $activeChecked = $active ? ' checked' : ''; ?>
            <div class="form-check mt-4">
                <input class="form-check-input" id="active" name="active" type="checkbox" value="1"<?php print $activeChecked; ?>>
                <label class="form-check-label" for="active">Active course</label>
            </div>
        </div>

        <div class="col-12">
            <button class="btn btn-primary" type="submit">Save changes</button>
            <a class="btn btn-outline-secondary" href="/courses">Cancel</a>
        </div>
    </div>
</form>

<p class="text-muted mt-3">
    This form is "sticky" only in the sense that it is pre-filled from stored JSON data.
    Next week we will cover sticky forms for failed submissions (preserving what the user typed after errors).
</p>

<?php
require_once __DIR__ . '/../partials/footer.php';

