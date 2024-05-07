<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\Column(length: 255)]
    #[Assert\Length(min:5)]
    #[Assert\Length(max:20)]
    #[Assert\NotBlank (message:"veuillez saisir le nom du reservation ")]
    private ?string $NomReservation = null;

    #[ORM\Column]
    #[Assert\NotBlank (message:"veuillez saisir le nombre de place de l'evenement ")]
    private ?int $NbPlace = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(min:5)]
    #[Assert\Length(max:20)]
    #[Assert\NotBlank (message:"veuillez saisir l' Etat du reservation ")]
    private ?string $Etat = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Assert\NotBlank(message: "Veuillez saisir la date de l'événement.")]
    #[Assert\GreaterThanOrEqual("now", message: "La date de l'événement doit être après la date actuelle.")]
    private ?\DateTimeInterface $resdate = null;

    #[ORM\ManyToOne(inversedBy: 'reservation')]
    private ?Evenement $Evenement = null;


    #[ORM\ManyToOne(inversedBy: 'Reservation')]
    private ?Utilisateurs $user = null;

    
    public function __construct()
    {
       
        $this->resdate = new \DateTime('now');

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEvenement(): ?Evenement
    {
        return $this->Evenement;
    }

    public function setEvenement(?Evenement $Evenement): static
    {
        $this->Evenement = $Evenement;

        return $this;
    }

    public function getNomReservation(): ?string
    {
        return $this->NomReservation;
    }

    public function setNomReservation(string $NomReservation): static
    {
        $this->NomReservation = $NomReservation;

        return $this;
    }

    public function getNbPlace(): ?int
    {
        return $this->NbPlace;
    }

    public function setNbPlace(int $NbPlace): static
    {
        $this->NbPlace = $NbPlace;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->Etat;
    }

    public function setEtat(string $Etat): static
    {
        $this->Etat = $Etat;

        return $this;
    }

    public function getResdate(): ?\DateTimeInterface
    {
        return $this->resdate;
    }

    public function setResdate(\DateTimeInterface $resdate): static
    {
        $this->resdate = $resdate;

        return $this;
    }

    public function getUser(): ?Utilisateurs
    {
        return $this->user;
    }

    public function setUser(?Utilisateurs $user): static
    {
        $this->user = $user;

        return $this;
    }
}
