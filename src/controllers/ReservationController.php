<?php

namespace src\Controllers;

use src\Services\Response;

class ReservationController
{


    use Response;

    public function Formtreatment(){
        if (
            isset($_POST['nom'])
            && isset($_POST['prenom'])
            && isset($_POST['email'])
            && isset($_POST['telephone'])
            && isset($_POST['adressePostale'])
            && isset($_POST['motDePasse'])
        ) {
            echo 'les données sont set';
        }
    }
}