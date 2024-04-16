<?php

namespace App\Entity;

use App\Repository\LivraisonRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: LivraisonRepository::class)]
class Livraison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Le nom et prénom du client ne peut pas être vide.")]
    #[Assert\Length(
        min: 9,
        max: 25,
        minMessage: "Le nom et prénom du client doit contenir au moins {{ limit }} caractères.",
        maxMessage: "Le nom et prénom du client ne peut pas dépasser {{ limit }} caractères."
    )]
    private ?string $NomPrenomClient = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "L'adresse ne peut pas être vide.")]
    #[Assert\Length(
        min: 5,
        max: 255,
        minMessage: "L'adresse doit contenir au moins {{ limit }} caractères.",
        maxMessage: "L'adresse ne peut pas dépasser {{ limit }} caractères."
    )]
    private ?string $Adresse = null;

    #[ORM\ManyToOne(targetEntity: Panier::class)]
    private ?Panier $panier;

    #[ORM\Column]
    #[Assert\NotNull(message: "La quantité ne peut pas être vide.")]
    #[Assert\Range(
        min: 4,
        max: 10,
        notInRangeMessage: "La quantité doit être entre {{ min }} et {{ max }} pièces."
    )]
    private ?int $quantity = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\NotBlank(message: "La date ne peut pas être vide.")]
    #[Assert\GreaterThan(
        'today',
        message: "La date de livraison doit être ultérieure à aujourd'hui."
    )]
    private ?\DateTimeInterface $date = null;

    #[ORM\ManyToOne(inversedBy: 'livraison')]
    private ?User $id_user = null;

    // Getters and setters...

    public function getID(): ?int
    {
        return $this->id;
    }

    public function getNomPrenomClient(): ?string
    {
        return $this->NomPrenomClient;
    }

    public function setNomPrenomClient(string $NomPrenomClient): static
    {
        $this->NomPrenomClient = $NomPrenomClient;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): static
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getPanier(): ?Panier
    {
        return $this->panier;
    }

    public function setPanier(?Panier $panier): static
    {
        $this->panier = $panier;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->panier->getPrice();
    }

    public function getIdUser(): ?user
    {
        return $this->id_user;
    }

    public function setIdUser(?user $id_user): static
    {
        $this->id_user = $id_user;

        return $this;
    }
}
