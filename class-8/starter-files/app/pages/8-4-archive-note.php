<?php
// Exercise 8-4: Archive a Note (copy + rename + directory checks)
//
// Goal: Practice file management by moving a file into an archive folder.
//
// Instructions:
// 1) Implement archiveNote() below.
// 2) Ensure the archive directory exists (create it if needed).
// 3) Move the file (rename) into the archive directory.
// 4) Return the archived file path.
//
// Expected output:
// archived: quote-copy.txt
// existsInArchive: yes
// existsInWorking: no

require_once __DIR__ . '/../lib/functions.php';

$workingDir = __DIR__ . '/../storage/_tmp/working';
$archiveDir = __DIR__ . '/../storage/_tmp/archive';
ensureDirExists($workingDir);
ensureDirExists($archiveDir);

// Create a working copy so we don't modify the original notes.
$source = __DIR__ . '/../storage/notes/quote.txt';
$workingCopy = $workingDir . '/quote-copy.txt';
copy($source, $workingCopy);

// Ensure the expected destination does not already exist so rename() is predictable.
$expectedArchived = $archiveDir . '/quote-copy.txt';
if (is_file($expectedArchived)) {
    unlink($expectedArchived);
}

function archiveNote(string $filePath, string $archiveDir): string
{
    // TODO: Implement per instructions.
    return '';
}

$archivedPath = archiveNote($workingCopy, $archiveDir);

print 'archived: ' . basename($archivedPath) . PHP_EOL;
print 'existsInArchive: ' . (is_file($archivedPath) ? 'yes' : 'no') . PHP_EOL;
print 'existsInWorking: ' . (is_file($workingCopy) ? 'yes' : 'no') . PHP_EOL;
