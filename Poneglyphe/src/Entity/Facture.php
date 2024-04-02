<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Facture
 *
 * @ORM\Table(name="facture")
 * @ORM\Entity
 */
class Facture
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdFacture", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idfacture;

    /**
     * @var int
     *
     * @ORM\Column(name="Remise", type="integer", nullable=false)
     */
    private $remise;

    /**
     * @var float
     *
     * @ORM\Column(name="MontantAvecRemise", type="float", precision=10, scale=0, nullable=false)
     */
    private $montantavecremise;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateFacture", type="date", nullable=true)
     */
    private $datefacture;

    /**
     * @var int
     *
     * @ORM\Column(name="ID_Livraison", type="integer", nullable=false)
     */
    private $idLivraison;

    public function getIdfacture(): ?int
    {
        return $this->idfacture;
    }

    public function getRemise(): ?int
    {
        return $this->remise;
    }

    public function setRemise(int $remise): static
    {
        $this->remise = $remise;

        return $this;
    }

    public function getMontantavecremise(): ?float
    {
        return $this->montantavecremise;
    }

    public function setMontantavecremise(float $montantavecremise): static
    {
        $this->montantavecremise = $montantavecremise;

        return $this;
    }

    public function getDatefacture(): ?\DateTimeInterface
    {
        return $this->datefacture;
    }

    public function setDatefacture(?\DateTimeInterface $datefacture): static
    {
        $this->datefacture = $datefacture;

        return $this;
    }

    public function getIdLivraison(): ?int
    {
        return $this->idLivraison;
    }

    public function setIdLivraison(int $idLivraison): static
    {
        $this->idLivraison = $idLivraison;

        return $this;
    }


}
