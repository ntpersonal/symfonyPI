<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<User>
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }



    public function countUsersRegisteredThisMonth(): int
    {
        $now = new \DateTime();
        $firstDayOfMonth = new \DateTime($now->format('Y-m-01'));

        return $this->createQueryBuilder('u')
            ->select('COUNT(u.id)')
            ->where('u.createdat >= :start_date')
            ->setParameter('start_date', $firstDayOfMonth)
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function countUsersRegisteredLastMonth(): int
    {
        $now = new \DateTime();
        $firstDayOfCurrentMonth = new \DateTime($now->format('Y-m-01'));
        $firstDayOfLastMonth = (clone $firstDayOfCurrentMonth)->modify('-1 month');

        return $this->createQueryBuilder('u')
            ->select('COUNT(u.id)')
            ->where('u.createdat >= :start_date')
            ->andWhere('u.createdat < :end_date')
            ->setParameter('start_date', $firstDayOfLastMonth)
            ->setParameter('end_date', $firstDayOfCurrentMonth)
            ->getQuery()
            ->getSingleScalarResult();
    }

    /**
     * Find all users who have face data registered
     * 
     * @return User[] Returns an array of User objects with face data
     */
    public function findUsersWithFaceData(): array
    {
        return $this->createQueryBuilder('u')
            ->where('u.faceData IS NOT NULL')
            ->andWhere('u.faceData != :empty')
            ->setParameter('empty', '')
            ->getQuery()
            ->getResult();
    }




    //    /**
    //     * @return User[] Returns an array of User objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('u')
    //            ->andWhere('u.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('u.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?User
    //    {
    //        return $this->createQueryBuilder('u')
    //            ->andWhere('u.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
