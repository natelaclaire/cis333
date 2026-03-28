<?php
$pageTitle = 'New Registration';

require_once __DIR__ . '/../../lib/storage.php';

$data = loadData();
$courses = $data['courses'];

$missing = getString('missing') === '1';

require_once __DIR__ . '/../partials/header.php';
?>

<?php if ($courses === []) : ?>
    <div class="alert alert-warning">
        You need at least one course before you can create a registration.
        <a href="/courses/new">Create a course</a>.
    </div>
<?php else : ?>
    <?php if ($missing) : ?>
        <div class="alert alert-warning">
            Please provide at least a student name and choose a course.
            (We will cover proper validation and sticky forms next week.)
        </div>
    <?php endif; ?>

    <form method="post" action="/registrations/create" class="card card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label" for="studentName">Student name</label>
                <input class="form-control" id="studentName" name="studentName" type="text" value="">
            </div>

            <div class="col-md-6">
                <label class="form-label" for="studentEmail">Student email</label>
                <input class="form-control" id="studentEmail" name="studentEmail" type="email" value="">
            </div>

            <div class="col-md-4">
                <label class="form-label" for="birthDate">Birth date</label>
                <input class="form-control" id="birthDate" name="birthDate" type="date" value="">
            </div>

            <div class="col-md-8">
                <label class="form-label" for="courseId">Course</label>
                <select class="form-select" id="courseId" name="courseId">
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
                        ?>
                        <option value="<?php print h($id); ?>"><?php print h($label); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label d-block">Status</label>
                <div class="form-check">
                    <input class="form-check-input" id="status_credit" name="status" type="radio" value="credit" checked>
                    <label class="form-check-label" for="status_credit">For credit</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" id="status_audit" name="status" type="radio" value="audit">
                    <label class="form-check-label" for="status_audit">Audit</label>
                </div>
            </div>

            <div class="col-md-6">
                <label class="form-label d-block">Preferences</label>
                <div class="form-check">
                    <input class="form-check-input" id="newsletter" name="newsletter" type="checkbox" value="1">
                    <label class="form-check-label" for="newsletter">Email me course updates</label>
                </div>
                <div class="form-check mt-2">
                    <input class="form-check-input" id="acceptedPolicy" name="acceptedPolicy" type="checkbox" value="1">
                    <label class="form-check-label" for="acceptedPolicy">
                        I accept the registration policy
                    </label>
                </div>
                <div class="form-text">
                    We will talk about validation next week. For now this checkbox is optional.
                </div>
            </div>

            <div class="col-12">
                <button class="btn btn-primary" type="submit">Create registration</button>
                <a class="btn btn-outline-secondary" href="/registrations">Cancel</a>
            </div>
        </div>
    </form>

    <p class="text-muted mt-3">
        Next week we will implement sticky forms so that if a submission fails validation, we can re-populate what
        the student typed and display field-level error messages.
    </p>
<?php endif; ?>

<?php
require_once __DIR__ . '/../partials/footer.php';

