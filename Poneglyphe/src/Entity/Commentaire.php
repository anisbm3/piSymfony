<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaire
 *
 * @ORM\Table(name="commentaire")
 * @ORM\Entity
 */
class Commentaire
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_Commentaire", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCommentaire;

    /**
     * @var string
     *
     * @ORM\Column(name="Sujet_Debat", type="string", length=200, nullable=false)
     */
    private $sujetDebat;

    /**
     * @var string
     *
     * @ORM\Column(name="Message", type="string", length=100, nullable=false)
     */
    private $message;

    /**
     * @var string
     *
     * @ORM\Column(name="ID_User", type="string", length=11, nullable=false)
     */
    private $idUser;

    /**
     * @var int
     *
     * @ORM\Column(name="BLOCK", type="integer", nullable=false, options={"default"="1"})
     */
    private $block = 1;

    public function getIdCommentaire(): ?int
    {
        return $this->idCommentaire;
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

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

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

    public function getBlock(): ?int
    {
        return $this->block;
    }

    public function setBlock(int $block): static
    {
        $this->block = $block;

        return $this;
    }


}
