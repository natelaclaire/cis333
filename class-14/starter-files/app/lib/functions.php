<?php
function starsHtml(int $stars): string
{
    $s = '';
    switch ($stars) {
        case 0:
            $s .= '<span class="glyphicon glyphicon-star-empty"></span>';
            $s .= '<span class="glyphicon glyphicon-star-empty"></span>';
            $s .= '<span class="glyphicon glyphicon-star-empty"></span>';
            $s .= '<span class="glyphicon glyphicon-star-empty"></span>';
            $s .= '<span class="glyphicon glyphicon-star-empty"></span>';
            break;

        case 1:
            $s .= '<span class="glyphicon glyphicon-star"></span>';
            $s .= '<span class="glyphicon glyphicon-star-empty"></span>';
            $s .= '<span class="glyphicon glyphicon-star-empty"></span>';
            $s .= '<span class="glyphicon glyphicon-star-empty"></span>';
            $s .= '<span class="glyphicon glyphicon-star-empty"></span>';
            break;

        case 2:
            $s .= '<span class="glyphicon glyphicon-star"></span>';
            $s .= '<span class="glyphicon glyphicon-star"></span>';
            $s .= '<span class="glyphicon glyphicon-star-empty"></span>';
            $s .= '<span class="glyphicon glyphicon-star-empty"></span>';
            $s .= '<span class="glyphicon glyphicon-star-empty"></span>';
            break;

        case 3:
            $s .= '<span class="glyphicon glyphicon-star"></span>';
            $s .= '<span class="glyphicon glyphicon-star"></span>';
            $s .= '<span class="glyphicon glyphicon-star"></span>';
            $s .= '<span class="glyphicon glyphicon-star-empty"></span>';
            $s .= '<span class="glyphicon glyphicon-star-empty"></span>';
            break;

        case 4:
            $s .= '<span class="glyphicon glyphicon-star"></span>';
            $s .= '<span class="glyphicon glyphicon-star"></span>';
            $s .= '<span class="glyphicon glyphicon-star"></span>';
            $s .= '<span class="glyphicon glyphicon-star"></span>';
            $s .= '<span class="glyphicon glyphicon-star-empty"></span>';
            break;

        case 5:
            $s .= '<span class="glyphicon glyphicon-star"></span>';
            $s .= '<span class="glyphicon glyphicon-star"></span>';
            $s .= '<span class="glyphicon glyphicon-star"></span>';
            $s .= '<span class="glyphicon glyphicon-star"></span>';
            $s .= '<span class="glyphicon glyphicon-star"></span>';
    }

    return $s;
}

function getShoppingCart(): array
{
    // Default is empty shopping cart array
    $cartItems = [];

    if (isset($_SESSION['cart'])) {
        $cartItems = $_SESSION['cart'];
    }

    return $cartItems;
}

function addItemToCart(string $id): void
{
    $cartItems = getShoppingCart();
    $cartItems[$id] = 1;

    $_SESSION['cart'] = $cartItems;
}

function removeItemFromCart(string $id): void
{
    $cartItems = getShoppingCart();
    unset($cartItems[$id]);
    $_SESSION['cart'] = $cartItems;
}

function getQuantity(string $id, array $cart): int
{
    if (isset($cart[$id])) {
        return $cart[$id];
    }

    // If $id not found, then return zero
    return 0;
}

function increaseCartQuantity(string $id): void
{
    $cartItems = getShoppingCart();
    $quantity = getQuantity($id, $cartItems);
    $newQuantity = $quantity + 1;
    $cartItems[$id] = $newQuantity;

    $_SESSION['cart'] = $cartItems;
}

function reduceCartQuantity(string $id): void
{
    $cartItems = getShoppingCart();
    $quantity = getQuantity($id, $cartItems);
    $newQuantity = $quantity - 1;

    if ($newQuantity < 1) {
        unset($cartItems[$id]);
    } else {
        $cartItems[$id] = $newQuantity;
    }

    $_SESSION['cart'] = $cartItems;
}


