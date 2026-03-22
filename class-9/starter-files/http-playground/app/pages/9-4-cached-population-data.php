<?php
// Exercise 9-4: Cached Population Data (weekly cache)
// Adapted from Exercise 5-4 in class-10/chapter-5-reinforcement-exercises.md
//
// Goal: Cache generated output to a file and only refresh it once a week.
//
// Instructions:
// 1) Implement buildCountyRows() (you can copy your loop from Exercise 9-3).
// 2) If the cache file exists and is <= 7 days old, read it and use it.
// 3) Otherwise, regenerate the output from the CSV source and overwrite the cache file.
// 4) Track whether you used the cache or regenerated using $sourceUsed.
//
// Expected output (when cache is stale or missing):
// source: generated
// rows: 3
// Androscoggin|103793
// Cumberland|274800
// York|196713

$source = 'local'; // change to 'remote' to try the real dataset

$dataUrlRemote = 'https://www.maine.gov/labor/cwri/laus/Population1960_2000.csv';
$dataUrlLocal = 'file://' . __DIR__ . '/../data/maine-population-sample.csv';
$dataUrl = $source === 'remote' ? $dataUrlRemote : $dataUrlLocal;

$cacheDir = __DIR__ . '/../storage/cache';
if (!is_dir($cacheDir)) {
    mkdir($cacheDir, 0777, true);
}

$cacheFile = $cacheDir . '/9-4-cached-population-data.txt';

$ttlSeconds = 7 * 86400;

$sourceUsed = '';
$output = '';

function buildCountyRows(string $dataUrl): array
{
    // TODO: Implement like Exercise 9-3 (fopen + fgetcsv + filter County).
    // Return an array of strings like: "Androscoggin|103793".
    return [];
}

// TODO: If cache exists and is fresh, read it into $output and set $sourceUsed = 'cache'.
// TODO: Otherwise, generate $output, write it to the cache file, and set $sourceUsed = 'generated'.

print 'source: ' . $sourceUsed . PHP_EOL;
print $output;
