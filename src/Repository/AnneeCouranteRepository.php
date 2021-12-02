<?php

namespace App\Repository;

use App\Entity\AnneeCourante;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AnneeCourante|null find($id, $lockMode = null, $lockVersion = null)
 * @method AnneeCourante|null findOneBy(array $criteria, array $orderBy = null)
 * @method AnneeCourante[]    findAll()
 * @method AnneeCourante[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnneeCouranteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AnneeCourante::class);
    }

    // /**
    //  * @return AnneeCourante[] Returns an array of AnneeCourante objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AnneeCourante
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
