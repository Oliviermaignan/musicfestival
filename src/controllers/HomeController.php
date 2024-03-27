<?php

namespace src\Controllers;

use src\Services\Response;

class HomeController
{

  use Response;

  public function index(): void
  {
    if (isset($_GET['erreur'])) {
      $erreur = htmlspecialchars($_GET['erreur']);
    } else {
      $erreur = '';
    }

    $this->render("accueil", ["erreur"=> $erreur]);
  }

  public function page404(): void
  {    
    header("HTTP/1.1 404 Not Found");
    $this->render('404');
  }

  //a utiliser pour la déconnexion ?
//   public function quit()
//   {
//     session_destroy();
//     header('location: '.HOME_URL);
//     die();
//   }
}