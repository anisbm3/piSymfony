<?php

namespace App\Entity;

use App\Repository\FactureRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: FactureRepository::class)]
class Facture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: "La remise ne peut pas être vide.")]
    #[Assert\Range(
        min: 10,
        max: 100,
        notInRangeMessage: "La remise doit être entre {{ min }}% et {{ max }}%.",
    )]
    private ?int $Remise = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: "Le montant avec remise ne peut pas être vide.")]
    private ?float $MontantAvecRemise = null;

    #[ORM\Column(type: 'date')]
    #[Assert\NotBlank(message: "La date de facture ne peut pas être vide.")]
    #[Assert\Date(message: "La date de facture doit être une date valide.")]
    #[Assert\GreaterThan(
        'today',
        message: "La date de facture doit être ultérieure à aujourd'hui."
    )]
    private ?\DateTimeInterface $dateFacture = null;

    #[ORM\OneToOne(targetEntity: Livraison::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(name: 'id_livraison', referencedColumnName: 'id')]
    private ?Livraison $livraison = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRemise(): ?int
    {
        return $this->Remise;
    }

    public function setRemise(int $Remise): self
    {
        $this->Remise = $Remise;

        return $this;
    }

    public function getMontantAvecRemise(): ?float
    {
        return $this->MontantAvecRemise;
    }

    public function setMontantAvecRemise(float $MontantAvecRemise): self
    {
        $this->MontantAvecRemise = $MontantAvecRemise;

        return $this;
    }

    public function getDateFacture(): ?\DateTimeInterface
    {
        return $this->dateFacture;
    }

    public function setDateFacture(\DateTimeInterface $dateFacture): self
    {
        $this->dateFacture = $dateFacture;

        return $this;
    }

    public function getLivraison(): ?Livraison
    {
        return $this->livraison;
    }

    public function setLivraison(?Livraison $livraison): self
    {
        $this->livraison = $livraison;

        return $this;
    }

    public function getIdLivraison(): ?int
    {
        if ($this->livraison !== null) {
            return $this->livraison->getId();
        }

        return null;
    }
}
