<?php
$pageTitle = 'POST Result (After Redirect)';

require_once __DIR__ . '/../../lib/functions.php';

$saved = getString('saved') === '1';
$message = getString('message');
$getData = filter_input_array(INPUT_GET, FILTER_SANITIZE_SPECIAL_CHARS) ?? [];

require_once __DIR__ . '/../partials/header.php';
?>

<?php if ($saved) : ?>
    <div class="alert alert-success">
        Saved message: <code><?php print h($message === '' ? '(empty)' : $message); ?></code>
    </div>
<?php else : ?>
    <div class="alert alert-warning">
        No saved message.
    </div>
<?php endif; ?>

<p>
    This is the GET page after the redirect. Refreshing this page will re-run the GET request (not the POST).
</p>

<h2 class="h5">PHP View</h2>
<pre><?php var_dump($getData); ?></pre>

<?php
require_once __DIR__ . '/../partials/footer.php';
