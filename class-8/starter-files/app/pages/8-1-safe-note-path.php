<?php
// Exercise 8-1: Safe Note Path (allowlist + basename + realpath)
//
// Goal: Build a safe path resolver that only allows reading known note files.
//
// Instructions:
// 1) Implement safeNotePath() below.
// 2) $allowedNames is an allowlist of basenames, like: ['welcome.txt', 'todo.txt'].
// 3) $requested may be attacker-controlled, like: '../../etc/passwd'.
// 4) Return the resolved absolute path if allowed, otherwise return null.
//
// Requirements:
// - Use basename() to strip any directory parts from $requested.
// - Use in_array(..., true) to enforce the allowlist.
// - Use realpath() for a defense-in-depth containment check.
//
// Expected output:
// todo: Buy groceries
// attack: blocked

require_once __DIR__ . '/../lib/functions.php';

$notesDir = __DIR__ . '/../storage/notes';
ensureDirExists($notesDir);

$allowedNames = ['welcome.txt', 'todo.txt', 'quote.txt'];

function safeNotePath(string $notesDir, array $allowedNames, string $requested): ?string
{
    // TODO: Implement per instructions.
    return null;
}

$todoPath = safeNotePath($notesDir, $allowedNames, 'todo.txt');
$attackPath = safeNotePath($notesDir, $allowedNames, '../../etc/passwd');

$todoFirstLine = '';
if ($todoPath !== null) {
    $lines = file($todoPath, FILE_IGNORE_NEW_LINES);
    $lines = $lines === false ? [] : $lines;
    $todoFirstLine = $lines[0] ?? '';
}

print 'todo: ' . $todoFirstLine . PHP_EOL;
print 'attack: ' . ($attackPath === null ? 'blocked' : 'allowed') . PHP_EOL;

