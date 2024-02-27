<?php

namespace App\Repository;

use App\Entity\BloodStock;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BloodStock>
 *
 * @method BloodStock|null find($id, $lockMode = null, $lockVersion = null)
 * @method BloodStock|null findOneBy(array $criteria, array $orderBy = null)
 * @method BloodStock[]    findAll()
 * @method BloodStock[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BloodStockRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BloodStock::class);
    }

//    /**
//     * @return BloodStock[] Returns an array of BloodStock objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?BloodStock
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
