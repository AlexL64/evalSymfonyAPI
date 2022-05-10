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

    #[ORM\ManyToOne(targetEntity: club::class, inversedBy: 'id_club')]
    private $id_club;

    #[ORM\OneToMany(mappedBy: 'id_gens', targetEntity: Dettes::class)]
    private $id_gens;

    public function __construct()
    {
        $this->id_gens = new ArrayCollection();
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

    public function getIdClub(): ?club
    {
        return $this->id_club;
    }

    public function setIdClub(?club $id_club): self
    {
        $this->id_club = $id_club;

        return $this;
    }

    /**
     * @return Collection<int, Dettes>
     */
    public function getIdGens(): Collection
    {
        return $this->id_gens;
    }

    public function addIdGen(Dettes $idGen): self
    {
        if (!$this->id_gens->contains($idGen)) {
            $this->id_gens[] = $idGen;
            $idGen->setIdGens($this);
        }

        return $this;
    }

    public function removeIdGen(Dettes $idGen): self
    {
        if ($this->id_gens->removeElement($idGen)) {
            // set the owning side to null (unless already changed)
            if ($idGen->getIdGens() === $this) {
                $idGen->setIdGens(null);
            }
        }

        return $this;
    }
}
