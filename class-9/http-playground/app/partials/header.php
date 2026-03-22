<?php
// Basic layout header for the Class 9 app.
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php print h($pageTitle); ?></title>
    <link rel="stylesheet" href="/assets/app.css">
    <script src="/assets/app.js" defer></script>
</head>
<body>
<header>
    <h1><?php print h($pageTitle); ?></h1>
</header>
<main>
