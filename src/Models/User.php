<?php
namespace src\Models;

use DateTime;
use src\Services\Hydratation;

class User {
  private $id;
  private $prenom;
  private $nom;
  private $email;
  private $telephone;
  private $RGPD;
  private $adressePostale;
  private $role;
  private $motDePasse;

  use Hydratation;

  public function getId(): int {return $this->id;}

  public function getPrenom(): string {return $this->prenom;}

	public function getNom(): string {return $this->nom;}

	public function getEmail(): string {return $this->email;}

	public function getTelephone(): int {return $this->telephone;}

	public function getRGPD(): string {   return $this->RGPD->format('Y-m-d');}

	public function getadressePostale(): string {return $this->adressePostale;}

	public function getRole(): string {return $this->role;}

	public function getMotDePasse(): string {return $this->motDePasse;}

	public function setId(int | null $id): void {$this->id = $id;}

	public function setPrenom(string $prenom): void {$this->prenom = $prenom;}

	public function setNom(string $nom): void {$this->nom = $nom;}

	public function setEmail(string $email): void {$this->email = $email;}

	public function setTelephone(int $telephone): void {$this->telephone = $telephone;}

	public function setRGPD(string | DateTime $RGPD): void {
        if ($RGPD instanceof DateTime) {
            $this->RGPD = $RGPD;
          } else {
            $this->RGPD = new DateTime($RGPD);
          }
    }

	public function setadressePostale(string $adressePostale): void {$this->adressePostale = $adressePostale;}

	public function setRole(string | null $role): void {
    if ($role === null) {
      $this->role = 'user';
    } else {
      $this->role = $role;
    }
  }

  public function setMotDePasse(string $motDePasse): void {$this->motDePasse = $motDePasse;}

}