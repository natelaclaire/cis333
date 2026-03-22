<?php
// PRG handler: processes a POST and redirects to a GET.

require_once __DIR__ . '/../lib/functions.php';

if (serverString('REQUEST_METHOD') !== 'POST') {
    http_response_code(405);
    header('Allow: POST');
    print 'Method Not Allowed' . "\n";
    exit;
}

$value = $_POST['value'] ?? '';
$value = is_string($value) ? $value : '';

// In real applications, you would validate and persist the data here.
// Then redirect to a GET page to avoid duplicate submissions on refresh.

$qs = http_build_query([
    'saved' => '1',
    'value' => $value,
]);

header('Location: /pages/redirect-demo.php?' . $qs, true, 303);
exit;
