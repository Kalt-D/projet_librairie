<?php

require 'autoload.php';

if (!isset($_GET['action'])) {
    $action = "accueil";
  } else {
    $action = $_GET['action'];
  } 
  
$controller = new App\Controllers\Frontend();

if (is_callable(array($controller, $action))) {
    $controller->$action();
} else {
    $controller->livres();
}

?>