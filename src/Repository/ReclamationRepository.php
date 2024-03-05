<?php

namespace App\Repository;

use App\Entity\Reclamation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Reclamation>
 *
 * @method Reclamation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Reclamation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Reclamation[]    findAll()
 * @method Reclamation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReclamationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reclamation::class);
    }

   
    public function findByIdUser($value): array
    {        return $this->createQueryBuilder('r')
           ->andWhere('r.id_user = :val')
            ->setParameter('val', $value)
            ->orderBy('r.createdAt', 'ASC')
            ->getQuery()
           ->getResult()
        ;
    }
    public function countRecentReclamations(int $iduser, int $days)
{
    $qb = $this->createQueryBuilder('r')
        ->select('COUNT(r)')
        ->andWhere('r.id_user = :user')
        ->andWhere('r.createdAt >= :since')
        ->setParameter('user', $iduser)
        ->setParameter('since', (new \DateTime())->modify("-$days days"));

    return $qb->getQuery()->getSingleScalarResult();
}
public function search($value): array
{
    return $this->createQueryBuilder('r')
        ->andWhere('r.titre LIKE :val')
        ->orWhere('r.description LIKE :val')
        ->setParameter('val', '%' . $value . '%')
        ->getQuery()
        ->getResult();
}

//    public function findOneBySomeField($value): ?Reclamation
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
