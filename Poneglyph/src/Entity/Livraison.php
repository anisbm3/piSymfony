<?php

namespace App\Entity;

use App\Repository\LivraisonRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivraisonRepository::class)]
class Livraison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $NomPrenomClient = null;

    #[ORM\Column(length: 255)]
    private ?string $Adresse = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Panier $panier_id = null;

    #[ORM\Column]
    private ?int $quantity = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\ManyToOne(inversedBy: 'livraison')]
    private ?user $id_user = null;

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

    public function getPanierId(): ?Panier
    {
        return $this->panier_id;
    }

    public function setPanierId(?Panier $panier_id): static
    {
        $this->panier_id = $panier_id;

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