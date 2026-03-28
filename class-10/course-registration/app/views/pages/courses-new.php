<?php
$pageTitle = 'New Course';

require_once __DIR__ . '/../../lib/functions.php';

$missing = getString('missing') === '1';

require_once __DIR__ . '/../partials/header.php';
?>

<?php if ($missing) : ?>
    <div class="alert alert-warning">
        Please provide at least a course code and title. We'll cover validation and sticky forms next week.
    </div>
<?php endif; ?>

<form method="post" action="/courses/create">
    <div class="row g-3">
        <div class="col-md-3">
            <label class="form-label" for="code">Course code</label>
            <input class="form-control" id="code" name="code" type="text" placeholder="CIS333" required>
        </div>

        <div class="col-md-6">
            <label class="form-label" for="title">Title</label>
            <input class="form-control" id="title" name="title" type="text" placeholder="Server-Side Programming" required>
        </div>

        <div class="col-md-3">
            <label class="form-label" for="startDate">Start date</label>
            <input class="form-control" id="startDate" name="startDate" type="date">
        </div>

        <div class="col-md-3">
            <label class="form-label" for="department">Department</label>
            <select class="form-select" id="department" name="department">
                <option value="CIS">CIS</option>
                <option value="ENG">ENG</option>
                <option value="MATH">MATH</option>
                <option value="SCI">SCI</option>
            </select>
        </div>

        <div class="col-md-3">
            <label class="form-label" for="credits">Credits</label>
            <select class="form-select" id="credits" name="credits">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3" selected>3</option>
                <option value="4">4</option>
            </select>
        </div>

        <div class="col-md-6">
            <label class="form-label d-block">Delivery</label>

            <div class="form-check form-check-inline">
                <input class="form-check-input" id="delivery_in_person" name="delivery" type="radio" value="in_person" checked>
                <label class="form-check-label" for="delivery_in_person">In person</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" id="delivery_online" name="delivery" type="radio" value="online">
                <label class="form-check-label" for="delivery_online">Online</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" id="delivery_hybrid" name="delivery" type="radio" value="hybrid">
                <label class="form-check-label" for="delivery_hybrid">Hybrid</label>
            </div>
        </div>

        <div class="col-md-6">
            <label class="form-label d-block">Meeting days</label>

            <div class="form-check form-check-inline">
                <input class="form-check-input" id="day_mon" name="meetingDays[]" type="checkbox" value="mon">
                <label class="form-check-label" for="day_mon">Mon</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" id="day_tue" name="meetingDays[]" type="checkbox" value="tue">
                <label class="form-check-label" for="day_tue">Tue</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" id="day_wed" name="meetingDays[]" type="checkbox" value="wed">
                <label class="form-check-label" for="day_wed">Wed</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" id="day_thu" name="meetingDays[]" type="checkbox" value="thu">
                <label class="form-check-label" for="day_thu">Thu</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" id="day_fri" name="meetingDays[]" type="checkbox" value="fri">
                <label class="form-check-label" for="day_fri">Fri</label>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-check mt-4">
                <input class="form-check-input" id="active" name="active" type="checkbox" value="1" checked>
                <label class="form-check-label" for="active">Active course</label>
            </div>
        </div>

        <div class="col-12">
            <button class="btn btn-primary" type="submit">Create course</button>
            <a class="btn btn-outline-secondary" href="/courses">Cancel</a>
        </div>
    </div>
</form>

<p class="text-muted mt-3">
    We'll cover full validation and sticky forms next week. For now, we are focusing on what different input
    types look like in <code>$_POST</code> and how to process them.
</p>

<?php
require_once __DIR__ . '/../partials/footer.php';
