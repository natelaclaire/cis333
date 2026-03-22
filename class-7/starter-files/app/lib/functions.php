<?php
// Starter app helpers for Class 7 reinforcement exercises.
//
// Note: This is a PHP-only file, so it intentionally omits the closing `?>`.

function htmlList(string ...$items): string
{
    $html = '<ul>' . PHP_EOL;

    foreach ($items as $item) {
        $html .= '    <li>' . htmlspecialchars($item, ENT_QUOTES, 'UTF-8') . '</li>' . PHP_EOL;
    }

    $html .= '</ul>' . PHP_EOL;
    return $html;
}

function clubCode(string $clubName): string
{
    $clubName = trim($clubName);
    if ($clubName === '') {
        return '';
    }

    $words = preg_split('/\\s+/', $clubName) ?: [];
    $initials = '';

    foreach ($words as $word) {
        if ($word === '') {
            continue;
        }

        $initials .= strtoupper($word[0]);
    }

    return $initials;
}

