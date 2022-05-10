<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ClubRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClubRepository::class)]
#[ApiResource]
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

    #[ORM\OneToMany(mappedBy: 'id_club', targetEntity: Gens::class)]
    private $id_club;

    public function __construct()
    {
        $this->id_club = new ArrayCollection();
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
    public function getIdClub(): Collection
    {
        return $this->id_club;
    }

    public function addIdClub(Gens $idClub): self
    {
        if (!$this->id_club->contains($idClub)) {
            $this->id_club[] = $idClub;
            $idClub->setIdClub($this);
        }

        return $this;
    }

    public function removeIdClub(Gens $idClub): self
    {
        if ($this->id_club->removeElement($idClub)) {
            // set the owning side to null (unless already changed)
            if ($idClub->getIdClub() === $this) {
                $idClub->setIdClub(null);
            }
        }

        return $this;
    }
}
