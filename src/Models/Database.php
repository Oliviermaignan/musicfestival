<?php

namespace src\Models;

use PDO;
use PDOException;

class Database {
    private $DB;
    private $config;

    public function __construct()
    {
        $this->config = __DIR__ . '/../../config.php';
        require_once $this->config;

        try {
            $base = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
            $this->DB = new PDO($base, DB_USER, DB_PWD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (PDOException $error) {
          echo 'Erreur de connexion à la base de Données : '. $error->getMessage();
        }
    }
    public function getDB(): PDO
    {
      return $this->DB;
    }
}

