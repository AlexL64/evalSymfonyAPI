<?php

namespace App\Entity;

//use App\Controller\ClubBySlug;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ClubRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClubRepository::class)]
#[ApiResource(
    itemOperations: array(
        "get",
        "delete",
        "patch"
    )
)]


class Club
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $nom;

    #[ORM\Column(type: 'string', length: 320)]
    private $email;

    #[ORM\OneToMany(mappedBy: 'club', targetEntity: Gens::class)]
    private $gens;

    public function __construct()
    {
        $this->gens = new ArrayCollection();
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection<int, Gens>
     */
    public function getGens(): Collection
    {
        return $this->gens;
    }

    public function addGen(Gens $gen): self
    {
        if (!$this->gens->contains($gen)) {
            $this->gens[] = $gen;
            $gen->setClubId($this);
        }

        return $this;
    }

    public function removeGen(Gens $gen): self
    {
        if ($this->gens->removeElement($gen)) {
            // set the owning side to null (unless already changed)
            if ($gen->getClubId() === $this) {
                $gen->setClubId(null);
            }
        }

        return $this;
    }
}
