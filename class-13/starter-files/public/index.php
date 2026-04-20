<?php
define('APP_PATH', __DIR__.'/../');

require_once(APP_PATH.'app/lib/functions.php');

$page = getString('page');
if ($page !== '') {
    $page = trim($page, '/ ');
    $page = strtolower($page);
}

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

    if ($page === '') {
        $page = trim($requestPath, '/ ');
        if ($page === 'index.php') {
            $page = '';
        } elseif (str_starts_with($page, 'index.php/')) {
            $page = substr($page, strlen('index.php/'));
        }
        $page = strtolower($page);
    }
}

ob_start();
$pageInfo = [];
$status = '200 Found';
switch ($page) {  
    case '': // home page case  
        include(APP_PATH.'app/views/pages/home.php');
        break;
    case 'sessions':
        $pageInfo['title'] = 'Sessions';
        include(APP_PATH.'app/views/pages/sessions.php');
        break;
    case 'cookies':
        $pageInfo['title'] = 'Cookies';
        include(APP_PATH.'app/views/pages/cookies.php');
        break;
    case 'ex/13-1':  
        $pageInfo['title'] = 'Exercise 13-1: Login';
        include(APP_PATH.'app/views/pages/exercises/13-1-login.php');
        break;
    case 'ex/13-1/logout':  
        $pageInfo['title'] = 'Exercise 13-1: Logout';
        include(APP_PATH.'app/views/pages/exercises/13-1-logout.php');
        break;
    case 'ex/13-1/welcome':  
        $pageInfo['title'] = 'Exercise 13-1: Welcome';
        include(APP_PATH.'app/views/pages/exercises/13-1-welcome.php');
        break;
    case 'ex/13-2':  
        $pageInfo['title'] = 'Exercise 13-2: Color Preference';
        include(APP_PATH.'app/views/pages/exercises/13-2-color-preference.php');
        break;
    case 'ex/13-3':  
        $pageInfo['title'] = 'Exercise 13-3: Nag Counter';
        include(APP_PATH.'app/views/pages/exercises/13-3-nag-counter.php');
        break;
    case 'ex/13-4':  
        $pageInfo['title'] = 'Exercise 13-4: Guessing Game';
        include(APP_PATH.'app/views/pages/exercises/13-4-guessing-game.php');
        break;
    case 'ex/13-5':  
        $pageInfo['title'] = 'Exercise 13-5: Product List';
        include(APP_PATH.'app/views/pages/exercises/13-5-product-list.php');
        break;
    case 'ex/13-5/details':  
        $pageInfo['title'] = 'Exercise 13-5: Product Details';
        include(APP_PATH.'app/views/pages/exercises/13-5-product-details.php');
        break;
    default: // display a "page not found" page in all other cases
        $status = '404 Not Found';
        http_response_code(404);
        include(APP_PATH.'app/views/errors/404.php'); 

}
$pageContent = ob_get_clean();

include(APP_PATH.'app/views/partials/header.php');
echo $pageContent;
include(APP_PATH.'app/views/partials/footer.php');
