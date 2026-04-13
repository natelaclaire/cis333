<?php
define('APP_PATH', __DIR__.'/../');

require(APP_PATH.'vendor/autoload.php');

require_once(APP_PATH.'app/lib/functions.php');
require_once(APP_PATH.'app/lib/storage.php');

$config = loadConfig();

$page = getString('page');
if ($page !== '') {
    $page = trim($page);
    $page = strtolower($page);
    $page = str_replace('_', '-', $page);
    $page = preg_replace('/[\\/\\\\:*?"<>|.]|\\s/', '', $page); // /[\/\\:*?"<>|.]|\s/
}

ob_start();
$pageInfo = [];
$status = '200 Found';
switch ($page) {  
    case '': // home page case  
        include(APP_PATH.'app/views/pages/home.php');  
        break;
    case 'portfolio':
        $pageInfo['title'] = 'Portfolio';
        include(APP_PATH.'app/views/pages/portfolio.php');  
        break;
    case 'services':
        $pageInfo['title'] = 'Services';
        include(APP_PATH.'app/views/pages/services.php');  
        break;
    case 'contact-us':  
        $pageInfo['title'] = 'Contact Us';
        include(APP_PATH.'app/views/pages/contact-us.php');  
        break;
    default: // load the page if there is a markdown file; display a "page not found" page in all other cases
      if (validPage($page)){
        echo '<div class="container">';
        $pageInfo = fetchPage($page);
        echo $pageInfo['content'];
        echo '</div>';
      } else{
          $status = '404 Not Found';
          http_response_code(404);
          include(APP_PATH.'app/views/errors/404.php'); 
      }

}
writeVisitLog($status);  
$pageContent = ob_get_clean();

include(APP_PATH.'app/views/partials/header.php');
echo $pageContent;
include(APP_PATH.'app/views/partials/footer.php');
