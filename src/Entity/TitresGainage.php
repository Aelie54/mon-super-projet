<?php

namespace App\Entity;

use App\Repository\TitresGainageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TitresGainageRepository::class)]
class TitresGainage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    private $name;

    #[ORM\OneToMany(mappedBy: 'id_titre', targetEntity: Gainage::class)]
    private $gainages;

    public function __construct()
    {
        $this->gainages = new ArrayCollection();
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
     * @return Collection<int, Gainage>
     */
    public function getGainages(): Collection
    {
        return $this->gainages;
    }

    public function addGainage(Gainage $gainage): self
    {
        if (!$this->gainages->contains($gainage)) {
            $this->gainages[] = $gainage;
            $gainage->setIdTitre($this);
        }

        return $this;
    }

    public function removeGainage(Gainage $gainage): self
    {
        if ($this->gainages->removeElement($gainage)) {
            // set the owning side to null (unless already changed)
            if ($gainage->getIdTitre() === $this) {
                $gainage->setIdTitre(null);
            }
        }

        return $this;
    }

}
