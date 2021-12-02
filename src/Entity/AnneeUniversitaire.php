<?php

namespace App\Entity;

use App\Repository\AnneeUniversitaireRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnneeUniversitaireRepository::class)
 */
class AnneeUniversitaire
{
    /**
     * @ORM\Id
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateDebut;
    /**
     * @ORM\Id
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateFin;

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(?\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(?\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }
}
