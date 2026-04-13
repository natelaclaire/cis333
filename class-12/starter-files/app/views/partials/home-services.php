<!-- begin includes/home-services.php -->
<div class="container px-4 py-5" id="icon-grid">
    <h2 class="pb-2 border-bottom">Services</h2>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 py-5">
        <?php
        $services = fetchServices();  

        for ($i = 0; $i < count($services); $i++) {
            ?>
        <div class="col d-flex align-items-start">
            <div>
                <h3 class="fw-bold mb-0 fs-4 text-body-emphasis"><?=htmlspecialchars($services[$i]['name']); ?></h3>
                <p><?=htmlspecialchars($services[$i]['description']); ?></p>
            </div>
        </div>
            <?php
        }
        ?>
        

    </div>
</div>
<!-- end includes/home-services.php -->