<?php

namespace App\Entity;

use App\Repository\AnneeCouranteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnneeCouranteRepository::class)
 */
class AnneeCourante
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
    private $anneeDebut;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $anneeFin;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnneeDebut(): ?string
    {
        return $this->anneeDebut;
    }

    public function setAnneeDebut(?string $anneeDebut): self
    {
        $this->anneeDebut = $anneeDebut;

        return $this;
    }

    public function getAnneeFin(): ?string
    {
        return $this->anneeFin;
    }

    public function setAnneeFin(?string $anneeFin): self
    {
        $this->anneeFin = $anneeFin;

        return $this;
    }
}
