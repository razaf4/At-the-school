<?php

namespace App\Entity;

use App\Repository\NiveauRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NiveauRepository::class)
 */
class Niveau
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $libelleNiveau;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getLibelleNiveau(): ?string
    {
        return $this->libelleNiveau;
    }

    public function setLibelleNiveau(string $libelleNiveau): self
    {
        $this->libelleNiveau = $libelleNiveau;

        return $this;
    }
    /**
     * Generates the magic method
     * 
     */
    public function __toString(){
        
        return $this->libelleNiveau;
        //mis ilaivana az f ts tadidiko//return $this->categorie;
       
     }
}
