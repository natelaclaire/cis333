<?php
// Exercise 11-5 autograder: grant application viewer page.
//
// It checks:
// - list view includes key fields and links to detail via ?id=
// - detail view renders fields and escapes untrusted content
// - invalid id is handled

$projectRoot = __DIR__ . '/../starter-files/grant-application';
$viewerFile = $projectRoot . '/app/views/pages/grant-viewer.php';
if (!file_exists($viewerFile)) {
    print 'Missing file: app/views/pages/grant-viewer.php' . PHP_EOL;
    exit(1);
}

$dataFile = $projectRoot . '/app/storage/data.json';

$seed = [
    'applications' => [
        [
            'id' => 'ga_test',
            'createdAt' => date(DATE_ATOM),
            'applicantName' => '<script>alert(1)</script>',
            'contactEmail' => 'ada@example.com',
            'organizationName' => 'Org',
            'requestedAmount' => 1500,
            'category' => 'education',
            'projectSummary' => 'Summary',
            'websiteUrl' => 'https://example.com',
            'agreeToTerms' => true,
            'projectDate' => date('Y-m-d'),
            'phoneNumber' => '123-456-7890',
        ],
    ],
];
file_put_contents($dataFile, json_encode($seed, JSON_PRETTY_PRINT) . PHP_EOL);

$errors = [];

// List view (no id)
$_GET = [];
ob_start();
require $viewerFile;
$out = ob_get_clean();

if (strpos($out, '<script>alert(1)</script>') !== false) {
    $errors[] = 'List view must escape applicantName (raw <script> tag found)';
}
if (strpos($out, '&lt;script&gt;alert(1)&lt;/script&gt;') === false) {
    $errors[] = 'List view must display escaped applicantName';
}
if (strpos($out, 'ga_test') === false) {
    $errors[] = 'List view should include the application id (ga_test) somewhere (often in the detail link)';
}
if (!preg_match('/viewer[^\\n\\r\\"]*id=ga_test/', $out)) {
    $errors[] = 'List view must include a detail link that includes viewer and id=ga_test';
}
if (strpos($out, (string) date('Y-m-d')) === false) {
    $errors[] = 'List view should include projectDate';
}

// Detail view
$_GET = ['id' => 'ga_test'];
ob_start();
require $viewerFile;
$out2 = ob_get_clean();

if (strpos($out2, '<script>alert(1)</script>') !== false) {
    $errors[] = 'Detail view must escape applicantName (raw <script> tag found)';
}
if (strpos($out2, 'ada@example.com') === false) {
    $errors[] = 'Detail view should include contactEmail';
}
if (strpos($out2, '123-456-7890') === false) {
    $errors[] = 'Detail view should include phoneNumber';
}
if (strpos($out2, '/viewer') === false) {
    $errors[] = 'Detail view should include a link back to the list (e.g. /viewer)';
}

// Invalid id handling
$_GET = ['id' => 'ga_missing'];
ob_start();
require $viewerFile;
$out3 = strtolower(ob_get_clean());

if (strpos($out3, 'not found') === false && strpos($out3, 'missing') === false) {
    $errors[] = 'Viewer must handle non-existent ids (expected a not found/missing message)';
}

if ($errors !== []) {
    print 'FAIL' . PHP_EOL . implode(PHP_EOL, $errors) . PHP_EOL;
    exit(1);
}

print 'PASS' . PHP_EOL;
