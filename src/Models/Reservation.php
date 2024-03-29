<?php
namespace src\Models;

use src\Services\Hydratation;

class Reservation{
    private $id;
    private $quantite;
    private $casque;
    private $luge;
    private $prix;
    private $typeDePass;
    private $typeDeNuitee;
    private $idUtilisateurs;

        use Hydratation;
    public function __construct(array $data = array())
    {
        $this->hydrate($data);
    }

    public function getId(): int
	{
		return $this->id;
	}
    public function setId(int $id): void
	{
		$this->Id = $id;
	}
    public function getQuantite(): int
	{
		return $this->quantite;
	}
    public function setQuantite(int $quantite): void
	{
		$this->quantite = $quantite;
	}
    public function getCasques(): int 
    {
        return $this->casque;
    }
    public function setCasques($casque) 
    {
        $this->luge = $casque;
    }
    public function getLuges(): int 
    {
        return $this->luge;
    }
    public function setLuge($luge) 
    {
        $this->luge = $luge;
    }
    public function getIdUtilisateurs(): int
	{
		return $this->idUtilisateurs;
	}
    public function setIdUtilisateurs(int $idUtilisateurs): void
	{
		$this->IdUtilisateurs = $idUtilisateurs;
	}
    function getPrix(): int
    {
        return $this->prix;
    }    
    function setPrix(int $prix): void
    {
        $this->prix = $prix;
    }
  
    function getTypeDePass(): string
    {
        return $this->typeDePass;
    }    
    function setTypeDePass(string $typeDePass): void
    {
        $this->typeDePass = $typeDePass;
    }
    function getTypeDeNuitee(): string
    {
        return $this->typeDeNuitee;
    }    
    function setTypeDeNuitee(string $typeDeNuitee): void
    {
        $this->typeDePass = $typeDeNuitee;
    }
}