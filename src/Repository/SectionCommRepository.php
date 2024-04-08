<?php

namespace App\Repository;

use App\Entity\SectionComm;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SectionComm>
 *
 * @method SectionComm|null find($id, $lockMode = null, $lockVersion = null)
 * @method SectionComm|null findOneBy(array $criteria, array $orderBy = null)
 * @method SectionComm[]    findAll()
 * @method SectionComm[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SectionCommRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SectionComm::class);
    }

    //    /**
    //     * @return SectionComm[] Returns an array of SectionComm objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('s.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?SectionComm
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
