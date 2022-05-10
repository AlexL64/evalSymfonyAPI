<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\GensRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GensRepository::class)]
#[ApiResource]
class Gens
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $nom;

    #[ORM\Column(type: 'string', length: 50)]
    private $prenom;

    #[ORM\ManyToOne(targetEntity: club::class, inversedBy: 'gens')]
    private $club;

    #[ORM\OneToMany(mappedBy: 'gens', targetEntity: Dettes::class)]
    private $dettes;

    public function __construct()
    {
        $this->dettes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getClubId(): ?club
    {
        return $this->club;
    }

    public function setClubId(?club $club): self
    {
        $this->club = $club;

        return $this;
    }

    /**
     * @return Collection<int, Dettes>
     */
    public function getDettes(): Collection
    {
        return $this->dettes;
    }

    public function addDette(Dettes $dette): self
    {
        if (!$this->dettes->contains($dette)) {
            $this->dettes[] = $dette;
            $dette->setGensId($this);
        }

        return $this;
    }

    public function removeDette(Dettes $dette): self
    {
        if ($this->dettes->removeElement($dette)) {
            // set the owning side to null (unless already changed)
            if ($dette->getGensId() === $this) {
                $dette->setGensId(null);
            }
        }

        return $this;
    }
}
