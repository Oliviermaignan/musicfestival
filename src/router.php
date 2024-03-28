<?php

use src\Repositories\UserRepository;
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
    case HOME_URL.'test':
        $AllUsers= new UserRepository();
        var_dump($AllUsers->getThisUserById(2));
    default:
        $HomeController->page404();
        break;
}
