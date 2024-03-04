<?php

namespace App\Repository;

use App\Entity\BloodTransaction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BloodTransaction>
 *
 * @method BloodTransaction|null find($id, $lockMode = null, $lockVersion = null)
 * @method BloodTransaction|null findOneBy(array $criteria, array $orderBy = null)
 * @method BloodTransaction[]    findAll()
 * @method BloodTransaction[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BloodTransactionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BloodTransaction::class);
    }

//    /**
//     * @return BloodTransaction[] Returns an array of BloodTransaction objects
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

//    public function findOneBySomeField($value): ?BloodTransaction
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
