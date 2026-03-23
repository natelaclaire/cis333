<?php
$pageTitle = 'Class 9';

require_once __DIR__ . '/../app/lib/functions.php';
require_once __DIR__ . '/../app/partials/header.php';
?>

<p>
    These pages are intentionally simple so you can focus on client-server communication basics.
</p>

<h2>Exercises</h2>
<ul>
    <li><a href="/ex/9-1">Exercise 9-1: Request parts (parse_url)</a></li>
    <li><a href="/ex/9-2">Exercise 9-2: Status codes + headers</a></li>
    <li><a href="/ex/9-3">Exercise 9-3: CSV over streams (adapted)</a></li>
    <li><a href="/ex/9-4">Exercise 9-4: Weekly caching (adapted)</a></li>
    <li><a href="/ajax">Exercise 9-5: AJAX + JSON endpoint</a></li>
</ul>

<p>
    Run the dev server from the repository root with:
</p>

<pre><code>php -S localhost:8080 -t class-9/starter-files/http-playground/public class-9/starter-files/http-playground/public/router.php</code></pre>

<?php
require_once __DIR__ . '/../app/partials/footer.php';
