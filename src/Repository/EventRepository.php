<?php

namespace App\Repository;

use App\Entity\Event;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Event>
 */
class EventRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Event::class);
    }

    //    /**
    //     * @return Event[] Returns an array of Event objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('e.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Event
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    /**
     * Recherche des événements par mot-clé
     * @param string $keyword Le mot-clé à rechercher
     * @param int $limit Maximum number of results to return
     * @param int $offset Number of results to skip
     * @return Event[] Les événements correspondants
     */
    public function searchByKeyword(string $keyword, int $limit = 10, int $offset = 0): array
    {
        return $this->createQueryBuilder('e')
            ->where('e.nom LIKE :keyword')
            ->orWhere('e.description LIKE :keyword')
            ->orWhere('e.address LIKE :keyword')
            ->setParameter('keyword', '%' . $keyword . '%')
            ->orderBy('e.start_time', 'ASC')
            ->setMaxResults($limit)
            ->setFirstResult($offset)
            ->getQuery()
            ->getResult();
    }

    /**
     * Search events with pagination
     * @param string $searchTerm Search term
     * @param int $limit Maximum number of results
     * @param int $offset Pagination offset
     * @return Event[] Search results
     */
    public function searchEvents(string $searchTerm, int $limit = 10, int $offset = 0)
    {
        $queryBuilder = $this->createQueryBuilder('e')
            ->where('e.nom LIKE :searchTerm')
            ->orWhere('e.description LIKE :searchTerm')
            ->setParameter('searchTerm', '%' . $searchTerm . '%')
            ->orderBy('e.start_time', 'DESC')
            ->setMaxResults($limit)
            ->setFirstResult($offset);

        return $queryBuilder->getQuery()->getResult();
    }

    /**
     * Find events created in the last 7 days
     * @param int $limit Maximum number of results
     * @return Event[] New events
     */
    public function findNewEvents(int $limit = 10): array
    {
        $date = new \DateTime();
        $date->modify('-7 days');

        return $this->createQueryBuilder('e')
            ->where('e.created_at >= :date')
            ->setParameter('date', $date)
            ->orderBy('e.created_at', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    /**
     * Get event statistics including participant counts
     * @return array Statistics data
     */
    public function getEventStatistics(): array
    {
        $entityManager = $this->getEntityManager();

        // Stats par type d'événement (basé sur le statut)
        $statusStatsQuery = $entityManager->createQuery(
            'SELECT e.status, COUNT(e) as eventCount 
            FROM App\Entity\Event e 
            GROUP BY e.status'
        );
        $statusStats = $statusStatsQuery->getResult();

        // Stats sur les participants (nombre d'événements par tranche de participants)
        $participantRanges = [
            '0' => '0 participants',
            '1-5' => '1-5 participants',
            '6-10' => '6-10 participants',
            '11-20' => '11-20 participants',
            '21+' => '21+ participants'
        ];

        $participantStats = [];
        foreach ($participantRanges as $key => $label) {
            $participantStats[$key] = [
                'label' => $label,
                'count' => 0
            ];
        }

        // Récupérer tous les événements avec le nombre de participants
        $events = $this->createQueryBuilder('e')
            ->select('e', 'COUNT(r) as participantCount')
            ->leftJoin('e.reservations', 'r')
            ->groupBy('e.id')
            ->getQuery()
            ->getResult();

        // Compter le nombre d'événements par tranche de participants
        foreach ($events as $result) {
            $event = $result[0];
            $count = $result['participantCount'];

            if ($count == 0) {
                $participantStats['0']['count']++;
            } elseif ($count >= 1 && $count <= 5) {
                $participantStats['1-5']['count']++;
            } elseif ($count >= 6 && $count <= 10) {
                $participantStats['6-10']['count']++;
            } elseif ($count >= 11 && $count <= 20) {
                $participantStats['11-20']['count']++;
            } else {
                $participantStats['21+']['count']++;
            }
        }

        // Stats sur le taux de remplissage des événements (pourcentage moyen de places occupées)
        $fillRateQuery = $entityManager->createQuery(
            'SELECT AVG(
                CASE 
                    WHEN e.max_participants > 0 
                    THEN (e.current_participants / e.max_participants) * 100 
                    ELSE 0 
                END
            ) as averageFillRate
            FROM App\Entity\Event e
            WHERE e.max_participants > 0'
        );

        $fillRateResult = $fillRateQuery->getOneOrNullResult();
        $averageFillRate = $fillRateResult ? $fillRateResult['averageFillRate'] : 0;

        // Événements les plus populaires
        $popularEventsQuery = $entityManager->createQuery(
            'SELECT e.id, e.nom, COUNT(r) as participantCount
            FROM App\Entity\Event e
            LEFT JOIN e.reservations r
            GROUP BY e.id
            ORDER BY participantCount DESC'
        )->setMaxResults(5);

        $popularEvents = $popularEventsQuery->getResult();

        return [
            'statusStats' => $statusStats,
            'participantStats' => array_values($participantStats),
            'averageFillRate' => round($averageFillRate, 2),
            'popularEvents' => $popularEvents,
            'totalEvents' => count($events)
        ];
    }
}
