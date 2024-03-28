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
}