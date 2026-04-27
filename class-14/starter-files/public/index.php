<?php
session_start();
define('APP_PATH', __DIR__ . '/../');

require_once APP_PATH . 'app/lib/functions.php';

// Try to find "action" in query-string variables
$action = filter_input(INPUT_GET, 'action') ?? ''; // default to "list" if no "action" is found

if (PHP_SAPI === 'cli-server') {
    $requestUri = $_SERVER['REQUEST_URI'] ?? '/';
    $requestPath = parse_url($requestUri, PHP_URL_PATH) ?: '/';

    $publicRoot = realpath(__DIR__);
    $requestedFile = realpath(__DIR__ . $requestPath);

    if (
        $requestedFile !== false &&
        $publicRoot !== false &&
        str_starts_with($requestedFile, $publicRoot) &&
        is_file($requestedFile)
    ) {
        return false;
    }

    if ($action === '') {
        $action = trim($requestPath, '/ ');
        if ($action === 'index.php') {
            $action = '';
        } elseif (str_starts_with($action, 'index.php/')) {
            $action = substr($action, strlen('index.php/'));
        }
        $action = strtolower($action);
    }
}

switch ($action){

    case 'cart':
        displayCart();
        break;

    case 'addToCart':
        $id = filter_input(INPUT_GET, 'id');

        $products = getAllProducts();
        $productExists = array_key_exists($id, $products);
        $validId = !empty($id) && $productExists;
        if($validId){
            addItemToCart($id);
            displayCart();
        } else {
            displayProducts();
        }
        break;

    case 'removeFromCart':
        $id = filter_input(INPUT_GET, 'id');
        removeItemFromCart($id);
        displayCart();
        break;

    case 'changeCartQuantity':
        $id = filter_input(INPUT_GET, 'id');
        $changeDirection = filter_input(INPUT_POST, 'changeDirection');

        if ($changeDirection == 'increase') {
            increaseCartQuantity($id);
        } else {
            reduceCartQuantity($id);
        }

        displayCart();
        break;

    case 'emptyCart':
        killSession();
        displayCart();
        break;
    
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = filter_input(INPUT_POST, 'username');
            $password = filter_input(INPUT_POST, 'password');
            login($username, $password);
        } else {
            require_once APP_PATH . 'app/views/pages/login.php';
        }
        break;
    case 'checkout':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            placeOrder();
        } else {
            displayCheckout();
        }
        break;
    case 'logout':
        logout();
        break;
    case 'orders':
        displayOrders();
        break;
    case 'admin':
        displayAdmin();
        break;
    case 'ship-order':
        $orderId = filter_input(INPUT_GET, 'id');
        shipOrder($orderId);
        break;


    case '':
        displayProducts();
        break;

    default:
        errorPage('404');

}
