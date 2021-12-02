<?php

namespace App\Entity;

use App\Repository\EnseignantRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EnseignantRepository::class)
 */
class Enseignant
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", nullable=true)
     */
    private $idNiveau;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer", nullable=true)
     */
    private $idMatiere;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomEnseignant;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $emailEnseignant;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $telEnseignant;

    public function getIdNiveau(): ?int
    {
        return $this->idNiveau;
    }

    public function setIdNiveau(?int $idNiveau): self
    {
        $this->idNiveau = $idNiveau;

        return $this;
    }

    public function getIdMatiere(): ?int
    {
        return $this->idMatiere;
    }

    public function setIdMatiere(?int $idMatiere): self
    {
        $this->idMatiere = $idMatiere;

        return $this;
    }

    public function getNomEnseignant(): ?string
    {
        return $this->nomEnseignant;
    }

    public function setNomEnseignant(string $nomEnseignant): self
    {
        $this->nomEnseignant = $nomEnseignant;

        return $this;
    }

    public function getEmailEnseignant(): ?string
    {
        return $this->emailEnseignant;
    }

    public function setEmailEnseignant(?string $emailEnseignant): self
    {
        $this->emailEnseignant = $emailEnseignant;

        return $this;
    }

    public function getTelEnseignant(): ?string
    {
        return $this->telEnseignant;
    }

    public function setTelEnseignant(?string $telEnseignant): self
    {
        $this->telEnseignant = $telEnseignant;

        return $this;
    }
}
