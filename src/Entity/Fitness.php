<?php

namespace App\Entity;

use App\Repository\FitnessRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FitnessRepository::class)]
class Fitness extends Exercise
{
    #[ORM\Column(type: 'float')]
    private $durée;

    #[ORM\Column(type: 'float')]
    private $vitesse;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $pente;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $nombre_pas;

    public function getDurée(): ?float
    {
        return $this->durée;
    }

    public function setDurée(float $durée): self
    {
        $this->durée = $durée;

        return $this;
    }

    public function getVitesse(): ?float
    {
        return $this->vitesse;
    }

    public function setVitesse(float $vitesse): self
    {
        $this->vitesse = $vitesse;

        return $this;
    }

    public function getPente(): ?string
    {
        return $this->pente;
    }

    public function setPente(?string $pente): self
    {
        $this->pente = $pente;

        return $this;
    }

    public function getNombrePas(): ?int
    {
        return $this->nombre_pas;
    }

    public function setNombrePas(?int $nombre_pas): self
    {
        $this->nombre_pas = $nombre_pas;

        return $this;
    }
}
