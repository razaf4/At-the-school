<?php

namespace App\Entity;

use App\Repository\ParcoursRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ParcoursRepository::class)
 */
class Parcours
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $libelleParcours;
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getLibelleParcours(): ?string
    {
        return $this->libelleParcours;
    }

    public function setLibelleParcours(?string $libelleParcours): self
    {
        $this->libelleParcours = $libelleParcours;

        return $this;
    }
    /**
     * Generates the magic method
     * 
     */
    public function __toString(){
        
        return $this->libelleParcours;
        //mis ilaivana az f ts tadidiko//return $this->categorie;
       
     }
}
