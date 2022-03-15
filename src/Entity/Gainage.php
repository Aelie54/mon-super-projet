<?php

namespace App\Entity;

use App\Repository\GainageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GainageRepository::class)]
class Gainage extends Exercise
{
    #[ORM\Column(type: 'float', nullable: true)]
    private $poids;

    #[ORM\Column(type: 'integer')]
    private $nombre;

    #[ORM\Column(type: 'boolean')]
    private $actif;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPoids(): ?float
    {
        return $this->poids;
    }

    public function setPoids(?float $poids): self
    {
        $this->poids = $poids;

        return $this;
    }

    public function getNombre(): ?int
    {
        return $this->nombre;
    }

    public function setNombre(int $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getActif(): ?bool
    {
        return $this->actif;
    }

    public function setActif(bool $actif): self
    {
        $this->actif = $actif;

        return $this;
    }
}
