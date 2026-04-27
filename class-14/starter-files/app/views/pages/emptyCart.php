<?php
$pageTitle = 'Shopping Cart';

require_once APP_PATH . 'app/views/partials/header.php';
?>

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <section class="p-4 bg-light border rounded">
                <div class="row">
                    <h1>Shopping Cart</h1>
                </div>

                <div class="row">
                    (there are no items in your shopping cart)
                </div>
            </section>
        </div>
    </div>

<?php
require_once APP_PATH . 'app/views/partials/footer.php';