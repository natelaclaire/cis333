<div class="album py-5">
    <div class="container">
    <h1 class="pb-2 border-bottom">Portfolio</h1>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php
        $portfolio = fetchPortfolio();

        foreach ($portfolio as $entry) {
?>
        <div class="col">
            <div class="card shadow-sm">
                <img class="card-img-top" width="100%" role="img" aria-label="<?=htmlspecialchars($entry['name']); ?> site" alt="<?=htmlspecialchars($entry['name']); ?> site" src="<?=htmlspecialchars($entry['imageUrl']); ?>" focusable="false">
                <div class="card-body">
                <h2 class="card-title"><?=htmlspecialchars($entry['name']); ?></h2>
                <p class="card-text"><?=htmlspecialchars($entry['description']); ?></p>
                <a href="<?=htmlspecialchars($entry['url']); ?>" class="btn btn-primary">Visit site</a>
                </div>
            </div>
        </div>
<?php
        }
        ?>

    </div>
    </div>
</div>