function getAllProducts(): array
{
    $products = [];
    $products['010'] = [
        'name' => 'Sandwich',
        'category' => 'savory',
        'description' => 'A filling, savory snack of peanut butter and jelly.',
        'price' => 1.00,
        'stars' => 4,
        'image' => 'peanut_butter.png'];

    $products['025'] = [
        'name' => 'Slice of cheesecake',
        'category' => 'sweet',
        'description' => 'Treat yourself to a chocolate-covered cheesecake slice.',
        'price' => 2.00,
        'stars' => 5,
        'image' => 'chocolate_cheese_cake.png'];

    $products['005'] = [
        'name' => 'Pineapple',
        'category' => 'fruit',
        'description' => 'A piece of exotic fruit.',
        'price' => 3.00,
        'stars' => 2,
        'image' => 'pineapple.png'];

    $products['021'] = [
        'name' => 'Jelly Donut',
        'category' => 'sweet',
        'description' => 'The best type of donut - filled with sweet jam.',
        'price' => 4.50,
        'stars' => 3,
        'image' => 'jellydonut.png'];

    $products['002'] = [
        'name' => 'Banana',
        'category' => 'fruit',
        'description' => 'The basis for a good smoothie and high in potassium.',
        'price' => 0.50,
        'stars' => 5,
        'image' => 'banana.png'];

    return $products;
}

function displayProducts(): void
{
    $products = getAllProducts();
    require_once APP_PATH . 'app/views/pages/list.php';
}

function displayCart(): void
{
    $products = getAllProducts();
    $cartItems = getShoppingCart();

    if (!empty($cartItems)) {
        require_once APP_PATH . 'app/views/pages/cart.php';
    } else {
        require_once APP_PATH . 'app/views/pages/emptyCart.php';
    }
}

function killSession() {
    $_SESSION = [];

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    session_destroy();
}

function errorPage(string $errorCode): void
{
    http_response_code($errorCode);
    require_once APP_PATH . 'app/views/errors/' . $errorCode . '.php';
}

// The book uses two separate arrays for bankers vs. users, but a more 
// common way to do this is to have a single "database" of users with a way
// to indicate whether a user is an admin or not, so that's how we'll do it
// in this example. In a typical application, it's often better to have a way
// of associating multiple roles with a user (e.g. a user could be both an
// admin and a manager), but for simplicity we'll just have a single "isAdmin"
// value for each user in this example. Additionally, in a real application
// you would never store passwords in plain text like this (you would use
// hashing), but this is sufficient for demonstration purposes.
function getUsers(): array
{
    $users = [];

    if (file_exists(APP_PATH . 'app/storage/users.json')) {
        $users = json_decode(file_get_contents(APP_PATH . 'app/storage/users.json'), true);
    }

    return $users;
}

function saveUsers(array $users): void
{
    file_put_contents(APP_PATH . 'app/storage/users.json', json_encode($users));
}

function validLoginCredentials(string $username, string $password): bool
{
    $users = getUsers();

    if (isset($users[$username])) {
        $storedPassword = $users[$username]['password'];
        if ($password == $storedPassword) {
            return true;
        }
    }

    // If we get here, no matching username/password
    return false;
}

// Two common ways to check if a user is an admin are:
// 1. Store a value like "role" or "isAdmin" in the session when the
//    user logs in and check that value
// 2. Go back to the "database" (in this case, the array returned by
//    getUsers()) to check if the user is an admin
// The first way is more efficient since it doesn't require going back to
// the "database" every time we want to check if the user is an admin, but
// the second way allows us to change a user's admin status without
// requiring them to log out and log back in (since the admin status is
// checked against the "database" each time instead of being stored in
// the session at login time). For this reason, we'll use the second way
// in this example, showing the alternative to the method presented in
// chapter 16.
function isAdmin(string $username): bool
{
    $users = getUsers();

    if (isset($users[$username])) {
        return $users[$username]['isAdmin'];
    }

    // If we get here, no matching username
    return false;
}

function getCurrentUser(): string
{
    if (isset($_SESSION['username'])) {
        return $_SESSION['username'];
    }

    return '';
}

function login(string $username, string $password): void
{
    if (validLoginCredentials($username, $password)) {
        // Regenerate session ID to prevent session fixation attacks
        session_regenerate_id(true);
        
        // Store username in session to indicate user is logged in
        $_SESSION['username'] = $username;

        // Return true to indicate successful login
        if (isAdmin($username)) {
            redirect('/admin', 303); // Redirect to admin page after login
        } else {
            redirect('/orders', 303); // Redirect to user's orders page after login
        }
    }

    // If we get here, login failed
    setFlashMessage('<div class="alert alert-danger">Invalid login credentials - try again</div>');
    redirect('/login', 303); // Redirect back to login page with error message
}

function setFlashMessage(string $message): void
{
    if (isset($_SESSION['flash_message'])) {
        // If a flash message already exists, append the new message to it
        $_SESSION['flash_message'] .= $message;
    } else {
        // Otherwise, set the flash message to the new message
        $_SESSION['flash_message'] = $message;
    }
}

