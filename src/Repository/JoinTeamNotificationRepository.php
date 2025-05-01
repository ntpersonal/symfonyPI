<?php

namespace App\Repository;

use App\Entity\JoinTeamNotification;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<JoinTeamNotification>
 */
class JoinTeamNotificationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JoinTeamNotification::class);
    }

    //    /**
    //     * @return JoinTeamNotification[] Returns an array of JoinTeamNotification objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('j')
    //            ->andWhere('j.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('j.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?JoinTeamNotification
    //    {
    //        return $this->createQueryBuilder('j')
    //            ->andWhere('j.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
