<?php
// Exercise 14-1: create a simple checkout page.
// TODO: implement the checkout page with a form for customer information and order details.
// TODO: display the cart contents and calculate the subtotal price.
// TODO: use calculateTax() and calculateShipping() in functions.php to calculate the tax and shipping costs, and display the total price.
// TODO: if the user is logged in, pre-fill their email address from the session and disable the email field so that they can't change it.
// TODO: if the user is not logged in, require them to enter an email address before they can submit the order.
// TODO: add a "Place Order" button that submits the form (exercise 14-2 will handle the form submission and order processing).
// TODO: the form should be sticky, meaning that if there are validation errors, the form should be re-displayed with the previously entered values and error messages (validation will be handled in exercise 14-2).
// TODO: the only required field for this exercise is the email address, but you can feel free to add additional fields (e.g. name, address) if you want to make it more realistic (no payment fields).
$pageTitle = 'Checkout';

require_once APP_PATH . 'app/views/partials/header.php';
?>

    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <section class="p-4 bg-light border rounded">

                <div class="row">
                    <h1>Checkout</h1>
                </div>

            </section>
        </div>
    </div>

<?php
require_once APP_PATH . 'app/views/partials/footer.php';