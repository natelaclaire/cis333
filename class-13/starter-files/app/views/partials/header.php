<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=(isset($pageInfo['title']) ? $pageInfo['title'].' | ' : '') ?>Bootstrap demo</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">
  </head>
  <body>
    <div class="container">
      <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
          <span class="fs-4">Class 13</span>
        </a>

        <?php
        include(APP_PATH.'app/views/partials/main-navigation.php');
        ?>
      </header>
    </div>