<?php
$pageTitle = 'PHP Streams and Wrappers';

require_once __DIR__ . '/../lib/functions.php';

$allowUrlFopen = ini_get('allow_url_fopen');
$allowUrlFopen = is_string($allowUrlFopen) ? $allowUrlFopen : '';

$wrappers = stream_get_wrappers();
$wrappers = is_array($wrappers) ? $wrappers : [];
sort($wrappers, SORT_NATURAL | SORT_FLAG_CASE);

$transports = stream_get_transports();
$transports = is_array($transports) ? $transports : [];
sort($transports, SORT_NATURAL | SORT_FLAG_CASE);

$examples = [
    'https://www.example.com/',
    'https://example.com/',
];

$url = $_GET['url'] ?? $examples[0];
$url = is_string($url) ? $url : $examples[0];
$url = trim($url);

$allowedHosts = ['example.com', 'www.example.com'];

$parsed = parse_url($url);
$scheme = is_array($parsed) && isset($parsed['scheme']) ? (string) $parsed['scheme'] : '';
$host = is_array($parsed) && isset($parsed['host']) ? (string) $parsed['host'] : '';

$isAllowed = $scheme === 'https' && in_array($host, $allowedHosts, true);

$fetchError = '';
$fileGetContentsBytes = 0;
$fileGetContentsPreview = '';

$fopenBytes = 0;
$fopenPreview = '';

// Stream context lets us set options like timeouts and headers.
$context = stream_context_create([
    'http' => [
        'timeout' => 5,
        'header' => "User-Agent: CIS333-Class9\r\n",
    ],
]);

function captureWarning(callable $fn, string &$warningMessage): mixed
{
    $warningMessage = '';

    $previous = set_error_handler(
        function (int $errno, string $errstr) use (&$warningMessage): bool {
            // Capture warnings like "failed to open stream".
            $warningMessage = $errstr;
            return true;
        }
    );

    try {
        return $fn();
    } finally {
        if ($previous === null) {
            restore_error_handler();
        } else {
            set_error_handler($previous);
        }
    }
}

if ($isAllowed) {
    $contents = captureWarning(
        function () use ($url, $context): string|false {
            return file_get_contents($url, false, $context);
        },
        $fetchError
    );

    if (is_string($contents)) {
        $fileGetContentsBytes = strlen($contents);
        $fileGetContentsPreview = substr($contents, 0, 400);
    }

    $handle = captureWarning(
        function () use ($url, $context) {
            return fopen($url, 'r', false, $context);
        },
        $fetchError
    );

    if (is_resource($handle)) {
        $chunk = fread($handle, 400);
        $chunk = is_string($chunk) ? $chunk : '';
        $fopenBytes = strlen($chunk);
        $fopenPreview = $chunk;
        fclose($handle);
    }
}

require_once __DIR__ . '/../partials/header.php';
?>

<p><a href="/">Home</a></p>

<p>
    PHP stream wrappers let you use file functions (like <code>file_get_contents()</code> and <code>fopen()</code>)
    with different types of resources, including <code>https://</code> URLs.
</p>

<h2>Environment</h2>
<dl>
    <dt>allow_url_fopen</dt>
    <dd><?php print h($allowUrlFopen === '' ? '(unknown)' : $allowUrlFopen); ?></dd>
</dl>

<h2>Available Wrappers</h2>
<p>
    These are the registered stream wrappers in the current PHP installation.
</p>
<pre><?php print h(implode("\n", $wrappers)); ?></pre>

<h2>Available Transports</h2>
<pre><?php print h(implode("\n", $transports)); ?></pre>

<h2>Fetch a URL (Demo)</h2>
<p>
    For safety, this demo only allows <code>https</code> URLs on: <code>example.com</code>, <code>www.example.com</code>.
</p>

<form method="get" action="/streams">
    <label>
        URL
        <input type="text" name="url" size="48" value="<?php print h($url); ?>" />
    </label>
    <button type="submit">Fetch</button>
</form>

<p>
    Examples:
    <?php foreach ($examples as $exampleUrl) : ?>
        <a href="/streams?<?php print h(http_build_query(['url' => $exampleUrl])); ?>"><?php print h($exampleUrl); ?></a>
    <?php endforeach; ?>
</p>

<?php if (!$isAllowed) : ?>
    <p><strong>Blocked URL.</strong> Only https://example.com and https://www.example.com are allowed.</p>
<?php endif; ?>

<?php if ($fetchError !== '') : ?>
    <p><strong>Warning:</strong> <?php print h($fetchError); ?></p>
<?php endif; ?>

<h2>file_get_contents()</h2>
<dl>
    <dt>Bytes read</dt>
    <dd><?php print (int) $fileGetContentsBytes; ?></dd>
</dl>
<pre><?php print h($fileGetContentsPreview); ?></pre>

<h2>fopen() + fread()</h2>
<dl>
    <dt>Bytes read (first chunk)</dt>
    <dd><?php print (int) $fopenBytes; ?></dd>
</dl>
<pre><?php print h($fopenPreview); ?></pre>

<p>
    Open DevTools -> Network to see the request to <code>/streams</code>. If remote fetching succeeds, you'll also see
    the HTML content coming back in this response.
</p>

<?php
require_once __DIR__ . '/../partials/footer.php';
