<?php

namespace App\Entity;

use App\Repository\EmployeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmployeRepository::class)]
class Employe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $telephone = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresse = null;

    #[ORM\Column(length: 50)]
    private ?string $poste = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_embauche = null;

    #[ORM\Column(nullable: true)]
    private ?float $salaire = null;

    #[ORM\ManyToMany(targetEntity: Specialite::class)]
    private Collection $specialites;

    #[ORM\ManyToMany(mappedBy: 'employes', targetEntity: Reparation::class)]
    private Collection $reparations;

    /**
     * @var Collection<int, TacheReparation>
     */
    #[ORM\OneToMany(targetEntity: TacheReparation::class, mappedBy: 'employe', orphanRemoval: true)]
    private Collection $tacheReparations;

    public function __construct()
    {
        $this->specialites = new ArrayCollection();
        $this->reparations = new ArrayCollection();
        $this->tacheReparations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getPoste(): ?string
    {
        return $this->poste;
    }

    public function setPoste(string $poste): static
    {
        $this->poste = $poste;

        return $this;
    }

    public function getDateEmbauche(): ?\DateTimeInterface
    {
        return $this->date_embauche;
    }

    public function setDateEmbauche(?\DateTimeInterface $date_embauche): static
    {
        $this->date_embauche = $date_embauche;

        return $this;
    }

    public function getSalaire(): ?float
    {
        return $this->salaire;
    }

    public function setSalaire(?float $salaire): static
    {
        $this->salaire = $salaire;

        return $this;
    }

    public function getSpecialites(): Collection
    {
        return $this->specialites;
    }

    public function addSpecialite(Specialite $specialite): self
    {
        if (!$this->specialites->contains($specialite)) {
            $this->specialites->add($specialite);
        }
        return $this;
    }

    public function removeSpecialite(Specialite $specialite): self
    {
        $this->specialites->removeElement($specialite);
        return $this;
    }

    public function getReparations(): Collection
    {
        return $this->reparations;
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
            $tacheReparation->setEmploye($this);
        }

        return $this;
    }

    public function removeTacheReparation(TacheReparation $tacheReparation): static
    {
        if ($this->tacheReparations->removeElement($tacheReparation)) {
            // set the owning side to null (unless already changed)
            if ($tacheReparation->getEmploye() === $this) {
                $tacheReparation->setEmploye(null);
            }
        }

        return $this;
    }
}
