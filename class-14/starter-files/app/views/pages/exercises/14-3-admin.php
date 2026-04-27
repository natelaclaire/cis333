<?php
// Exercise 14-3: create an admin panel page that is only accessible to users with admin privileges.
// TODO: check if the user is logged in and has admin privileges before allowing them to access the admin panel page. If they don't have access, display an error message and redirect them to the home page.
// TODO: the admin panel page should display a list of all orders that have been placed, including the order ID, customer email, order date, total price, and order status. You can use the getOrders() function in functions.php to retrieve the list of orders from the "database" (orders.json file).
// TODO: each order in the list should have a link to "Ship Order" that points to /ship-order?id=ORDER_ID, where ORDER_ID is the ID of the order (the array key). You'll implement the /shipOrder route in exercise 14-5.
$pageTitle = 'Admin Panel';

require_once APP_PATH . 'app/views/partials/header.php';
?>

    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <section class="p-4 bg-light border rounded">

                <div class="row">
                    <h1>Admin Panel</h1>
                </div>

            </section>
        </div>
    </div>

<?php
require_once APP_PATH . 'app/views/partials/footer.php';