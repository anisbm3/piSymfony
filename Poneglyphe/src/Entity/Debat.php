<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Debat
 *
 * @ORM\Table(name="debat")
 * @ORM\Entity
 */
class Debat
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_Debat", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDebat;

    /**
     * @var string
     *
     * @ORM\Column(name="Sujet_Debat", type="string", length=30, nullable=false)
     */
    private $sujetDebat;

    /**
     * @var string
     *
     * @ORM\Column(name="Description_Debat", type="string", length=70, nullable=false)
     */
    private $descriptionDebat;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom_Anime", type="string", length=20, nullable=false)
     */
    private $nomAnime;

    /**
     * @var int|null
     *
     * @ORM\Column(name="Note_Anime", type="integer", nullable=true)
     */
    private $noteAnime;

    /**
     * @var string
     *
     * @ORM\Column(name="ID_User", type="string", length=200, nullable=false)
     */
    private $idUser;

    public function getIdDebat(): ?int
    {
        return $this->idDebat;
    }

    public function getSujetDebat(): ?string
    {
        return $this->sujetDebat;
    }

    public function setSujetDebat(string $sujetDebat): static
    {
        $this->sujetDebat = $sujetDebat;

        return $this;
    }

    public function getDescriptionDebat(): ?string
    {
        return $this->descriptionDebat;
    }

    public function setDescriptionDebat(string $descriptionDebat): static
    {
        $this->descriptionDebat = $descriptionDebat;

        return $this;
    }

    public function getNomAnime(): ?string
    {
        return $this->nomAnime;
    }

    public function setNomAnime(string $nomAnime): static
    {
        $this->nomAnime = $nomAnime;

        return $this;
    }

    public function getNoteAnime(): ?int
    {
        return $this->noteAnime;
    }

    public function setNoteAnime(?int $noteAnime): static
    {
        $this->noteAnime = $noteAnime;

        return $this;
    }

    public function getIdUser(): ?string
    {
        return $this->idUser;
    }

    public function setIdUser(string $idUser): static
    {
        $this->idUser = $idUser;

        return $this;
    }


}
