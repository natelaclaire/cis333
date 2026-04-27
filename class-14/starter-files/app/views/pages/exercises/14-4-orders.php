<?php
// Exercise 14-4: create an orders page that displays a list of all orders that the logged-in user has placed
// TODO: use the getOrders() function in functions.php to retrieve the list of orders from the "database" (orders.json file) and filter it to only include orders that match the logged-in user's email address
// TODO: display the order ID, order date, total price, and order status for each order in a table or list format
$pageTitle = 'My Orders';

require_once APP_PATH . 'app/views/partials/header.php';
?>

    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <section class="p-4 bg-light border rounded">

                <div class="row">
                    <h1>My Orders</h1>
                </div>

            </section>
        </div>
    </div>

<?php
require_once APP_PATH . 'app/views/partials/footer.php';