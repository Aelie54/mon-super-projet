<?php

namespace App\Entity;

use App\Repository\MusculationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MusculationRepository::class)]
class Musculation extends Exercise
{

    #[ORM\Column(type: 'float', nullable: true)]
    private $poids; //kg

    #[ORM\Column(type: 'integer')]
    private $nombre;

    #[ORM\ManyToOne(targetEntity: TitresMuscu::class, inversedBy: 'musculations')]
    #[ORM\JoinColumn(nullable: false)]
    private $name; //nombre de levées

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

    public function getName(): ?TitresMuscu
    {
        return $this->name;
    }

    public function setName(?TitresMuscu $name): self
    {
        $this->name = $name;

        return $this;
    }
}
