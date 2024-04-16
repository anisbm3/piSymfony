<?php

namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\MateriauxRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MateriauxRepository::class)]
class Materiaux
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: false)]
    #[Assert\NotBlank(message :"nom materiaux est obligatoire")]
    #[Assert\Length(min :1, max : 255)]
    #[Assert\Regex(
        pattern: '/\d/',
        match: false,
        message: 'Your name cannot contain a number',
    )]            
    private ?string $nomma ;

    #[ORM\Column(length: 255)]
    #[Assert\Length(min :1, max : 255)]
    #[Assert\NotBlank(message :"type materiaux est obligatoire")]
    #[Assert\Regex(
        pattern: '/\d/',
        match: false,
        message: 'Your type cannot contain a number',
    )]    
    private ?string $typema = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(min :1, max : 255)]
    #[Assert\NotBlank(message :"champs dispo est obligatoire")]
    #[Assert\Regex(
        pattern: '/\d/',
        match: false,
        message: 'Your disponibilite cannot contain a number',
    )]    
        private ?string $disponibilite = null;

    #[ORM\OneToMany(targetEntity: Cosplay::class, mappedBy: 'idmateriaux')]
    private Collection $cosplay;

    public function __construct()
    {
        $this->cosplay = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomma(): ?string
    {
        return $this->nomma;
    }

    public function setNomma(?string $nomma): static
    {
        $this->nomma = $nomma;

        return $this;
    }
    public function __toString(): string
    {
        return $this->nomma ?? ''; 
    }
    public function getTypema(): ?string
    {
        return $this->typema;
    }

    public function setTypema(string $typema): static
    {
        $this->typema = $typema;

        return $this;
    }

    public function getDisponibilite(): ?string
    {
        return $this->disponibilite;
    }

    public function setDisponibilite(string $disponibilite): static
    {
        $this->disponibilite = $disponibilite;

        return $this;
    }

    /**
     * @return Collection<int, Cosplay>
     */
    public function getCosplay(): Collection
    {
        return $this->cosplay;
    }

    public function addCosplay(Cosplay $cosplay): static
    {
        if (!$this->cosplay->contains($cosplay)) {
            $this->cosplay->add($cosplay);
            $cosplay->setIdmateriaux($this);
        }

        return $this;
    }

    public function removeCosplay(Cosplay $cosplay): static
    {
        if ($this->cosplay->removeElement($cosplay)) {
            // set the owning side to null (unless already changed)
            if ($cosplay->getIdmateriaux() === $this) {
                $cosplay->setIdmateriaux(null);
            }
        }

        return $this;
    }
}