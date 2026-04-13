<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=(isset($pageInfo['title']) ? $pageInfo['title'].' | ' : '') ?>Bootstrap demo</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <?php
    //canonical URL & og:url
    $canonicalUrl = '';
    if (array_key_exists('canonical', $pageInfo) && !empty($pageInfo['canonical'])) {
      $canonicalUrl = htmlentities($pageInfo['canonical']);
    } else {
      $canonicalUrl = 'https://' . htmlspecialchars($_SERVER['HTTP_X_FORWARDED_HOST'].constructUrl($page));
    }
    echo '<link rel="canonical" href="' . $canonicalUrl . '">' . PHP_EOL;
    echo '<meta property="og:url" content="' . $canonicalUrl . '" />' . PHP_EOL;

    //description
    if (array_key_exists('description', $pageInfo)) {
      echo '<meta name="description" content="'.htmlentities($pageInfo['description']).'">'.PHP_EOL;
    }

    //robots
    if (array_key_exists('robots', $pageInfo)) {
      echo '<meta name="robots" content="'.htmlentities($pageInfo['robots']).'">'.PHP_EOL;
    }

    //ogTitle
    $ogTitle = '';
    if (array_key_exists('ogTitle', $pageInfo)) {
      $ogTitle = $pageInfo['ogTitle'];
    } elseif (array_key_exists('title', $pageInfo)) {
      $ogTitle = $pageInfo['title'];
    }
    if (!empty($ogTitle)) {
      echo '<meta property="og:title" content="'.htmlentities($ogTitle).'">'.PHP_EOL;
    }

    //ogType
    if (array_key_exists('ogType', $pageInfo)) {
      echo '<meta property="og:type" content="'.htmlentities($pageInfo['ogType']).'">'.PHP_EOL;
    }

    //ogImage
    if (array_key_exists('ogImage', $pageInfo)) {
      $absoluteOgImage = $_SERVER['HTTP_X_FORWARDED_HOST'] . htmlentities($pageInfo['ogImage']);
      echo '<meta property="og:image" content="'.$absoluteOgImage.'">'.PHP_EOL;
    }

    //ogDescription
    $ogDescription = '';
    if (array_key_exists('ogDescription', $pageInfo)) {
      $ogDescription = $pageInfo['ogDescription'];
    } elseif (array_key_exists('description', $pageInfo)) {
      $ogDescription = $pageInfo['description'];
    }
    if (!empty($ogDescription)) {
      echo '<meta property="og:description" content="'.htmlentities($ogDescription).'">'.PHP_EOL;
    }
  ?>
  </head>
  <body class="<?=($pageInfo['classes'] ?? '') ?>">
    <div class="container">
      <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
          <img src="images/logo.png" alt="Business logo" width="32" height="32">
          <span class="fs-4">Business Name</span>
        </a>

        <?php
        include(APP_PATH.'app/views/partials/main-navigation.php');
        ?>
      </header>
    </div>