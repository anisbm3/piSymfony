<?php

namespace App\Entity;

use App\Repository\DebatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DebatRepository::class)]
class Debat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(min:5)]
    #[Assert\Length(max:20)]
    #[Assert\NotBlank (message:"veuillez saisir le sujet debat de debat")]
    private ?string $sujet_debat = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(min:5)]
    #[Assert\Length(max:20)]
    #[Assert\NotBlank (message:"veuillez saisir le description de debat")]
    private ?string $description_debat = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(min:5)]
    #[Assert\Length(max:20)]
    #[Assert\NotBlank (message:"veuillez saisir le nom anime de debat")]
    private ?string $nom_anime = null;

    #[ORM\Column(nullable: true)]
    #[Assert\Length(min:1)]
    #[Assert\Length(max:5)]
    #[Assert\NotBlank (message:"veuillez saisir le description de debat")]
    private ?int $note_anime = null;

    #[ORM\ManyToOne(inversedBy: 'debats')]
    private ?Utilisateurs $User = null;

    #[ORM\OneToMany(targetEntity: Commentaire::class, mappedBy: 'Debat')]
    private Collection $commentaires;

    public function __construct()
    {
        $this->commentaires = new ArrayCollection();
    }

    #[ORM\Column(name: "noteanimes", nullable: true)]
    private ?int $noteanimes= null;
    
    public function getNoteanimes(): ?int
    {
        return $this->noteanimes;
    }
    
    public function setNoteanimes(?int $noteanimes): self
    {
        $this->noteanimes= $noteanimes;
        return $this;
    }
    public function __toString()
    {
        return $this->sujet_debat;
    }

   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSujetDebat(): ?string
    {
        return $this->sujet_debat;
    }

    public function setSujetDebat(string $sujet_debat): static
    {
        $this->sujet_debat = $sujet_debat;

        return $this;
    }

    public function getDescriptionDebat(): ?string
    {
        return $this->description_debat;
    }

    public function setDescriptionDebat(string $description_debat): static
    {
        $this->description_debat = $description_debat;

        return $this;
    }

    public function getNomAnime(): ?string
    {
        return $this->nom_anime;
    }

    public function setNomAnime(string $nom_anime): static
    {
        $this->nom_anime = $nom_anime;

        return $this;
    }

    public function getNoteAnime(): ?int
    {
        return $this->note_anime;
    }

    public function setNoteAnime(?int $note_anime): static
    {
        $this->note_anime = $note_anime;

        return $this;
    }

    public function getUser(): ?Utilisateurs
    {
        return $this->User;
    }

    public function setUser(?Utilisateurs $User): static
    {
        $this->User = $User;

        return $this;
    }

    /**
     * @return Collection<int, Commentaire>
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): static
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires->add($commentaire);
            $commentaire->setDebat($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): static
    {
        if ($this->commentaires->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getDebat() === $this) {
                $commentaire->setDebat(null);
            }
        }

        return $this;
    }

    
    
}
