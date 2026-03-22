<?php
$pageTitle = 'Request Data Sources: $_SERVER, $_GET, $_POST';

require_once __DIR__ . '/../lib/functions.php';

$method = serverString('REQUEST_METHOD');
$requestUri = serverString('REQUEST_URI');
$path = parse_url($requestUri, PHP_URL_PATH);
$path = is_string($path) ? $path : '';

$queryString = serverString('QUERY_STRING');
$contentType = serverString('CONTENT_TYPE');
$userAgent = serverString('HTTP_USER_AGENT');

$debug = $_GET['debug'] ?? '';
$debug = is_string($debug) ? $debug : '';
$debug = $debug === '1';

// Example: read one GET parameter and one POST parameter as strings.
$q = $_GET['q'] ?? '';
$q = is_string($q) ? $q : '';

$message = $_POST['message'] ?? '';
$message = is_string($message) ? $message : '';

require_once __DIR__ . '/../partials/header.php';
?>

<p><a href="../index.php">Home</a></p>

<p>
    PHP gives you a few main places to read request data:
</p>

<ul>
    <li><code>$_SERVER</code>: request metadata (method, URI, headers, etc.)</li>
    <li><code>$_GET</code>: query string parameters (URL after <code>?</code>)</li>
    <li><code>$_POST</code>: form body parameters for POST requests</li>
</ul>

<p>
    These values are untrusted input. Escape before printing into HTML.
</p>

<h2>Current Request Metadata ($_SERVER)</h2>
<dl>
    <dt>REQUEST_METHOD</dt>
    <dd><?php print h($method); ?></dd>

    <dt>Path</dt>
    <dd><?php print h($path); ?></dd>

    <dt>QUERY_STRING</dt>
    <dd><?php print h($queryString === '' ? '(none)' : $queryString); ?></dd>

    <dt>CONTENT_TYPE</dt>
    <dd><?php print h($contentType === '' ? '(none)' : $contentType); ?></dd>

    <dt>HTTP_USER_AGENT</dt>
    <dd><?php print h($userAgent === '' ? '(none)' : $userAgent); ?></dd>
</dl>

<h2>GET Example (Query String)</h2>
<p>
    This form uses <code>method="get"</code>, so the data appears in the URL and in <code>$_GET</code>.
</p>

<form method="get" action="request-sources.php">
    <label>
        q
        <input type="text" name="q" value="<?php print h($q); ?>" />
    </label>
    <button type="submit">Search</button>
</form>

<p>
    Current <code>q</code>: <code><?php print h($q === '' ? '(empty)' : $q); ?></code>
</p>

<h2>POST Example (Form Body)</h2>
<p>
    This form uses <code>method="post"</code>, so the data is sent in the request body and appears in <code>$_POST</code>.
</p>

<form method="post" action="request-sources.php?debug=<?php print $debug ? '1' : '0'; ?>">
    <label>
        message
        <input type="text" name="message" value="" />
    </label>
    <button type="submit">Submit</button>
</form>

<p>
    Current <code>message</code>: <code><?php print h($message === '' ? '(empty)' : $message); ?></code>
</p>

<h2>Debug Dumps</h2>
<p>
    <a href="request-sources.php?<?php print h(http_build_query(['debug' => $debug ? '0' : '1', 'q' => $q])); ?>">
        <?php print $debug ? 'Hide dumps' : 'Show dumps'; ?>
    </a>
</p>

<?php if ($debug) : ?>
    <h3>$_GET</h3>
    <pre><?php var_dump($_GET); ?></pre>

    <h3>$_POST</h3>
    <pre><?php var_dump($_POST); ?></pre>
<?php endif; ?>

<p>
    Note: we covered PRG (Post-Redirect-Get) in 9.5. This page does not use PRG, so refreshing after a POST may
    trigger your browser's re-submit warning.
</p>

<?php
require_once __DIR__ . '/../partials/footer.php';
