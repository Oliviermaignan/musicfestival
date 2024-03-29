<?php

namespace src\Controllers;

use src\Services\Response;

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
                $nombreCasquesEnfants = htmlspecialchars($_POST['nombreCasquesEnfants']);
            } else {
                $nombreCasquesEnfants = 0;
            }

            
            if (isset($_POST['nombreLugesEte']) && (int)$_POST['nombreLugesEte'] > 0) {
                $nombreLugesEte = htmlspecialchars($_POST['nombreLugesEte']);
            } else {
                $nombreLugesEte = 0;
            }


            $nombrePlaces = (int) $_POST['nombrePlaces'];


            $idFormules = "";
            if (isset($_POST['passSelection'])){
                switch ($_POST['passSelection']) {
                    case 'pass1jour':
                        $idFormules = 1;
                        break;
                    
                    case 'pass2jours':
                        $idFormules = 3;
                        break;
                    
                    case 'pass3jours':
                        $idFormules = 5;
                        break;
                    
                    default:
                        if (isset($_POST['passSelectionTarifReduit'])){
                            switch ($_POST['passSelectionTarifReduit']) {
                                case 'pass1jourreduit':
                                    $idFormules = 2;
                                    break;
                                
                                case 'pass2joursreduit':
                                    $idFormules = 4;
                                    break;
                                
                                default:
                                    $idFormules = 6;
                                    break;
                            }
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

             var_dump($_POST);
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
                    
                    case 'van3Nuits':
                        $idNuitee = 6;
                        break;
                    
                    default:
                        if(isset($_POST['campingTente'])){
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
                break;
                }
            }


            $prix = "";

            echo '<pre>',
                'nom :' . $nom, '<BR>' .
                'prenom :' .  $prenom,  '<BR>' .
                'mail :' . $email,  '<BR>' .
                'tel :' . $tel,  '<BR>' .
                'adresse :' . $adresse,  '<BR>' .
                'nmbre cask:' . $nombreCasquesEnfants, '<BR>' . 
                'nmbre luges:' . $nombreLugesEte, '<BR>' . 
                'nmbre places:' . $nombrePlaces, '<BR>' . 
                'prix:' . $prix, '<BR>' . 
                'idformules:' . $idFormules, '<BR>' . 
                'idNuitee:' . $idNuitee, '<BR>' . 
                '</pre>';

        } else {
            echo 'les champs ne sont pas remplis';
        }
    }
}