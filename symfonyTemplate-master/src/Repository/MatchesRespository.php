<?php

namespace App\Repository;

use App\Entity\Matches;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class MatchesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Matches::class);
    }

    // Add custom query methods if needed:
    // public function findByStatus(string $status): array
    // {
    //     return $this->createQueryBuilder('m')
    //         ->andWhere('m.status = :status')
    //         ->setParameter('status', $status)
    //         ->getQuery()
    //         ->getResult()
    //     ;
    // }
}
