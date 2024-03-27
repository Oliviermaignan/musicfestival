<?php

use src\controllers\HomeController;

$HomeController = new HomeController;

$route = $_SERVER['REDIRECT_URL'];
$methode = $_SERVER['REQUEST_METHOD'];

switch ($route) {
    case HOME_URL:

        if (isset($_SESSION['connecté'])) {
        header('location: '.HOME_URL.'dashboard');
        die;
        } else {
        $HomeController->index();
        }
        break;
      
    default:
        $HomeController->page404();
        break;
}
