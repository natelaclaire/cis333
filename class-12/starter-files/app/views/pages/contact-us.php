<div class="container px-4 py-5">
    <h1>Contact Us</h1>
<?php
require_once APP_PATH . '/app/lib/functions.php';
require_once APP_PATH . '/app/lib/storage.php';
require_once APP_PATH . '/app/lib/fields.php';
require_once APP_PATH . '/app/lib/input.php';
require_once APP_PATH . '/app/lib/validate.php';
require_once APP_PATH . '/app/lib/render.php';

$fields = contactFields();
[$values, $errors] = initValuesAndErrors($fields);

$method = serverString('REQUEST_METHOD');

if ($method === 'POST') {
    $values = readValues($fields);
    $errors = validateValues($fields, $values);

    if (!hasErrors($errors)) {
        // No errors, so save the application and redirect to success page.
        ensureDataFileExists();
        saveData($values);
        header('Location: ' . constructUrl('contact-us', ['success' => '1']), true, 303);
        exit;
    }
}

$success = getString('success') === '1';
?>

<?php if ($success) : ?>
    <div class="alert alert-success">
        Thank you for your message. We will get back to you as soon as possible.
    </div>
<?php endif; ?>

<form method="post" action="<?= constructUrl('contact-us'); ?>" class="card card-body">
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
            <button class="btn btn-primary" type="submit">Submit message</button>
            <a class="btn btn-outline-secondary" href="<?= constructUrl('contact-us'); ?>">Reset</a>
        </div>
    </div>
</form>