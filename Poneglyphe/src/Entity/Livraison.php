<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Livraison
 *
 * @ORM\Table(name="livraison")
 * @ORM\Entity
 */
class Livraison
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_Livraison", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idLivraison;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NomPrenomClient", type="string", length=45, nullable=true)
     */
    private $nomprenomclient;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Adresse", type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @var int
     *
     * @ORM\Column(name="panier_id", type="integer", nullable=false)
     */
    private $panierId;

    /**
     * @var float|null
     *
     * @ORM\Column(name="montant", type="float", precision=10, scale=0, nullable=true)
     */
    private $montant;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;

    public function getIdLivraison(): ?int
    {
        return $this->idLivraison;
    }

    public function getNomprenomclient(): ?string
    {
        return $this->nomprenomclient;
    }

    public function setNomprenomclient(?string $nomprenomclient): static
    {
        $this->nomprenomclient = $nomprenomclient;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getPanierId(): ?int
    {
        return $this->panierId;
    }

    public function setPanierId(int $panierId): static
    {
        $this->panierId = $panierId;

        return $this;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(?float $montant): static
    {
        $this->montant = $montant;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }


}
