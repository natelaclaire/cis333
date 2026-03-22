<?php
$pageTitle = 'Exercise 9-5: AJAX (fetch) + JSON';

require_once __DIR__ . '/../lib/functions.php';
require_once __DIR__ . '/../partials/header.php';
?>

<p><a href="/">Home</a></p>

<p>
    This page uses JavaScript <code>fetch()</code> (provided) to call a PHP endpoint that returns JSON.
</p>

<p>
    Open DevTools -> Network, reload this page, and filter for <code>Fetch/XHR</code> to see the request to
    <code>/api/time</code>.
</p>

<p><a id="reload" href="#">Reload JSON</a></p>

<pre id="result"></pre>

<script src="/assets/9-5-ajax-demo.js" defer></script>

<?php
require_once __DIR__ . '/../partials/footer.php';
