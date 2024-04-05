<?php

namespace src\Repositories;

use PDO;
use src\Models\Database;
use src\Models\Reservation;

class ReservationRepository{
    private $DB;

    public function __construct()
    {
        $database = new Database;
        $this->DB = $database->getDB();
    
        require_once __DIR__ . '/../../config.php';
    }
    public function getAllReservation()
    {
        $sql = "SELECT * FROM `b5_reservations`";
        return $this->DB->query($sql)->fetchAll(PDO::FETCH_CLASS, Reservation::class);
    }

    public function getReservationById(int $ID){
        $sql = 'SELECT 
        b5_reservations.id_reservation AS ID,
        b5_reservations.quantite,
        b5_reservations.casque,
        b5_reservations.luge,
        b5_reservations.prix,
        b5_reservations.id_utilisateurs,
        b5_formules.typeDePass,
        b5_nuitées.nom as type_de_nuitee
    FROM 
        b5_reservations
    LEFT JOIN 
        b5_relation_reservation_formules ON b5_reservations.id_reservation = b5_relation_reservation_formules.id_reservation
    LEFT JOIN 
        b5_formules ON b5_relation_reservation_formules.id_formules = b5_formules.id_formules
    LEFT JOIN 
        b5_relation_reservation_nuitees ON b5_reservations.id_reservation = b5_relation_reservation_nuitees.id_reservation
    LEFT JOIN 
        b5_nuitées ON b5_relation_reservation_nuitees.id_nuitee = b5_nuitées.id_nuitee
        WHERE b5_reservations.id_utilisateurs= :ID;';

        $statement = $this->DB->prepare($sql);
        $statement->bindValue(':ID', $ID);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, Reservation::class);
        $reservation = $statement->fetch();
        return $reservation;
    }

    public function createThisReservation(Reservation $reservation): bool
    {
        $sql = 'INSERT INTO `b5_reservations` (quantite, luge, casque, id_utilisateurs, prix) VALUES (:quantite, :luge, :casque, :id_utilisateurs, :prix)';
        $statement = $this->DB->prepare($sql);

        return $statement->execute([
            'quantite'           => $reservation->getQuantite(),
            'luge'               => $reservation->getLuge(),
            'casque'             => $reservation->getCasque(),
            'id_utilisateurs'    => $reservation->getIdUtilisateurs(),
            'prix'               => $reservation->getPrix()
        ]);
    }
}
