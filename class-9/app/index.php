<?php
$pageTitle = 'HTTP Playground';

require_once __DIR__ . '/lib/functions.php';

$method = serverString('REQUEST_METHOD');
$requestUri = serverString('REQUEST_URI');
$path = parse_url($requestUri, PHP_URL_PATH);
$path = is_string($path) ? $path : '';

$queryString = serverString('QUERY_STRING');
$protocol = serverString('SERVER_PROTOCOL');
$host = serverString('HTTP_HOST');

$now = date('c');

require_once __DIR__ . '/partials/header.php';
?>

<p>
    This is our Class 9 project. It helps us see the basics of how web requests and responses work.
</p>

<h2>Request (What the Browser Sends)</h2>
<dl>
    <dt>Method</dt>
    <dd><?php print h($method); ?></dd>

    <dt>Host</dt>
    <dd><?php print h($host); ?></dd>

    <dt>Path</dt>
    <dd><?php print h($path); ?></dd>

    <dt>Query string</dt>
    <dd><?php print h($queryString === '' ? '(none)' : $queryString); ?></dd>

    <dt>Protocol</dt>
    <dd><?php print h($protocol); ?></dd>
</dl>

<h2>Response (What the Server Sends)</h2>
<p>
    If you can see this page, the server sent an HTTP response with a successful status code
    (usually <code>200 OK</code>).
</p>

<h2>Try It</h2>
<ul>
    <li><a href="?name=Nate">Add a query string</a> (we will work with this in 9.3)</li>
    <li><a href="/">Reload the page</a> to create a new request (timestamp below will change)</li>
</ul>

<h2>Server Timestamp</h2>
<p><code><?php print h($now); ?></code></p>

<?php
require_once __DIR__ . '/partials/footer.php';
