<?php
$pageTitle = 'Debug GET (Query String)';

require_once __DIR__ . '/../../lib/functions.php';

$q = getString('q');
$department = getString('department');
$getData = filter_input_array(INPUT_GET, FILTER_SANITIZE_SPECIAL_CHARS) ?? [];

require_once __DIR__ . '/../partials/header.php';
?>

<p>
    This page demonstrates a GET form. Submitting the form places data in the URL query string.
</p>

<form class="row gy-2 gx-3 align-items-center" method="get" action="/debug/get">
    <div class="col-sm-5">
        <label class="form-label" for="q">Search</label>
        <input class="form-control" id="q" name="q" type="text" value="<?php print h($q); ?>">
    </div>

    <div class="col-sm-4">
        <label class="form-label" for="department">Department</label>
        <select class="form-select" id="department" name="department">
            <?php
            $options = [
                '' => '(any)',
                'CIS' => 'CIS',
                'ENG' => 'ENG',
                'MATH' => 'MATH',
            ];
            foreach ($options as $value => $label) {
                $selected = $department === $value ? ' selected' : '';
                print '<option value="' . h($value) . '"' . $selected . '>' . h($label) . '</option>';
            }
            ?>
        </select>
    </div>

    <div class="col-auto">
        <button class="btn btn-primary mt-4" type="submit">Search</button>
        <a class="btn btn-outline-secondary mt-4" href="/debug/get">Reset</a>
    </div>
</form>

<h2 class="h5 mt-4">PHP View</h2>
<pre><?php var_dump($getData); ?></pre>

<?php
require_once __DIR__ . '/../partials/footer.php';
