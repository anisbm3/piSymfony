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
    #[Assert\Length(min:5)]
    #[Assert\Length(max:20)]
    #[Assert\NotBlank (message:"veuillez saisir le nom de l'evenement")]
    private ?string $NomEvent = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(min:5)]
    #[Assert\Length(max:20)]
    #[Assert\NotBlank (message:"veuillez saisir la description de l'evenement ")]
    private ?string $DescriptionEvent = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(min:5)]
    #[Assert\Length(max:20)]
    #[Assert\NotBlank (message:"veuillez saisir le lieu de l'evenement ")]
    private ?string $LieuEvent = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank (message:"veuillez saisir l'image de l'evenement ")]
    private $Image = null;

    #[ORM\Column]
    #[Assert\NotBlank (message:"veuillez saisir le nombre de place de l'evenement ")]

    private ?int $NbPlace = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Assert\NotBlank(message: "Veuillez saisir la date de l'événement.")]
    #[Assert\GreaterThanOrEqual("now", message: "La date de l'événement doit être après la date actuelle.")]
    private ?\DateTimeInterface $DateEvent = null;

    #[ORM\OneToMany(targetEntity: Reservation::class, mappedBy: 'evenement')]
    private Collection $Reservation;

    #[ORM\OneToMany(targetEntity: Reservation::class, mappedBy: 'Evenement')]
    private Collection $reservation;

    public function __construct()
    {
        $this->Reservation = new ArrayCollection();
        $this->reservation = new ArrayCollection();
        $this->DateEvent = new \DateTime('now');

    }

    public function __toString()
    {
        return $this->NomEvent;
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
    public function getImage()
    {
        return $this->Image;
    }

    public function setImage( $Image)
    {
        $this->Image = $Image;

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

    public function getDateEvent(): ?\DateTimeInterface
    {
        return $this->DateEvent;
    }

    public function setDateEvent(\DateTimeInterface $DateEvent): static
    {
        $this->DateEvent = $DateEvent;

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
