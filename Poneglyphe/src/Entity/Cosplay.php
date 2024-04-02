<?php

namespace App\Entity;

use App\Repository\CosplayRepository;
use App\Entity\Materiaux;
use DateTime;
use Doctrine\DBAL\Types\Types;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass:CosplayRepository::class)]
class Cosplay
{
   
    #[ORM\Column]
    #[ORM\Id]
    #[ORM\GeneratedValue]
    private ?int $idcp=null;

    #[ORM\Column(length:300)]

    private ?string $nomcp=null;

    
    #[ORM\Column(length:300)]
    private ?string $descriptioncp=null;

    
    #[ORM\Column(length:255)]
    private ?string $personnage=null;

    
    #[ORM\Column(length:300)]
    private ?string $imagecp=null;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreation", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    #[ORM\Column]
    private ?DateTime $datecreation = 'CURRENT_TIMESTAMP';

    
    #[ORM\Column(length:255)]
    private ?string $nomma;

   
    #[ORM\ManyToOne(inversedBy:Cosplay)]
    private ?Materiaux $idmateriaux =null;

    public function getIdcp(): ?int
    {
        return $this->idcp;
    }

    public function getNomcp(): ?string
    {
        return $this->nomcp;
    }

    public function setNomcp(string $nomcp): static
    {
        $this->nomcp = $nomcp;

        return $this;
    }

    public function getDescriptioncp(): ?string
    {
        return $this->descriptioncp;
    }

    public function setDescriptioncp(string $descriptioncp): static
    {
        $this->descriptioncp = $descriptioncp;

        return $this;
    }

    public function getPersonnage(): ?string
    {
        return $this->personnage;
    }

    public function setPersonnage(string $personnage): static
    {
        $this->personnage = $personnage;

        return $this;
    }

    public function getImagecp(): ?string
    {
        return $this->imagecp;
    }

    public function setImagecp(string $imagecp): static
    {
        $this->imagecp = $imagecp;

        return $this;
    }

    public function getDatecreation(): ?\DateTimeInterface
    {
        return $this->datecreation;
    }

    public function setDatecreation(\DateTimeInterface $datecreation): static
    {
        $this->datecreation = $datecreation;

        return $this;
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

    public function getIdmateriaux(): ?Materiaux
    {
        return $this->idmateriaux;
    }

    public function setIdmateriaux(?Materiaux $idmateriaux): static
    {
        $this->idmateriaux = $idmateriaux;

        return $this;
    }


}
