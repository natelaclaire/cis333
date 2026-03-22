<?php
$pageTitle = 'Not Found (404)';

require_once __DIR__ . '/../lib/functions.php';

http_response_code(404);
header('Cache-Control: no-store');

$requestedPath = $_SERVER['CLASS9_ROUTED_PATH'] ?? '';
$requestedPath = is_string($requestedPath) ? $requestedPath : '';

require_once __DIR__ . '/../partials/header.php';
?>

<p><a href="/">Home</a></p>

<p>
    <strong>404 Not Found</strong>
</p>

<p>
    Requested path: <code><?php print h($requestedPath === '' ? '(unknown)' : $requestedPath); ?></code>
</p>

<p>
    Try one of the known routes:
</p>

<ul>
    <li><a href="/">/</a></li>
    <li><a href="/query">/query</a></li>
    <li><a href="/response">/response</a></li>
    <li><a href="/redirect">/redirect</a></li>
    <li><a href="/sources">/sources</a></li>
</ul>

<?php
require_once __DIR__ . '/../partials/footer.php';
