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
    public function getReservationID(int $ID): Reservation{
        $sql = 'SELECT * FROM `b5_reservations` WHERE ID;';

        $statement = $this->DB->prepare($sql);
        $statement->bindValue(':ID', $ID);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, Reservation::class);
        return $statement->fetch();
    }
}
