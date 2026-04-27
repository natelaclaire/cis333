---
layout: default
title: "Class 14 Reinforcement Exercises"
published: true
---

# Class 14 Reinforcement Exercises

For Class 14, you will extend the provided shopping cart application using sessions, simple authorization, and file-based persistence (JSON).

These exercises are driven by the `TODO` comments in the starter files. Your goal is to complete each TODO by implementing the missing PHP logic and/or page markup.

## Exercise 14-1: Checkout Page (View + Totals)

File to edit:
- `app/views/pages/exercises/14-1-checkout.php`

Requirements:
- Build a checkout page that includes a form for customer information (at minimum: email).
- Display the cart contents and calculate a subtotal.
- Use `calculateTax()` and `calculateShipping()` (in `app/lib/functions.php`) to compute tax/shipping and display the final total.
- If the user is logged in, pre-fill the email field from the session and disable it so it cannot be changed.
- If the user is not logged in, require the user to enter an email address before placing the order.
- Add a `Place Order` submit button that POSTs to the checkout route (the POST handler is implemented in Exercise 14-2).
- Make the form sticky:
  - If there is an email validation error (handled in Exercise 14-2), the page should re-render with the previously entered email value.
  - Display validation/flash messages (the header already prints flash messages).

Notes:
- You can add extra fields (name/address) if you want, but only email is required for this exercise.

## Exercise 14-2: Place Order Logic (Processing + Persistence)

File to edit:
- `app/lib/functions.php` (inside `placeOrder()`)

Requirements:
- When the user is not logged in:
  - Validate the posted email address using `FILTER_VALIDATE_EMAIL`.
  - If the email already exists in `users.json`, do **not** create an account:
    - Show an error message telling the user to log in.
    - Send them to the login page.
  - Otherwise, create a new user account for that email with a randomly generated password and save it to `users.json`.
- Build the order details and save the order:
  - Include the cart items in the order.
  - Compute:
    - `subtotal` from the cart items
    - `tax` via `calculateTax($subtotal)`
    - `shipping` via `calculateShipping($subtotal)`
    - `total` = subtotal + tax + shipping
  - Store the order to `orders.json` using the provided helper functions (`storeOrder()`, `saveOrders()`, etc.).
- After placing the order:
  - Logged-in users should be redirected to `/orders` with a success flash message.
  - New users (created during checkout) should be logged in and then redirected to `/orders`, also with a success flash message.

## Exercise 14-3: Admin Panel (Authorization + Order List)

File to edit:
- `app/views/pages/exercises/14-3-admin.php`

Requirements:
- Only allow access to this page if the user is logged in **and** is an admin.
  - If they are not allowed, show an error message and redirect them to the home page.
- Display a list of all orders (from `orders.json`) using `getOrders()`.
  - Include: order ID, customer email, order date, total price, and status.
- For each order, include a `Ship Order` link to:
  - `/ship-order?id=ORDER_ID`

## Exercise 14-4: My Orders Page (User Filter)

File to edit:
- `app/views/pages/exercises/14-4-orders.php`

Requirements:
- Use `getOrders()` to load orders, then filter them so the page only shows orders for the currently logged-in user.
  - Match orders based on the logged-in user’s email.
- Display the user’s orders in a list or table:
  - order ID, order date, total price, status

## Exercise 14-5: Ship Order Page (Admin Action)

File to edit:
- `app/views/pages/exercises/14-5-ship-order.php`

Requirements:
- Only allow access if the user is an admin.
  - If they are not allowed, show an error message and redirect them to the home page.
- Look up the order by id (provided in `$orderId` from the route).
  - Use `getOrders()` to load orders and find the matching one.
- If the order exists:
  - Display the order details (email, date, items, status).
- Provide a form with:
  - a tracking number text field
  - a `Ship Order` submit button
- When the form is submitted (POST):
  - Update the order’s status to `Shipped`
  - Save the tracking number in the order
  - Persist the updated orders back to `orders.json` using `saveOrders()`

