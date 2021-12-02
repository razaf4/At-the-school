<?php

namespace App\Entity;

use App\Repository\MatiereRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MatiereRepository::class)
 */
class Matiere
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $libelleMatiere;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getLibelleMatiere(): ?string
    {
        return $this->libelleMatiere;
    }

    public function setLibelleMatiere(string $libelleMatiere): self
    {
        $this->libelleMatiere = $libelleMatiere;

        return $this;
    }
    /**
     * Generates the magic method
     * 
     */
    public function __toString(){
        
        return $this->libelleMatiere;
        //mis ilaivana az f ts tadidiko//return $this->categorie;
       
     }
}
