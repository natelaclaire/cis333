<?php
require_once '../src/controllerFunctions.php';

$isGetMethod = ($_SERVER['REQUEST_METHOD'] === 'GET');
if ($isGetMethod) {
    displayForm();
} else {
    processForm();
}
