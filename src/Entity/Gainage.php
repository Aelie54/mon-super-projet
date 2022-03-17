<?php

namespace App\Entity;

use App\Repository\GainageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GainageRepository::class)]
class Gainage extends Exercise
{
    #[ORM\Column(type: 'float', nullable: true)]
    private $poids; //kg

    #[ORM\Column(type: 'integer')]
    private $nombre; //nombre d elevées

    #[ORM\Column(type: 'boolean')]
    private $actif;

    #[ORM\ManyToOne(targetEntity: TitresGainage::class, inversedBy: 'gainages')]
    #[ORM\JoinColumn(nullable: false)]
    private $name;

    #[ORM\ManyToOne(targetEntity: Exercise::class, inversedBy: 'gainages')]
    private $exercise; //si mouvement pendant gainage


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

    public function getName(): ?TitresGainage
    {
        return $this->name;
    }

    public function setName(?TitresGainage $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getExercise(): ?Exercise
    {
        return $this->exercise;
    }

    public function setExercise(?Exercise $exercise): self
    {
        $this->exercise = $exercise;

        return $this;
    }
}
