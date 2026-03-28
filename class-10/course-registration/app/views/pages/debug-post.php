<?php
$pageTitle = 'Debug POST (Form Body + PRG)';

require_once __DIR__ . '/../../lib/functions.php';

$method = serverString('REQUEST_METHOD');

if ($method === 'POST') {
    $message = postString('message');

    // PRG: redirect to a GET page so refresh does not re-submit the POST.
    $qs = http_build_query([
        'saved' => '1',
        'message' => $message,
    ]);

    header('Location: /debug/post-result?' . $qs, true, 303);
    exit;
}

require_once __DIR__ . '/../partials/header.php';
?>

<p>
    This page demonstrates a POST form. Submitting the form sends data in the request body.
</p>

<form method="post" action="/debug/post" class="mb-3">
    <div class="mb-3">
        <label class="form-label" for="message">Message</label>
        <input class="form-control" id="message" name="message" type="text" value="">
    </div>
    <button class="btn btn-primary" type="submit">Submit</button>
</form>

<p class="text-muted">
    Open DevTools -> Network and look at the request. You should see a POST request, followed by a 303 redirect,
    followed by a GET request.
</p>

<?php
require_once __DIR__ . '/../partials/footer.php';
