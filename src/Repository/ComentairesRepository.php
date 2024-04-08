<?php

namespace App\Repository;

use App\Entity\Comentaires;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Comentaires>
 *
 * @method Comentaires|null find($id, $lockMode = null, $lockVersion = null)
 * @method Comentaires|null findOneBy(array $criteria, array $orderBy = null)
 * @method Comentaires[]    findAll()
 * @method Comentaires[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ComentairesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Comentaires::class);
    }

    //    /**
    //     * @return Comentaires[] Returns an array of Comentaires objects
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

    //    public function findOneBySomeField($value): ?Comentaires
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
