<?php

namespace App\Entity;

use App\Repository\ListeEtudiantRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ListeEtudiantRepository::class)
 */
class ListeEtudiant
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $idAuD;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $idAuF;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $matricule;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $date_naissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @ORM\ManyToOne(targetEntity=Groupe::class)
     */
    private $idGroupe;

    /**
     * @ORM\ManyToOne(targetEntity=Niveau::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $idNiveau;

    /**
     * @ORM\ManyToOne(targetEntity=Parcours::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $idParcours;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdAuD(): ?int
    {
        return $this->idAuD;
    }

    public function setIdAuD(?int $idAuD): self
    {
        $this->idAuD = $idAuD;

        return $this;
    }

    public function getIdAuF(): ?int
    {
        return $this->idAuF;
    }

    public function setIdAuF(?int $idAuF): self
    {
        $this->idAuF = $idAuF;

        return $this;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(string $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getDateNaissance(): ?string
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(?string $date_naissance): self
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getIdGroupe(): ?Groupe
    {
        return $this->idGroupe;
    }

    public function setIdGroupe(?Groupe $idGroupe): self
    {
        $this->idGroupe = $idGroupe;

        return $this;
    }

    public function getIdNiveau(): ?Niveau
    {
        return $this->idNiveau;
    }

    public function setIdNiveau(?Niveau $idNiveau): self
    {
        $this->idNiveau = $idNiveau;

        return $this;
    }

    public function getIdParcours(): ?Parcours
    {
        return $this->idParcours;
    }

    public function setIdParcours(?Parcours $idParcours): self
    {
        $this->idParcours = $idParcours;

        return $this;
    }
    
}
