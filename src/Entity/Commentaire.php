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
    
    #[Assert\Length(min:5)]
    #[Assert\Length(max:20)]
    #[Assert\NotBlank (message:"veuillez saisir le Message de commentaire")]
    private ?string $message = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(min:5)]
    #[Assert\Length(max:20)]
    #[Assert\NotBlank (message:"veuillez saisir le block du commentaire")]
    private ?string $block = null;

    #[ORM\ManyToOne(inversedBy: 'commentaires')]
    private ?Debat $Debat = null;



    public function getId(): ?int
    {
        return $this->id;
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

    public function getBlock(): ?string
    {
        return $this->block;
    }

    public function setBlock(string $block): static
    {
        $this->block = $block;

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
