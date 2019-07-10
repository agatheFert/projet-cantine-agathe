<?php

namespace App\Repository;

use App\Entity\Accompagnement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Accompagnement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Accompagnement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Accompagnement[]    findAll()
 * @method Accompagnement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AccompagnementRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Accompagnement::class);
    }

    // /**
    //  * @return Accompagnement[] Returns an array of Accompagnement objects
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
    public function findOneBySomeField($value): ?Accompagnement
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
