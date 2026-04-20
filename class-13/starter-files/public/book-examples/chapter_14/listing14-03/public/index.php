<link rel="icon" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAAADElEQVQI12P4//8/AAX+Av7czFnnAAAAAElFTkSuQmCC">

<?php
session_start();

$pageHits = 0;
if (isset($_SESSION['counter'])) {
    $pageHits = $_SESSION['counter'];
}

$pageHits++;

$_SESSION['counter'] = $pageHits;

print "<p>Counter (number of page hits): $pageHits</p>";
