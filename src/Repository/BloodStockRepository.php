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
<<<<<<< HEAD
    public function findAvailableQuantity(): float
    {
        // Implémentez votre logique pour récupérer la quantité disponible dans le stock ici
        // Par exemple, vous pouvez simplement renvoyer la somme des quantités disponibles dans toutes les entrées du stock de sang
        $qb = $this->createQueryBuilder('bs');
        $qb->select('SUM(bs.quantity_available) as totalQuantity');
        $query = $qb->getQuery();
        $result = $query->getSingleScalarResult();

        return (float) $result;
    }

=======
>>>>>>> 23a1a9b (walaa new commit)

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
