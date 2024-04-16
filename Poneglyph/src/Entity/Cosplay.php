<?php

namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;

use App\Repository\CosplayRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CosplayRepository::class)]
class Cosplay
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 300)]
    #[Assert\NotBlank(message :"nom de cosplay est obligatoire")]
    #[Assert\Regex(
        pattern: '/\d/',
        match: false,
        message: 'Your cosplay cannot contain a number',
    )]    
    private ?string $nomcp = null;

    #[ORM\Column(length: 300)]
    #[Assert\NotBlank(message :"description est obligatoire")]
    #[Assert\Regex(
        pattern: '/\d/',
        match: false,
        message: 'Your description cannot contain a number',
    )]    
    private ?string $descriptioncp = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message :"personnage est obligatoire")]
    #[Assert\Regex(
        pattern: '/\d/',
        match: false,
        message: 'Your personnage cannot contain a number',
    )]    
    private ?string $personnage = null;

    #[ORM\Column(length: 300)]
    private ?string $imagecp = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
   
    private ?\DateTimeInterface $datecreation = null;

    #[ORM\Column(length: 255,nullable: true)]
    private ?string $nomma = null;


    #[ORM\ManyToOne(inversedBy: 'cosplay')]
    private ?Materiaux $idmateriaux = null;

    #[ORM\ManyToOne(inversedBy: 'cosplay')]
    private ?User $userid = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function setNomma(string $nomma): static
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

    public function getUserid(): ?User
    {
        return $this->userid;
    }

    public function setUserid(?User $userid): static
    {
        $this->userid = $userid;

        return $this;
    }
}