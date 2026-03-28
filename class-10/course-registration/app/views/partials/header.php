<?php
// Shared layout header.
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php print h($pageTitle); ?></title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous"
    >

    <link rel="stylesheet" href="/assets/app.css">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Course Registration</a>
        <div class="navbar-nav">
            <a class="nav-link" href="/">Home</a>
            <a class="nav-link" href="/courses">Courses</a>
            <a class="nav-link" href="/registrations">Registrations</a>
            <a class="nav-link" href="/debug/get">Debug GET</a>
            <a class="nav-link" href="/debug/post">Debug POST</a>
            <a class="nav-link" href="/debug/storage">Debug Storage</a>
        </div>
    </div>
</nav>

<main class="container py-4">
    <h1 class="h3 mb-3"><?php print h($pageTitle); ?></h1>
