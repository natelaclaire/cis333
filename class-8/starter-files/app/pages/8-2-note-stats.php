<?php
// Exercise 8-2: Note Stats (file() + line processing)
//
// Goal: Read a note file into an array of lines and compute a few stats.
//
// Instructions:
// 1) Implement noteStats() below.
// 2) Use file($path, FILE_IGNORE_NEW_LINES) to read lines.
// 3) Count non-empty lines (after trimming).
// 4) Find the first non-empty line.
// 5) Compute the total number of characters in the file.
//
// Expected output:
// nonEmptyLines: 2
// firstNonEmptyLine: Talk is cheap. Show me the code.
// totalChars: 49

require_once __DIR__ . '/../lib/functions.php';

$notesDir = __DIR__ . '/../storage/notes';
ensureDirExists($notesDir);

$filePath = $notesDir . '/quote.txt';
// Overwrite the file so the expected output is stable even if you re-run the script.
file_put_contents($filePath, "Talk is cheap. Show me the code.\n- Linus Torvalds", LOCK_EX);

function noteStats(string $filePath): array
{
    // TODO: Implement per instructions.
    return [
        'nonEmptyLines' => 0,
        'firstNonEmptyLine' => '',
        'totalChars' => 0,
    ];
}

$stats = noteStats($filePath);

print 'nonEmptyLines: ' . (int) ($stats['nonEmptyLines'] ?? 0) . PHP_EOL;
print 'firstNonEmptyLine: ' . (string) ($stats['firstNonEmptyLine'] ?? '') . PHP_EOL;
print 'totalChars: ' . (int) ($stats['totalChars'] ?? 0) . PHP_EOL;
