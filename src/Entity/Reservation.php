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
    private ?string $NomReservation = null;

    #[ORM\Column]
    private ?int $NbPlace = null;

    #[ORM\Column(length: 255)]
    private ?string $Etat = null;

    #[ORM\ManyToOne(inversedBy: 'Reservation')]
    private ?Evenement $Evenement = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $resdate = null;

    #[ORM\ManyToOne(inversedBy: 'Reservation')]
    private ?User $User = null;

    public function __construct()
    {
        $this->resdate = new \DateTime('now');
    }
    public function getId(): ?int
    {
        return $this->id;
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

    public function getEvenement(): ?Evenement
    {
        return $this->Evenement;
    }

    public function setEvenement(?Evenement $Evenement): static
    {
        $this->Evenement = $Evenement;

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

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): static
    {
        $this->User = $User;

        return $this;
    }
}
