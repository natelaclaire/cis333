<?php
$pageTitle = 'Debug Storage (JSON)';

require_once __DIR__ . '/../../lib/storage.php';

$method = serverString('REQUEST_METHOD');

if ($method === 'POST') {
    $action = postString('action');

    if ($action === 'reset') {
        saveData(defaultData());
        header('Location: /debug/storage?reset=1', true, 303);
        exit;
    }

    if ($action === 'seed') {
        $data = loadData();

        $data['courses'][] = [
            'id' => newId('c'),
            'code' => 'CIS333',
            'title' => 'Server-Side Programming',
            'startDate' => date('Y-m-d'),
            'department' => 'CIS',
            'credits' => 3,
            'delivery' => 'in_person',
            'active' => true,
            'meetingDays' => ['mon', 'wed'],
        ];

        saveData($data);

        header('Location: /debug/storage?seed=1', true, 303);
        exit;
    }
}

$data = loadData();

$reset = getString('reset') === '1';
$seed = getString('seed') === '1';

require_once __DIR__ . '/../partials/header.php';
?>

<?php if ($reset) : ?>
    <div class="alert alert-success">Reset data.json</div>
<?php endif; ?>

<?php if ($seed) : ?>
    <div class="alert alert-success">Added a sample course</div>
<?php endif; ?>

<p>
    This page demonstrates reading and writing a single JSON file as an application data store.
</p>

<div class="d-flex gap-2 mb-3">
    <form method="post" action="/debug/storage">
        <input type="hidden" name="action" value="seed">
        <button class="btn btn-primary" type="submit">Add sample course</button>
    </form>

    <form method="post" action="/debug/storage" onsubmit="return confirm('Reset data.json?');">
        <input type="hidden" name="action" value="reset">
        <button class="btn btn-outline-danger" type="submit">Reset JSON</button>
    </form>
</div>

<h2 class="h5">Counts</h2>
<ul>
    <li>Courses: <?php print count($data['courses']); ?></li>
    <li>Registrations: <?php print count($data['registrations']); ?></li>
</ul>

<h2 class="h5">Raw JSON (decoded)</h2>
<pre><?php print h(json_encode($data, JSON_PRETTY_PRINT) ?: ''); ?></pre>

<p class="text-muted">
    Note: This is not where we implement full validation. We are just proving that our JSON read/write layer works.
</p>

<?php
require_once __DIR__ . '/../partials/footer.php';
