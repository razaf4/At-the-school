<?php

namespace App\Services;
use App\Entity\Etudiant;
use Doctrine\ORM\EntityManagerInterface;

class ListeStudent
    {
        private $entityManager;

        public function __construct(EntityManagerInterface $entityManager)
        {
            $this->entityManager = $entityManager;
        }

        public function getData(): array
        {
            /**
             * @var $user User[]
             */
            $list = [];
            $students = $this->entityManager->getRepository(Etudiant::class)->findAll();
    
            foreach ($students as $student) {
                $list[] = [
                    $student->getMatricule(),
                    $student->getNom(),
                    $student->getNiveau(),
                    $student->getParcours(),
                    $student->getPhone(),
                    $student->getEmail(),
                    $student->getSexe(),
                    $student->getNaissance()
                ];
            }
            return $list;
        }
    }