<?php

namespace App\Entity;

use App\Repository\ReparationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Employe; // 
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: ReparationRepository::class)]
class Reparation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    private ?Vehicule $vehicule = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateReparation = null;

    #[ORM\Column(length: 50)]
    private ?string $status = null;

    #[ORM\Column(nullable: true)]
    private ?float $prix = null;

    #[ORM\ManyToMany(targetEntity: Employe::class, inversedBy: 'reparations')]
    #[ORM\JoinTable(name: 'reparation_has_employe')]
    private Collection $employes;
    /**
     * @var Collection<int, TacheReparation>
     */
    #[ORM\OneToMany(targetEntity: TacheReparation::class, mappedBy: 'reparation', orphanRemoval: true)]
    private Collection $tacheReparations;

    public function __construct()
    {
        $this->employes = new ArrayCollection();
        $this->tacheReparations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVehicule(): ?Vehicule
    {
        return $this->vehicule;
    }

    public function setVehicule(?Vehicule $vehicule): static
    {
        $this->vehicule = $vehicule;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDateReparation(): ?\DateTimeInterface
    {
        return $this->dateReparation;
    }

    public function setDateReparation(\DateTimeInterface $dateReparation): static
    {
        $this->dateReparation = $dateReparation;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(?float $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getEmployes(): Collection
    {
        return $this->employes;
    }

    public function addEmploye(Employe $employe): static
    {
        if (!$this->employes->contains($employe)) {
            $this->employes[] = $employe;
        }

        return $this;
    }

    public function removeEmploye(Employe $employe): static
    {
        $this->employes->removeElement($employe);

        return $this;
    }

    /**
     * @return Collection<int, TacheReparation>
     */
    public function getTacheReparations(): Collection
    {
        return $this->tacheReparations;
    }

    public function addTacheReparation(TacheReparation $tacheReparation): static
    {
        if (!$this->tacheReparations->contains($tacheReparation)) {
            $this->tacheReparations->add($tacheReparation);
            $tacheReparation->setReparation($this);
        }

        return $this;
    }

    public function removeTacheReparation(TacheReparation $tacheReparation): static
    {
        if ($this->tacheReparations->removeElement($tacheReparation)) {
            // set the owning side to null (unless already changed)
            if ($tacheReparation->getReparation() === $this) {
                $tacheReparation->setReparation(null);
            }
        }

        return $this;
    }
}
