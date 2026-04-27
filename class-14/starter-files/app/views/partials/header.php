<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Shopping site: <?= $pageTitle ?></title>

    <link rel="stylesheet" href="/css/products.css">
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
    <link rel="stylesheet" href="/css/styles.css">
</head>

<body>

    <div class="container">
      <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
          <span class="fs-4">Class 14</span>
        </a>

        <nav>
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a href="/" class="nav-link">
                        List of Products
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/cart" class="nav-link">
                        Shopping Cart
                    </a>
                </li>
                <?php if (isLoggedIn()): ?>
                    <?php if (isAdmin(getCurrentUser())): ?>
                        <li class="nav-item">
                            <a href="/admin" class="nav-link">
                                Admin Page
                            </a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a href="/orders" class="nav-link">
                                My Orders
                            </a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a href="/logout" class="nav-link">
                            Logout (<?= htmlspecialchars(getCurrentUser()) ?>)
                        </a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a href="/login" class="nav-link">
                            Login
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
      </header>
    </div>

    <main class="container py-4">

<?php
// Display flash message if it exists
echo getFlashMessage();
