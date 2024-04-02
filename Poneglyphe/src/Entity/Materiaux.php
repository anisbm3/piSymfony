<?php

namespace App\Entity;
use App\Repository\MateriauxRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass:MateriauxRepository::class)]
class Materiaux
{
    #[ORM\Column]
    #[ORM\Id]
    #[ORM\GeneratedValue]
    private ?int $idma=null;

    
    #[ORM\Column(length:255)]
    private ?string $nomma;

   
    #[ORM\Column(length:255)]
    private ?string $typema=null;

   
    #[ORM\Column(length:65535)]
    private ?string $disponibilite=null;

    public function getIdma(): ?int
    {
        return $this->idma;
    }

    public function getNomma(): ?string
    {
        return $this->nomma;
    }

    public function setNomma(?string $nomma): static
    {
        $this->nomma = $nomma;

        return $this;
    }

    public function getTypema(): ?string
    {
        return $this->typema;
    }

    public function setTypema(string $typema): static
    {
        $this->typema = $typema;

        return $this;
    }

    public function getDisponibilite(): ?string
    {
        return $this->disponibilite;
    }

    public function setDisponibilite(string $disponibilite): static
    {
        $this->disponibilite = $disponibilite;

        return $this;
    }


}
