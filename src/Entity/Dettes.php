<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\DettesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DettesRepository::class)]
#[ApiResource]
class Dettes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'float')]
    private $montant;

    #[ORM\ManyToOne(targetEntity: gens::class, inversedBy: 'id_gens')]
    private $id_gens;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getIdGens(): ?gens
    {
        return $this->id_gens;
    }

    public function setIdGens(?gens $id_gens): self
    {
        $this->id_gens = $id_gens;

        return $this;
    }
}
