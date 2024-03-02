<?php

namespace App\Repository;

use App\Entity\Centredecollect;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Centredecollect>
 *
 * @method Centredecollect|null find($id, $lockMode = null, $lockVersion = null)
 * @method Centredecollect|null findOneBy(array $criteria, array $orderBy = null)
 * @method Centredecollect[]    findAll()
 * @method Centredecollect[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CentredecollectRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Centredecollect::class);
    }

//    /**
//     * @return Centredecollect[] Returns an array of Centredecollect objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Centredecollect
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
