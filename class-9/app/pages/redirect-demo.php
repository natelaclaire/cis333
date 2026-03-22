<?php
$pageTitle = 'Redirects (Location Header)';

require_once __DIR__ . '/../lib/functions.php';

$action = $_GET['action'] ?? '';
$action = is_string($action) ? $action : '';

if ($action === 'to-home-302') {
    header('Location: /', true, 302);
    exit;
}

if ($action === 'to-response-demo-302') {
    header('Location: /pages/response-demo.php', true, 302);
    exit;
}

if ($action === 'to-query-demo-301') {
    header('Location: /pages/query-demo.php', true, 301);
    exit;
}

$saved = $_GET['saved'] ?? '';
$saved = is_string($saved) ? $saved : '';
$saved = $saved === '1';

$value = $_GET['value'] ?? '';
$value = is_string($value) ? $value : '';

require_once __DIR__ . '/../partials/header.php';
?>

<p><a href="../index.php">Home</a></p>

<p>
    A <strong>redirect</strong> is an HTTP response that tells the browser to make a new request to a different URL.
    In PHP, the most common way to redirect is to send a <code>Location</code> header.
</p>

<h2>Redirect Examples</h2>
<ul>
    <li><a href="redirect-demo.php?action=to-home-302">302 redirect to /</a></li>
    <li><a href="redirect-demo.php?action=to-response-demo-302">302 redirect to response demo</a></li>
    <li><a href="redirect-demo.php?action=to-query-demo-301">301 redirect to query demo</a></li>
</ul>

<h2>PRG Demo (Simple Form)</h2>
<p>
    PRG stands for <strong>Post-Redirect-Get</strong>. It's a common pattern to avoid duplicate form submissions.
</p>

<form method="post" action="redirect-handler.php">
    <label>
        Value (simple example)
        <input type="text" name="value" value="" />
    </label>
    <button type="submit">Submit</button>
</form>

<?php if ($saved) : ?>
    <h3>Result</h3>
    <p>
        Saved value: <code><?php print h($value === '' ? '(empty)' : $value); ?></code>
    </p>
    <p>
        If you refresh this page now, it will re-run the GET request instead of re-submitting the POST.
    </p>
<?php endif; ?>

<h2>What to Look For in DevTools</h2>
<p>
    Open DevTools -> Network and click the redirect request.
    You should see a <code>3xx</code> status code and a <code>Location</code> response header.
    Then you'll see the follow-up request to the destination URL.
</p>

<?php
require_once __DIR__ . '/../partials/footer.php';
