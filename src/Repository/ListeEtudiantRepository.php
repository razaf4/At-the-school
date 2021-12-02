<?php

namespace App\Repository;

use App\Entity\ListeEtudiant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ListeEtudiant|null find($id, $lockMode = null, $lockVersion = null)
 * @method ListeEtudiant|null findOneBy(array $criteria, array $orderBy = null)
 * @method ListeEtudiant[]    findAll()
 * @method ListeEtudiant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListeEtudiantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ListeEtudiant::class);
    }

    
    // /**
    //  * @return ListeEtudiant[] Returns an array of ListeEtudiant objects
    //  */
    
    public function findByValueWithGroup($value1,$value2,$value3,$value4,$value5)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.idAuD = :val1')
            ->andWhere('l.idAuF = :val2')
            ->andWhere('l.idNiveau = :val3')
            ->andWhere('l.idParcours = :val4')
            ->andWhere('l.idGroupe = :val5')
            ->setParameters(['val1'=>$value1 , 'val2'=>$value2 , 'val3'=>$value3 , 'val4'=>$value4 , 'val5'=>$value5 ])
            // ->orderBy('l.id', 'ASC')
            // ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    public function findByValueWithoutGroup($value1,$value2,$value3,$value4)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.idAuD = :val1')
            ->andWhere('l.idAuF = :val2')
            ->andWhere('l.idNiveau = :val3')
            ->andWhere('l.idParcours = :val4')
            ->setParameters(['val1'=>$value1 , 'val2'=>$value2 , 'val3'=>$value3 , 'val4'=>$value4])
            // ->orderBy('l.id', 'ASC')
            // ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    

    /*
    public function findOneBySomeField($value): ?ListeEtudiant
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