function getFlashMessage(): string
{
    if (isset($_SESSION['flash_message'])) {
        $message = $_SESSION['flash_message'];
        unset($_SESSION['flash_message']); // Clear the flash message after retrieving it
        return $message;
    }

    return '';
}

function logout(): void
{
    killSession();
    redirect('/', 303); // Redirect to home page after logout
}

function redirect(string $url, int $statusCode = 302): void
{
    http_response_code($statusCode);
    header('Location: ' . $url);
    exit();
}

function isLoggedIn(): bool
{
    return isset($_SESSION['username']);
}

function displayOrders(): void
{
    require_once APP_PATH . 'app/views/pages/exercises/14-4-orders.php';
}

function displayAdmin(): void
{
    require_once APP_PATH . 'app/views/pages/exercises/14-3-admin.php';
}

function displayCheckout(): void
{
    require_once APP_PATH . 'app/views/pages/exercises/14-1-checkout.php';
}

function displayShipOrder(): void
{
    require_once APP_PATH . 'app/views/pages/exercises/14-5-ship-order.php';
}

function calculateTax(float $amount): float
{
    // For demonstration purposes, we'll just use a flat tax rate of 5.5%
    return $amount * 0.055;
}

function calculateShipping(float $amount): float
{
    // For demonstration purposes, we'll just use a flat shipping rate of $5.00 unless the subtotal is over $50, in which case shipping is free
    if ($amount > 50) {
        return 0.00;
    }
    return 5.00;
}

function getOrders(): array
{
    $orders = [];

    if (file_exists(APP_PATH . 'app/storage/orders.json')) {
        $orders = json_decode(file_get_contents(APP_PATH . 'app/storage/orders.json'), true);
    }

    return $orders;
}

function saveOrders(array $orders): void
{
    file_put_contents(APP_PATH . 'app/storage/orders.json', json_encode($orders));
}

function storeOrder(array $order): void
{
    $orders = getOrders();

    $orders[] = $order;

    saveOrders($orders);
}

function shipOrder(string $orderId): void
{
    require_once APP_PATH . 'app/views/pages/exercises/14-5-ship-order.php';
}

// Exercise 14-2: implement the order processing logic for the checkout page.
function placeOrder(): void
{
    // If the user is logged in, we can get their email address from the session, otherwise we need to get it from the form input and validate it.
    if (isLoggedIn()) {
        $email = getCurrentUser();
    } else {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        if (!$email) {
            setFlashMessage('<div class="alert alert-danger">Please enter a valid email address</div>');
            displayCheckout();
            return;
        }

        // TODO: if the user is not logged in, check if the email address is already associated with an existing user account and if so, display an error message asking them to log in instead of creating a new account.

        // If the email address is not already associated with an existing user account, create a new user account for them with a randomly generated password and save it to the "database" (in this case, the users.json file).
        $users = getUsers();
        $password = bin2hex(random_bytes(8)); // Generate a random 16-character hexadecimal password
        $users[$email] = [
            'password' => $password,
            'isAdmin' => false
        ];
        saveUsers($users);
    }
    
    // create a new order with the order details and save it to a file using storeOrder().
    $orderInfo['o-' . uniqid()] = [
        'email' => $email,
        'orderDate' => date('Y-m-d H:i:s'),
        'status' => 'Processing',
        'items' => [], // TODO: get the items in the cart and include them in the order details
        'subtotal' => 0.00, // TODO: calculate the subtotal price based on the items in the cart
        'tax' => 0.00, // TODO: calculate the tax using calculateTax() based on the subtotal price
        'shipping' => 0.00, // TODO: calculate the shipping cost using calculateShipping() based on the subtotal price
        'total' => 0.00, // TODO: calculate the total price by adding the subtotal, tax, and shipping costs together
    ];
    storeOrder($orderInfo);

    // display the confirmation message and redirect the user to the orders page
    if (isLoggedIn()) {
        setFlashMessage('<div class="alert alert-success">Order placed successfully! Thank you for your purchase.</div>');
        redirect('/orders', 303); // Redirect to orders page after placing order (the orders page will display the flash message we just set)
    } else {
        setFlashMessage('<div class="alert alert-success">Order placed successfully! Thank you for your purchase. An account has been created for you with the email address you provided.</div>');
        login($email, $password); // Log the user in, which will also redirect them to the orders page, and display the flash message we just set
    }
    
}