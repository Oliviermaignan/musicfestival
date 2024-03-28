<?php
namespace src\Models;

use src\Services\Hydratation;

class Reservation{
    private $Id;
    private $quantite;
    private $casque;
    private $luge;
    private $tarif;
    private $joursChoisis;
    private $Tentes;
    private $Camions;
    private $IdUtilisateurs;

        use Hydratation;
    public function __construct(array $data = array())
    {
        $this->hydrate($data);
    }

    public function getId(): int
	{
		return $this->Id;
	}
    public function setId(int $Id): void
	{
		$this->Id = $Id;
	}
    public function getquantite(): int
	{
		return $this->quantite;
	}
    public function setquantite(int $quantite): void
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
		return $this->IdUtilisateurs;
	}
    public function setIdUtilisateurs(int $IdUtilisateurs): void
	{
		$this->IdUtilisateurs = $IdUtilisateurs;
	}
    function getTarif(): int
    {
        return $this->tarif;
    }    
    function settarif(int $tarif): void
    {
        $this->tarif = $tarif;
    }
  
    function getjoursChoisis(): string
    {
        return $this->joursChoisis;
    }    
    function setjoursChoisis(string $joursChoisis): void
    {
        $this->joursChoisis = $joursChoisis;
    }
    function getTentes(): int
    {
        return $this->Tentes;
    }    
    function setTentes(int $Tentes): void 
    {
        $this->Tentes = $Tentes;
    }
    function getCamions(): int
    {
        return $this->Camions;
    }    
    function setCamions(int $Camions): void
    {
        $this->Camions = $Camions;
    }
}