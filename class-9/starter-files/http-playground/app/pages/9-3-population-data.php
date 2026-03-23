<?php
// Exercise 9-3: Population Data (CSV over a stream)
// Adapted from Exercise 5-3 in class-10/chapter-5-reinforcement-exercises.md
//
// Goal: Use fopen() + fgetcsv() to read CSV data from a URL-like source.
//
// Instructions:
// 1) Find the comment "open the URL for reading" and open a stream for $dataUrl.
// 2) Find the comment "read the data" and loop with fgetcsv() until it returns false.
// 3) Keep only county rows: $line[1] must be "County".
// 4) For each county row, collect the county name ($line[0]) and 2000 population ($line[6]).
// 5) Store each result in the $rows array as "{County}|{Population}".
//
// Note: For deterministic grading, we default to a local sample via file://.
// You can switch to the remote source by changing $source to 'remote'.
//
// Expected output:
// rows: 3
// Androscoggin|103793
// Cumberland|274800
// York|196713

$source = 'local'; // change to 'remote' to try the real dataset

$dataUrlRemote = 'http://natelaclaire.me/cis333/class-10/maine-population-by-town-1960-2000.csv';
$dataUrlLocal = 'file://' . __DIR__ . '/../data/maine-population-sample.csv';

$dataUrl = $source === 'remote' ? $dataUrlRemote : $dataUrlLocal;

$rows = [];

// open the URL for reading
// TODO: $file = fopen(...)

// read the data
// TODO: while (($line = fgetcsv($file)) !== false) { ... }

print 'rows: ' . count($rows) . PHP_EOL;
foreach ($rows as $row) {
    print $row . PHP_EOL;
}
