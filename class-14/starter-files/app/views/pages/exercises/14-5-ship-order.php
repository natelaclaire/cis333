<?php
// Exercise 14-5: implement the "Ship Order" functionality for the admin panel page.
// TODO: this page should only be accessible to users with admin privileges. If a non-admin user tries to access this page, display an error message and redirect them to the home page.
// TODO: look up the order by its ID (available in the $orderId variable) using the getOrders() function in functions.php to retrieve the list of orders from the "database" (orders.json file) and find the order that matches the given ID.
// TODO: if the order is found, display the order details (customer email, order date, items in order, status).
// TODO: display a form with a text field for tracking number and a "Ship Order" button that allows the admin to mark the order as shipped.
// TODO: check to see if the form has been submitted (i.e. if the request method is POST), and if so, update the order's status to "Shipped" and save the tracking number to the orders array, then save the updated orders list back to the "database" (orders.json file) using the saveOrders() function from functions.php.
$pageTitle = 'Ship Order';

require_once APP_PATH . 'app/views/partials/header.php';
?>

    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <section class="p-4 bg-light border rounded">

                <div class="row">
                    <h1>Ship Order</h1>
                </div>

            </section>
        </div>
    </div>

<?php
require_once APP_PATH . 'app/views/partials/footer.php';