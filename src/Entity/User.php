<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(targetEntity: Panier::class, mappedBy: 'user_id')]
    private Collection $prod_name;

    #[ORM\OneToMany(targetEntity: Panier::class, mappedBy: 'user_id')]
    private Collection $panier;

    #[ORM\OneToMany(targetEntity: Livraison::class, mappedBy: 'id_user')]
    private Collection $livraison;

    #[ORM\OneToMany(targetEntity: Cosplay::class, mappedBy: 'userid')]
    private Collection $cosplay;

    #[ORM\Column(length: 255)]
    private ?string $pseudo = null;

    #[ORM\Column(length: 255)]
    private ?string $roles = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column]
    private ?int $cin = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column]
    private ?int $age = null;

    #[ORM\Column]
    private ?int $num_tel = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $is_verified = null;

    #[ORM\OneToMany(targetEntity: Debat::class, mappedBy: 'user_id')]
    private Collection $debat;

    #[ORM\OneToMany(targetEntity: Reservation::class, mappedBy: 'User')]
    private Collection $Reservation;

    public function __construct()
    {
        $this->prod_name = new ArrayCollection();
        $this->panier = new ArrayCollection();
        $this->livraison = new ArrayCollection();
        $this->cosplay = new ArrayCollection();
        $this->debat = new ArrayCollection();
        $this->Reservation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Panier>
     */
    public function getProdName(): Collection
    {
        return $this->prod_name;
    }

    public function addProdName(Panier $prodName): static
    {
        if (!$this->prod_name->contains($prodName)) {
            $this->prod_name->add($prodName);
            $prodName->setUserId($this);
        }

        return $this;
    }

    public function removeProdName(Panier $prodName): static
    {
        if ($this->prod_name->removeElement($prodName)) {
            // set the owning side to null (unless already changed)
            if ($prodName->getUserId() === $this) {
                $prodName->setUserId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Panier>
     */
    public function getPanier(): Collection
    {
        return $this->panier;
    }

    public function addPanier(Panier $panier): static
    {
        if (!$this->panier->contains($panier)) {
            $this->panier->add($panier);
            $panier->setUserId($this);
        }

        return $this;
    }

    public function removePanier(Panier $panier): static
    {
        if ($this->panier->removeElement($panier)) {
            // set the owning side to null (unless already changed)
            if ($panier->getUserId() === $this) {
                $panier->setUserId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Livraison>
     */
    public function getLivraison(): Collection
    {
        return $this->livraison;
    }

    public function addLivraison(Livraison $livraison): static
    {
        if (!$this->livraison->contains($livraison)) {
            $this->livraison->add($livraison);
            $livraison->setIdUser($this);
        }

        return $this;
    }

    public function removeLivraison(Livraison $livraison): static
    {
        if ($this->livraison->removeElement($livraison)) {
            // set the owning side to null (unless already changed)
            if ($livraison->getIdUser() === $this) {
                $livraison->setIdUser(null);
            }
        }

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
            $cosplay->setUserid($this);
        }

        return $this;
    }

    public function removeCosplay(Cosplay $cosplay): static
    {
        if ($this->cosplay->removeElement($cosplay)) {
            // set the owning side to null (unless already changed)
            if ($cosplay->getUserid() === $this) {
                $cosplay->setUserid(null);
            }
        }

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): static
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getRoles(): ?string
    {
        return $this->roles;
    }

    public function setRoles(string $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

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

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): static
    {
        $this->age = $age;

        return $this;
    }

    public function getNumTel(): ?int
    {
        return $this->num_tel;
    }

    public function setNumTel(int $num_tel): static
    {
        $this->num_tel = $num_tel;

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

    public function getIsVerified(): ?int
    {
        return $this->is_verified;
    }

    public function setIsVerified(int $is_verified): static
    {
        $this->is_verified = $is_verified;

        return $this;
    }

    /**
     * @return Collection<int, Debat>
     */
    public function getDebat(): Collection
    {
        return $this->debat;
    }

    public function addDebat(Debat $debat): static
    {
        if (!$this->debat->contains($debat)) {
            $this->debat->add($debat);
            $debat->setUserId($this);
        }

        return $this;
    }

    public function removeDebat(Debat $debat): static
    {
        if ($this->debat->removeElement($debat)) {
            // set the owning side to null (unless already changed)
            if ($debat->getUserId() === $this) {
                $debat->setUserId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Reservation>
     */
    public function getReservation(): Collection
    {
        return $this->Reservation;
    }

    public function addReservation(Reservation $reservation): static
    {
        if (!$this->Reservation->contains($reservation)) {
            $this->Reservation->add($reservation);
            $reservation->setUser($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): static
    {
        if ($this->Reservation->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getUser() === $this) {
                $reservation->setUser(null);
            }
        }

        return $this;
    }
}
