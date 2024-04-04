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
    public function getReservationById(int $ID): Reservation{
        $sql = 'SELECT * FROM `b5_reservations` WHERE id_reservation = :ID ;';

        $statement = $this->DB->prepare($sql);
        $statement->bindValue(':ID', $ID);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, Reservation::class);
        return $statement->fetch();
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
