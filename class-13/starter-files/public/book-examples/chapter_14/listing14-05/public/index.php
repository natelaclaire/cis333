<link rel="icon" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABC
AIAAACQd1PeAAAADElEQVQI12P4//8/AAX+Av7czFnnAAAAAElFTkSuQmCC">

<?php
session_start();

$action = filter_input(INPUT_GET, 'action');
if ('reset' === $action) {
    unset($_SESSION['counter']);
}

$pageHits = 0;
if (isset($_SESSION['counter'])) {
    $pageHits = $_SESSION['counter'];
}

$pageHits++;

$_SESSION['counter'] = $pageHits;
?>

<p>Counter (number of page hits): <?= $pageHits ?>
<p><a href="/index.php">visit page again</a>
    <p><a href="/index.php?action=reset">(reset counter)</a>
