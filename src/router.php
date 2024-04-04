<?php

use src\Repositories\UserRepository;
use src\controllers\HomeController;
use src\Repositories\ReservationRepository;
use src\controllers\ReservationController;

$HomeController = new HomeController;
$ReservationController = new ReservationController;

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
    case HOME_URL.'dashboard':
        $ReservationController->showReservation();

    case HOME_URL.'treatment':
        $ReservationController->formTreatment();

    default:
        $HomeController->page404();
        break;
}
