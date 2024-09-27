<?php

namespace App\Entity;

use App\Repository\EvenementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EvenementRepository::class)]
class Evenement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $NomEvent = null;

    #[ORM\Column(length: 255)]
    private ?string $DescriptionEvent = null;

    #[ORM\Column(length: 255)]
    private ?string $LieuEvent = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DateEvent = null;

    #[ORM\Column(length: 255)]
    private ?string $Image = null;

    #[ORM\OneToMany(targetEntity: Reservation::class, mappedBy: 'Evenement')]
    private Collection $Reservation;

    public function __construct()
    {
        $this->Reservation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEvent(): ?string
    {
        return $this->NomEvent;
    }

    public function setNomEvent(string $NomEvent): static
    {
        $this->NomEvent = $NomEvent;

        return $this;
    }

    public function getDescriptionEvent(): ?string
    {
        return $this->DescriptionEvent;
    }

    public function setDescriptionEvent(string $DescriptionEvent): static
    {
        $this->DescriptionEvent = $DescriptionEvent;

        return $this;
    }

    public function getLieuEvent(): ?string
    {
        return $this->LieuEvent;
    }

    public function setLieuEvent(string $LieuEvent): static
    {
        $this->LieuEvent = $LieuEvent;

        return $this;
    }

    public function getDateEvent(): ?\DateTimeInterface
    {
        return $this->DateEvent;
    }

    public function setDateEvent(\DateTimeInterface $DateEvent): static
    {
        $this->DateEvent = $DateEvent;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->Image;
    }

    public function setImage(string $Image): static
    {
        $this->Image = $Image;

        return $this;
    }

    /**
     * @return Collection<int, Reservation>
     */
    public function getReservation(): Collection
    {
        return $this->Reservation;
    }

    public function addReservation(Reservation $reservation): static
    {
        if (!$this->Reservation->contains($reservation)) {
            $this->Reservation->add($reservation);
            $reservation->setEvenement($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): static
    {
        if ($this->Reservation->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getEvenement() === $this) {
                $reservation->setEvenement(null);
            }
        }

        return $this;
    }
}