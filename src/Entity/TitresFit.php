<?php

namespace App\Entity;

use App\Repository\TitresFitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TitresFitRepository::class)]
class TitresFit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    private $name;

    #[ORM\OneToMany(mappedBy: 'name', targetEntity: Fitness::class, orphanRemoval: true)]
    private $fitnesses;

    public function __construct()
    {
        $this->fitnesses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Fitness>
     */
    public function getFitnesses(): Collection
    {
        return $this->fitnesses;
    }

    public function addFitness(Fitness $fitness): self
    {
        if (!$this->fitnesses->contains($fitness)) {
            $this->fitnesses[] = $fitness;
            $fitness->setName($this);
        }

        return $this;
    }

    public function removeFitness(Fitness $fitness): self
    {
        if ($this->fitnesses->removeElement($fitness)) {
            // set the owning side to null (unless already changed)
            if ($fitness->getName() === $this) {
                $fitness->setName(null);
            }
        }

        return $this;
    }
}
