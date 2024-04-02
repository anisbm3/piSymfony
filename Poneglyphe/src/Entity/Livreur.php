<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Livreur
 *
 * @ORM\Table(name="livreur")
 * @ORM\Entity
 */
class Livreur
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_Livreur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idLivreur;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom_Livreur", type="string", length=30, nullable=false)
     */
    private $nomLivreur;

    /**
     * @var string
     *
     * @ORM\Column(name="Prenom_Livreur", type="string", length=30, nullable=false)
     */
    private $prenomLivreur;

    /**
     * @var string
     *
     * @ORM\Column(name="Email", type="string", length=30, nullable=false)
     */
    private $email;

    /**
     * @var int
     *
     * @ORM\Column(name="CIN", type="integer", nullable=false)
     */
    private $cin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Naissance", type="date", nullable=false)
     */
    private $dateNaissance;

    public function getIdLivreur(): ?int
    {
        return $this->idLivreur;
    }

    public function getNomLivreur(): ?string
    {
        return $this->nomLivreur;
    }

    public function setNomLivreur(string $nomLivreur): static
    {
        $this->nomLivreur = $nomLivreur;

        return $this;
    }

    public function getPrenomLivreur(): ?string
    {
        return $this->prenomLivreur;
    }

    public function setPrenomLivreur(string $prenomLivreur): static
    {
        $this->prenomLivreur = $prenomLivreur;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getCin(): ?int
    {
        return $this->cin;
    }

    public function setCin(int $cin): static
    {
        $this->cin = $cin;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $dateNaissance): static
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }


}
