<?php

namespace src\Controllers;

use src\Services\Response;
use src\Models\User;
use src\Models\Reservation;
use src\Repositories\UserRepository;
use src\Repositories\ReservationRepository;

class ReservationController
{


    use Response;

    public function formTreatment(){
        if (
            isset($_POST['nom'])
            && isset($_POST['prenom'])
            && isset($_POST['email'])
            && isset($_POST['telephone'])
            && isset($_POST['adressePostale'])
            && isset($_POST['motDePasse'])
        ) {
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);

            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            } else {
                // faire une methode render qui affiche l'erreur dans le form
                echo 'email non valide';
            }


            // regEx pour valider le numéro de téléphone (de chatGPT)
            $pattern = '/^(\+\d{1,3})?\d{6,14}$/';


            if (filter_var((int)$_POST['telephone'], FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => $pattern)))) {
                $tel = filter_var($_POST['telephone'], FILTER_SANITIZE_NUMBER_INT);
            } else {
                echo 'erreur tel';
            }

            $adresse = htmlspecialchars($_POST['adressePostale']);

            if (isset($_POST['nombreCasquesEnfants']) && (int)$_POST['nombreCasquesEnfants'] > 0) {
                $nombreCasquesEnfants = (int)htmlspecialchars($_POST['nombreCasquesEnfants']);
            } else {
                $nombreCasquesEnfants = 0;
            }


            
            if (isset($_POST['nombreLugesEte']) && (int)$_POST['nombreLugesEte'] > 0) {
                $nombreLugesEte = (int)htmlspecialchars($_POST['nombreLugesEte']);
            } else {
                $nombreLugesEte = 0;
            }


            $nombrePlaces = (int) $_POST['nombrePlaces'];


            $idFormules = 0;
            if (isset($_POST['passSelection']) || isset($_POST['passSelectionTarifReduit']) ){
                if (isset($_POST['passSelection'])){
                    switch ($_POST['passSelection']) {
                        case 'pass1jour':
                            echo 'idform 1';
                            $idFormules = 1;
                            break;
                        
                        case 'pass2jours':
                            echo 'idform 3';
                            $idFormules = 3;
                            break;
                        
                        default:
                            echo 'idform 5';
                            $idFormules = 5;
                            break;
                    }
                } else if (isset($_POST['passSelectionTarifReduit'])){ 
                    switch ($_POST['passSelectionTarifReduit']) {
                    case 'pass1jourreduit':
                        echo 'idform 2';
                        $idFormules = 2;
                        break;
                        
                    case 'pass2joursreduit':
                        echo 'idform 4';
                        $idFormules = 4;
                        break;
                    
                    default:
                        echo 'idform 6';
                        $idFormules = 6;
                        break;
                    } 
                }
            }



                

            

            //commentaire car code un peu complexe a dechiffrer
            //correspondance ID dans BDD
            // Tente, 1 nuit, 5€ (numéro 1)
            // Tente, 2 nuits, 10€ (numéro 2)
            // Tente, 3 nuits, 12€ (numéro 3)
            // Camion, 1 nuit, 5€ (numéro 4)
            // Camion, 2 nuits, 10€ (numéro 5)
            // Camion, 3 nuits, 12€ (numéro 6)

            $idNuitee = "";

            
            // var_dump($_POST);



            if (isset($_POST['campingVan'])){
                switch ($_POST['nuitVan']) {
                    case 'vanNuit1':
                        if ($idFormules==3 || $idFormules==4){
                            $idNuitee = 5;
                        } else {
                            $idNuitee = 4;
                        }
                        break;
                    
                    case 'vanNuit2':
                        //si la résa est en deux jours ou deux jours tarif reduit la nuité passe en 2 nuits sinon 1 nuit
                        if ($idFormules==3 || $idFormules==4){
                            $idNuitee = 5;
                        } else {
                            $idNuitee = 4;
                        }
                        
                        break;
                    
                    case 'vanNuit3':
                        if ($idFormules==3 || $idFormules==4){
                            $idNuitee = 5;
                        } else {
                            $idNuitee = 4;
                        }
                        break;
                    
                    default :
                        $idNuitee = 6;
                        break;
                }
            } else if (isset($_POST['campingTente'])){
                switch ($_POST['nuitTente']) {
                    case 'tenteNuit1':
                     //si la résa est en deux jours ou deux jours tarif reduit la nuité passe en 2 nuits sinon 1 nuit
                        if ($idFormules==3 || $idFormules==4){
                            $idNuitee = 2;
                        } else {
                            $idNuitee = 1;
                        }
                        break;
                    
                    case 'tenteNuit2':
                        if ($idFormules==3 || $idFormules==4){
                            $idNuitee = 2;
                        } else {
                            $idNuitee = 1;
                        }
                        break;
                    
                    case 'tenteNuit3':
                        if ($idFormules==3 || $idFormules==4){
                            $idNuitee = 2;
                        } else {
                            $idNuitee = 1;
                        }
                        break;
                    
                    default:
                        $idNuitee = 3;
                        break;
                }
            }


            //on fait passer le prix par plusieurs switch pour le calculer
            $prix = "";
            if ($idFormules>0){
                switch ($idFormules) {
                    case '1':
                    $prix = 40;
                    break;
                    
                    case '2':
                    $prix = 25; 
                    break;
                    
                    case '3':
                    $prix = 70;
                    break;
                    
                    case '4':
                    $prix = 50;
                    break;

                    case '5':
                    $prix = 100;
                    break;
                    
                    default:
                    $prix = 65;
                    break;
                }
            }

            if (isset($nombreCasquesEnfants)){
                $prix += 2 * $nombreCasquesEnfants;
            } 
            if ( isset($nombreLugesEte)){
                $prix += 5 * $nombreLugesEte;
            }

            if ($idNuitee){
                switch ($idNuitee) {
                    case '1':
                        $prix += 5;
                        break;
                    
                    case '2':
                        $prix += 10;
                        break;
                    
                    case '3':
                        $prix += 12;
                        break;
                    
                    case '4':
                        $prix += 5;
                        break;
                    
                    case '5':
                        $prix += 10;
                        break;
                    
                    default:
                        $prix += 12;
                        break;
                }
            }

            if(isset($_POST['rgpd'])){
                $rgpd = new \DateTime();
            } 

            if(isset($_POST['motDePasse'])){
                $mdp = password_hash($_POST['motDePasse'], PASSWORD_DEFAULT);
            }


            // echo '<pre>',
            //     'nom :' . $nom, '<BR>' .
            //     'prenom :' .  $prenom,  '<BR>' .
            //     'mail :' . $email,  '<BR>' .
            //     'tel :' . $tel,  '<BR>' .
            //     'adresse :' . $adresse,  '<BR>' .
            //     'nmbre cask:' . $nombreCasquesEnfants . gettype($nombreCasquesEnfants) . '<BR>' . 
            //     'nmbre luges:' . $nombreLugesEte, '<BR>' . 
            //     'nmbre places:' . $nombrePlaces, '<BR>' . 
            //     'prix:' . $prix, '<BR>' . 
            //     'idformules:' . $idFormules, '<BR>' . 
            //     'idNuitee:' . $idNuitee, '<BR>' . 
            //     'rgpd:' . $rgpd->format('Y-m-d') . '<BR>' .
            //     'mot de passe: '. $mdp .
            //     '</pre>';

            //creation des classes en vues de l'écriture en BDD
            $User = new User();
            $User->setPrenom($prenom);
            $User->setNom($nom);
            $User->setEmail($email);
            $User->setTelephone($tel);
            $User->setAdressePostale($adresse);
            $User->setRGPD($rgpd);
            $User->setMotDePasse($mdp);
            $User->setRole(null);

            // var_dump($User);
            $userRepository = new UserRepository();
            $userRepository->createThisUser($User);

            //recupération du dernier ID pour l'inserer dans la table reservation
            $lastUserId = $userRepository->getLastId();
            // echo "l'id de l'utilisateur est : " . $lastUserId;

            $reservation = new Reservation();
            $reservation->setQuantite($nombrePlaces);
            $reservation->setLuge($nombreLugesEte);
            $reservation->setCasque($nombreCasquesEnfants);
            $reservation->setIdUtilisateurs($lastUserId);
            $reservation->setPrix($prix);

            // var_dump($reservation);
            $reservationRepository = new ReservationRepository;
            $reservationRepository->createThisReservation($reservation);
 
            //mettre l'id de l'utilisateur dans la session
            $_SESSION['idUtilisateur'] = $lastUserId;
            header('location: /dashboard');
            die;
        } else {
            header ("location:" .HOME_URL."?erreur=connexion");
        }
    }

    public function showReservation ($id){ 
        $reservationRepository = new ReservationRepository;
        $reservation = $reservationRepository->getReservationById($id);
        //faire de meme avec userRepository
        $userRepository = new UserRepository;
        $user = $userRepository->getThisUserById($id);
        $this->render('Dashboard', ['reservation' => $reservation, 'user' => $user]);
    }

}