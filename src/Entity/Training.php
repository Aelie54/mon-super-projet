<?php

namespace App\Entity;

use App\Repository\TrainingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TrainingRepository::class)]
class Training
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date')]
    private $date;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'trainings')]
    #[ORM\JoinColumn(nullable: false)]
    private $person;

    // #[ORM\ManyToMany(targetEntity: Exercise::class, inversedBy: 'trainings')]
    // private $exercises;

    #[ORM\OneToMany(mappedBy: 'relation', targetEntity: Exercise::class)]
    private $exercises;

    public function __construct()
    {
        $this->exercises = new ArrayCollection();
        $this->exercises2 = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getPerson(): ?User
    {
        return $this->person;
    }

    public function setPerson(?User $person): self
    {
        $this->person = $person;

        return $this;
    }

    // /**
    //  * @return Collection<int, Exercise>
    //  */
    // public function getExercises(): Collection
    // {
    //     return $this->exercises;
    // }

    // public function addExercise(Exercise $exercise): self
    // {
    //     if (!$this->exercises->contains($exercise)) {
    //         $this->exercises[] = $exercise;
    //     }

    //     return $this;
    // }

    // public function removeExercise(Exercise $exercise): self
    // {
    //     $this->exercises->removeElement($exercise);

    //     return $this;
    // }

    /**
     * @return Collection<int, Exercise>
     */
    public function getExercises(): Collection
    {
        return $this->exercises2;
    }

    public function addExercises(Exercise $exercises2): self
    {
        if (!$this->exercises2->contains($exercises2)) {
            $this->exercises2[] = $exercises2;
            $exercises2->setRelation($this);
        }

        return $this;
    }

    public function removeExercises(Exercise $exercises2): self
    {
        if ($this->exercises2->removeElement($exercises2)) {
            // set the owning side to null (unless already changed)
            if ($exercises2->getRelation() === $this) {
                $exercises2->setRelation(null);
            }
        }

        return $this;
    }
}
