<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(targetEntity: Debat::class, mappedBy: 'User')]
    private Collection $Debat;

    public function __construct()
    {
        $this->Debat = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Debat>
     */
    public function getDebat(): Collection
    {
        return $this->Debat;
    }

    public function addDebat(Debat $debat): static
    {
        if (!$this->Debat->contains($debat)) {
            $this->Debat->add($debat);
            $debat->setUser($this);
        }

        return $this;
    }

    public function removeDebat(Debat $debat): static
    {
        if ($this->Debat->removeElement($debat)) {
            // set the owning side to null (unless already changed)
            if ($debat->getUser() === $this) {
                $debat->setUser(null);
            }
        }

        return $this;
    }
}
