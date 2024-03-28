<?php
namespace src\Models;

use DateTime;
use src\Services\Hydratation;

class User {
    private int $id;
    private string $prenom;
    private string $nom;
    private string $email;
    private int $telephone;
    private DateTime $RGPD;
    private string $adresse;
    private string $role;
  
    use Hydratation;

    public function getPrenom(): string {return $this->prenom;}

	public function getNom(): string {return $this->nom;}

	public function getEmail(): string {return $this->email;}

	public function getTelephone(): int {return $this->telephone;}

	public function getRGPD(): DateTime {return $this->RGPD;}

	public function getAdresse(): string {return $this->adresse;}

	public function getRole(): string {return $this->role;}

	public function setPrenom(string $prenom): void {$this->prenom = $prenom;}

	public function setNom(string $nom): void {$this->nom = $nom;}

	public function setEmail(string $email): void {$this->email = $email;}

	public function setTelephone(int $telephone): void {$this->telephone = $telephone;}

	public function setRGPD(DateTime $RGPD): void {
        if ($RGPD instanceof DateTime) {
            $this->RGPD = $RGPD;
          } else {
            $this->RGPD = new DateTime($RGPD);
          }
    }

	public function setAdresse(string $adresse): void {$this->adresse = $adresse;}

	public function setRole(string $role): void {$this->role = $role;}

}