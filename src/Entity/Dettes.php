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

    #[ORM\ManyToOne(targetEntity: Gens::class, inversedBy: 'dettes')]
    #[ORM\JoinColumn(nullable: false)]
    private $gens;

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

    public function getGensId(): ?gens
    {
        return $this->gens;
    }

    public function setGensId(?gens $gens): self
    {
        $this->gens = $gens;

        return $this;
    }
}
