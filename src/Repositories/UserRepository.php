<?php

namespace src\Repositories;

use src\Models\User;
use PDO;
use src\Models\Database;

class UserRepository
{
  private $DB;

  public function __construct()
  {
    $database = new Database;
    $this->DB = $database->getDB();

    require_once __DIR__ . '/../../config.php';
  }

  public function getAllUsers(){
    $sql = "SELECT * FROM b5_utilisateurs;";
    return  $this->DB->query($sql)->fetchAll(PDO::FETCH_CLASS, User::class);
  } 

  public function getThisUserById($id): User
  {
    $sql = "SELECT * FROM b5_utilisateurs where b5_utilisateurs.id = :id;";

    $statement = $this->DB->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_CLASS, User::class);
    return $statement->fetch();
  }

  public function createThisUser(User $User): User
  {
    $sql = "INSERT INTO  (id, prenom, nom, email, telephone, RGPD, adresse_postale, role, motDePasse) VALUES (:id, :prenom, :nom, :email, :telephone, :RGPD, :adresse_postale, :role, :motDePasse);";

    $statement = $this->DB->prepare($sql);

    $statement->execute([
      ':prenom'            => $User->getPrenom(),
      ':nom'               => $User->getNom(),
      ':email'             => $User->getEmail(),
      ':telephone'         => $User->getTelephone(),
      ':RGPD'              => $User->getRGPD(),
      ':adresse_postale'   => $User->getAdressePostale(),
      ':role'              => $User->getRole(),
      ':motDePasse'        => $User->getMotDePasse()
    ]);

    $id = $this->DB->lastInsertId();
    $User->setId($id);

    return $film;
  }


}