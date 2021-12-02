<?php

namespace App\Entity;

use App\Repository\SeanceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SeanceRepository::class)
 */
class Seance
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateSeance;

    /**
     * @ORM\Column(type="time")
     */
    private $heureDebut;

    /**
     * @ORM\Column(type="time")
     */
    private $heureFin;

    /**
     * @ORM\ManyToOne(targetEntity=Niveau::class)
     */
    private $idNiveau;

    /**
     * @ORM\ManyToOne(targetEntity=Matiere::class)
     */
    private $idMatiere;

    /**
     * @ORM\ManyToOne(targetEntity=Parcours::class)
     */
    private $idParcours;

    /**
     * @ORM\ManyToOne(targetEntity=AnneeCourante::class)
     */
    private $idAuCourant;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $colonneTeste;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateSeance(): ?\DateTimeInterface
    {
        return $this->dateSeance;
    }

    public function setDateSeance(\DateTimeInterface $dateSeance): self
    {
        $this->dateSeance = $dateSeance;

        return $this;
    }

    public function getHeureDebut(): ?\DateTimeInterface
    {
        return $this->heureDebut;
    }

    public function setHeureDebut(\DateTimeInterface $heureDebut): self
    {
        $this->heureDebut = $heureDebut;

        return $this;
    }

    public function getHeureFin(): ?\DateTimeInterface
    {
        return $this->heureFin;
    }

    public function setHeureFin(\DateTimeInterface $heureFin): self
    {
        $this->heureFin = $heureFin;

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

    public function getIdMatiere(): ?Matiere
    {
        return $this->idMatiere;
    }

    public function setIdMatiere(?Matiere $idMatiere): self
    {
        $this->idMatiere = $idMatiere;

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

    public function getIdAuCourant(): ?AnneeCourante
    {
        return $this->idAuCourant;
    }

    public function setIdAuCourant(?AnneeCourante $idAuCourant): self
    {
        $this->idAuCourant = $idAuCourant;

        return $this;
    }

    public function getColonneTeste(): ?string
    {
        return $this->colonneTeste;
    }

    public function setColonneTeste(string $colonneTeste): self
    {
        $this->colonneTeste = $colonneTeste;

        return $this;
    }
}
