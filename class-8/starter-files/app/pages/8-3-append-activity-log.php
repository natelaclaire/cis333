<?php
// Exercise 8-3: Append Activity Log (fopen + fwrite)
//
// Goal: Append lines to a log file using lower-level file functions.
//
// Instructions:
// 1) Implement appendActivity() below.
// 2) Open the file in append mode.
// 3) Write $message plus a newline.
// 4) Close the file handle.
//
// Expected output:
// lines: 2
// last: Saved note: todo.txt

require_once __DIR__ . '/../lib/functions.php';

$tmpDir = __DIR__ . '/../storage/_tmp';
ensureDirExists($tmpDir);

$logPath = $tmpDir . '/activity.log';

// Reset the file so the expected output is stable.
file_put_contents($logPath, '', LOCK_EX);

function appendActivity(string $logPath, string $message): void
{
    // TODO: Implement per instructions.
}

appendActivity($logPath, 'Viewed note: welcome.txt');
appendActivity($logPath, 'Saved note: todo.txt');

$lines = file($logPath, FILE_IGNORE_NEW_LINES);
$lines = $lines === false ? [] : $lines;

$last = $lines === [] ? '' : $lines[count($lines) - 1];

print 'lines: ' . count($lines) . PHP_EOL;
print 'last: ' . $last . PHP_EOL;

