<?php
$pageTitle = 'Query Strings (GET) Demo';

require_once __DIR__ . '/../lib/functions.php';

$name = $_GET['name'] ?? '';
$name = is_string($name) ? $name : '';

$topic = $_GET['topic'] ?? '';
$topic = is_string($topic) ? $topic : '';

$showAll = $_GET['all'] ?? '';
$showAll = is_string($showAll) ? $showAll : '';
$showAll = $showAll === '1';

$examples = [
    'Name only' => ['name' => 'Nate'],
    'Name + topic' => ['name' => 'Nate', 'topic' => 'http'],
    'All params' => ['name' => 'Nate', 'topic' => 'php', 'all' => '1'],
    'URL encoding' => ['name' => 'Ada Lovelace', 'topic' => 'urls & encoding'],
];

require_once __DIR__ . '/../partials/header.php';
?>

<p><a href="../index.php">Home</a></p>

<p>
    A <strong>query string</strong> is the part of the URL after the <code>?</code>.
    It is sent to the server as part of the request.
</p>

<h2>Current Values</h2>
<dl>
    <dt>name</dt>
    <dd><?php print h($name === '' ? '(none)' : $name); ?></dd>

    <dt>topic</dt>
    <dd><?php print h($topic === '' ? '(none)' : $topic); ?></dd>

    <dt>all</dt>
    <dd><?php print $showAll ? '1' : '(none)'; ?></dd>
</dl>

<h2>Example Links</h2>
<ul>
    <?php foreach ($examples as $label => $params) : ?>
        <?php $qs = http_build_query($params); ?>
        <li><a href="query-demo.php?<?php print h($qs); ?>"><?php print h($label); ?></a></li>
    <?php endforeach; ?>
</ul>

<h2>What PHP Receives</h2>
<p>
    Query string parameters are available in <code>$_GET</code>. They are always strings (or arrays of strings),
    and they are untrusted input.
</p>

<?php if ($showAll) : ?>
    <h3>Dump of $_GET</h3>
    <pre><?php var_dump($_GET); ?></pre>
<?php else : ?>
    <p>
        To see a dump of <code>$_GET</code>, click the "All params" link above.
    </p>
<?php endif; ?>

<?php
require_once __DIR__ . '/../partials/footer.php';
