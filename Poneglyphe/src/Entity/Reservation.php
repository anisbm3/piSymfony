<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation")
 * @ORM\Entity
 */
class Reservation
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_Reservation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idReservation;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom_Reseervation", type="string", length=20, nullable=false)
     */
    private $nomReseervation;

    /**
     * @var int
     *
     * @ORM\Column(name="NB_Places", type="integer", nullable=false)
     */
    private $nbPlaces;

    /**
     * @var string
     *
     * @ORM\Column(name="Etat", type="string", length=30, nullable=false)
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="NOM_Event", type="string", length=255, nullable=false)
     */
    private $nomEvent;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="resDate", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $resdate = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @ORM\Column(name="iduser", type="string", length=11, nullable=false)
     */
    private $iduser;

    public function getIdReservation(): ?int
    {
        return $this->idReservation;
    }

    public function getNomReseervation(): ?string
    {
        return $this->nomReseervation;
    }

    public function setNomReseervation(string $nomReseervation): static
    {
        $this->nomReseervation = $nomReseervation;

        return $this;
    }

    public function getNbPlaces(): ?int
    {
        return $this->nbPlaces;
    }

    public function setNbPlaces(int $nbPlaces): static
    {
        $this->nbPlaces = $nbPlaces;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): static
    {
        $this->etat = $etat;

        return $this;
    }

    public function getNomEvent(): ?string
    {
        return $this->nomEvent;
    }

    public function setNomEvent(string $nomEvent): static
    {
        $this->nomEvent = $nomEvent;

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

    public function getIduser(): ?string
    {
        return $this->iduser;
    }

    public function setIduser(string $iduser): static
    {
        $this->iduser = $iduser;

        return $this;
    }


}
