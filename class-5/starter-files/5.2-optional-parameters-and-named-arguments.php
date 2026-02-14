<?php
// Exercise 5.2: Optional Parameters and Named Arguments
// Instructions:
// 1) Implement buildEmail().
// 2) buildEmail() should accept first name, last name, and an optional domain.
// 3) Use named arguments to set $email2 to use the domain 'hfcc.edu'.
//
// Expected output:
// email1: ada.lovelace@example.com
// email2: ada.lovelace@hfcc.edu

function buildEmail(string $firstName, string $lastName, string $domain = 'example.com'): string
{
    // TODO: Return an email address in the format first.last@domain in all
    // lowercase letters.
    return '';
}

$email1 = buildEmail('Ada', 'Lovelace');
$email2 = buildEmail(firstName: 'Ada', lastName: 'Lovelace', domain: 'hfcc.edu');

print 'email1: ' . $email1 . PHP_EOL;
print 'email2: ' . $email2 . PHP_EOL;

