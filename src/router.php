<?php

use src\Repositories\UserRepository;
use src\controllers\HomeController;
use src\Repositories\ReservationRepository;

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
           $AllUsers= new ReservationRepository();
            var_dump($AllUsers->getAllReservation());

    default:
        $HomeController->page404();
        break;
}
