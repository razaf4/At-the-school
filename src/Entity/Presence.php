<?php

namespace App\Entity;

use App\Repository\PresenceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PresenceRepository::class)
 */
class Presence
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isAbsent;

    /**
     * @ORM\OneToOne(targetEntity=Seance::class, cascade={"persist", "remove"})
     */
    private $idSeance;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIsAbsent(): ?bool
    {
        return $this->isAbsent;
    }

    public function setIsAbsent(?bool $isAbsent): self
    {
        $this->isAbsent = $isAbsent;

        return $this;
    }

    public function getIdSeance(): ?Seance
    {
        return $this->idSeance;
    }

    public function setIdSeance(?Seance $idSeance): self
    {
        $this->idSeance = $idSeance;

        return $this;
    }
}
