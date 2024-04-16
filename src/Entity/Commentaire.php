<?php

namespace App\Entity;

use App\Repository\CommentaireRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentaireRepository::class)]
class Commentaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Message = null;

    #[ORM\Column(length: 255)]
    private ?string $BLOCK = null;

    #[ORM\ManyToOne(inversedBy: 'Commentaire')]
    private ?Debat $Debat = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMessage(): ?string
    {
        return $this->Message;
    }

    public function setMessage(string $Message): static
    {
        $this->Message = $Message;

        return $this;
    }

    public function getBLOCK(): ?string
    {
        return $this->BLOCK;
    }

    public function setBLOCK(string $BLOCK): static
    {
        $this->BLOCK = $BLOCK;

        return $this;
    }

    public function getDebat(): ?Debat
    {
        return $this->Debat;
    }

    public function setDebat(?Debat $Debat): static
    {
        $this->Debat = $Debat;

        return $this;
    }
}
