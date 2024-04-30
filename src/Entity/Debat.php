<?php

namespace App\Entity;

use App\Repository\DebatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
    private ?string $SujetDebat = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(min:5)]
    #[Assert\Length(max:20)]
    #[Assert\NotBlank (message:"veuillez saisir le description de debat")]
    private ?string $DescriptionDebat = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(min:5)]
    #[Assert\Length(max:20)]
    #[Assert\NotBlank (message:"veuillez saisir le nom anime de debat")]
    private ?string $NomAnime = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(min:1)]
    #[Assert\Length(max:5)]
    #[Assert\NotBlank (message:"veuillez saisir le description de debat")]
    private ?string $NoteAnime = null;


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
   
    #[ORM\ManyToOne(inversedBy: 'Debat')]
    private ?User $User = null;

    

    #[ORM\OneToMany(targetEntity: Commentaire::class, mappedBy: 'Debat')]
    private Collection $Commentaire;

    public function __construct()
    {
        $this->Commentaire = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSujetDebat(): ?string
    {
        return $this->SujetDebat;
    }

    public function setSujetDebat(string $SujetDebat): static
    {
        $this->SujetDebat = $SujetDebat;

        return $this;
    }

    public function getDescriptionDebat(): ?string
    {
        return $this->DescriptionDebat;
    }

    public function setDescriptionDebat(string $DescriptionDebat): static
    {
        $this->DescriptionDebat = $DescriptionDebat;

        return $this;
    }

    public function getNomAnime(): ?string
    {
        return $this->NomAnime;
    }

    public function setNomAnime(string $NomAnime): static
    {
        $this->NomAnime = $NomAnime;

        return $this;
    }

    public function getNoteAnime(): ?string
    {
        return $this->NoteAnime;
    }

    public function setNoteAnime(string $NoteAnime): static
    {
        $this->NoteAnime = $NoteAnime;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): static
    {
        $this->User = $User;

        return $this;
    }

    /**
     * @return Collection<int, Commentaire>
     */
    public function getCommentaire(): Collection
    {
        return $this->Commentaire;
    }

    public function addCommentaire(Commentaire $commentaire): static
    {
        if (!$this->Commentaire->contains($commentaire)) {
            $this->Commentaire->add($commentaire);
            $commentaire->setDebat($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): static
    {
        if ($this->Commentaire->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getDebat() === $this) {
                $commentaire->setDebat(null);
            }
        }

        return $this;
    }
}
