<?php
$pageTitle = 'Grant Application';

require_once __DIR__ . '/../../lib/functions.php';
require_once __DIR__ . '/../../lib/storage.php';
require_once __DIR__ . '/../../lib/fields.php';
require_once __DIR__ . '/../../lib/input.php';
require_once __DIR__ . '/../../lib/validate.php';
require_once __DIR__ . '/../../lib/render.php';

$fields = grantFields();
[$values, $errors] = initValuesAndErrors($fields);

$method = serverString('REQUEST_METHOD');

if ($method === 'POST') {
    $values = readValues($fields);
    $errors = validateValues($fields, $values);

    if (!hasErrors($errors)) {
        // No errors, so save the application and redirect to success page.
        saveGrantApplication($values);
        header('Location: /grant?success=1', true, 303);
        exit;
    }
}

$success = getString('success') === '1';

require_once __DIR__ . '/../partials/header.php';
?>

<?php if ($success) : ?>
    <div class="alert alert-success">
        Application submitted successfully.
    </div>
<?php endif; ?>

<form method="post" action="/grant" class="card card-body">
    <div class="row g-3">
        <?php
        foreach ($fields as $name => $field) {
            if (!is_string($name) || !is_array($field)) {
                continue;
            }
            print '<div class="col-12">';
            print renderField($field, $name, $values, $errors);
            print '</div>';
        }
        ?>

        <div class="col-12 d-flex gap-2">
            <button class="btn btn-primary" type="submit">Submit application</button>
            <a class="btn btn-outline-secondary" href="/ex/grant">Reset</a>
        </div>
    </div>
</form>

<p class="text-muted mt-3 mb-0">
    Note: client-side validation improves UX, but server-side validation is the source of truth.
</p>

<?php
require_once __DIR__ . '/../partials/footer.php';

