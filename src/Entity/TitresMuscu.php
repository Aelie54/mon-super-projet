<?php

namespace App\Entity;

use App\Repository\TitresMuscuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TitresMuscuRepository::class)]
class TitresMuscu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    private $name;

    #[ORM\OneToMany(mappedBy: 'name', targetEntity: Musculation::class, orphanRemoval: true)]
    private $musculations;

    public function __construct()
    {
        $this->musculations = new ArrayCollection();
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
     * @return Collection<int, Musculation>
     */
    public function getMusculations(): Collection
    {
        return $this->musculations;
    }

    public function addMusculation(Musculation $musculation): self
    {
        if (!$this->musculations->contains($musculation)) {
            $this->musculations[] = $musculation;
            $musculation->setName($this);
        }

        return $this;
    }

    public function removeMusculation(Musculation $musculation): self
    {
        if ($this->musculations->removeElement($musculation)) {
            // set the owning side to null (unless already changed)
            if ($musculation->getName() === $this) {
                $musculation->setName(null);
            }
        }

        return $this;
    }
}
