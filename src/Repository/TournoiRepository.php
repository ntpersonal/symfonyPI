<?php

namespace App\Repository;

use App\Entity\Tournoi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Tournois|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tournois|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tournois[]    findAll()
 * @method Tournois[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TournoiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        // Tells Doctrine which entity this repository is for
        parent::__construct($registry, Tournoi::class);
    }

    /**
     * Example custom query method:
     * 
     * public function findActiveTournois(): array
     * {
     *     return $this->createQueryBuilder('t')
     *         ->where('t.status = :status')
     *         ->setParameter('status', 'ACTIVE')
     *         ->getQuery()
     *         ->getResult()
     *     ;
     * }
     */
}
