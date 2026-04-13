<!-- begin includes/main-navigation.php -->
<ul class="nav nav-pills">
    <?php
    $currentUrl = $_SERVER['REQUEST_URI'];
    foreach ($config['nav'] as $nav) {
        $url = constructUrl($nav['url']);
    ?>
    <li class="nav-item"><a href="<?=$url; ?>" <?=($url==$currentUrl ? 'class="nav-link active" aria-current="page"' : 'class="nav-link"') ?>><?=htmlspecialchars($nav['title']) ?></a></li>
    <?php
    }
    ?>
</ul>
<!-- end includes/main-navigation.php -->