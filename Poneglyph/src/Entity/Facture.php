<?php

namespace App\Entity;

use App\Repository\FactureRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FactureRepository::class)]
class Facture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $Remise = null;

    #[ORM\Column]
    private ?float $MontantAvecRemise = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateFacture = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Livraison $ID_Livraison = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Panier $panier_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRemise(): ?int
    {
        return $this->Remise;
    }

    public function setRemise(int $Remise): static
    {
        $this->Remise = $Remise;

        return $this;
    }

    public function getMontantAvecRemise(): ?float
    {
        return $this->MontantAvecRemise;
    }

    public function setMontantAvecRemise(float $MontantAvecRemise): static
    {
        $this->MontantAvecRemise = $MontantAvecRemise;

        return $this;
    }

    public function getDateFacture(): ?\DateTimeInterface
    {
        return $this->dateFacture;
    }

    public function setDateFacture(\DateTimeInterface $dateFacture): static
    {
        $this->dateFacture = $dateFacture;

        return $this;
    }

    public function getIDLivraison(): ?Livraison
    {
        return $this->ID_Livraison;
    }

    public function setIDLivraison(?Livraison $ID_Livraison): static
    {
        $this->ID_Livraison = $ID_Livraison;

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
}