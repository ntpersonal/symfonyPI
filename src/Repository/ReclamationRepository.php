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

//    /**
//     * @return Reclamation[] Returns an array of Reclamation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Reclamation
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

    public function add(Reclamation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Reclamation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Recherche les réclamations avec des filtres avancés
     *
     * @param string|null $status Le statut à filtrer
     * @param string|null $dateFrom Date de début au format Y-m-d
     * @param string|null $dateTo Date de fin au format Y-m-d
     * @param int|null $userId ID de l'utilisateur si filtrage par utilisateur
     * @return Reclamation[] Un tableau de réclamations
     */
    public function findByFilters(?string $status = null, ?string $dateFrom = null, ?string $dateTo = null, ?int $userId = null): array
    {
        $qb = $this->createQueryBuilder('r')
            ->orderBy('r.created_at', 'DESC');

        // Filtrer par statut si spécifié
        if ($status) {
            $qb->andWhere('r.status = :status')
                ->setParameter('status', $status);
        }

        // Filtrer par date de début si spécifiée
        if ($dateFrom) {
            $dateFromObj = new \DateTime($dateFrom);
            $dateFromObj->setTime(0, 0, 0); // Début de la journée

            $qb->andWhere('r.created_at >= :dateFrom')
                ->setParameter('dateFrom', $dateFromObj);
        }

        // Filtrer par date de fin si spécifiée
        if ($dateTo) {
            $dateToObj = new \DateTime($dateTo);
            $dateToObj->setTime(23, 59, 59); // Fin de la journée

            $qb->andWhere('r.created_at <= :dateTo')
                ->setParameter('dateTo', $dateToObj);
        }

        // Filtrer par utilisateur si spécifié
        if ($userId) {
            $qb->andWhere('r.user = :userId')
                ->setParameter('userId', $userId);
        }

        return $qb->getQuery()->getResult();
    }

    public function findBySearchCriteriaAndSort(?string $searchTerm, $sortField = 'id', $sortOrder = 'ASC'): array
    {
        $qb = $this->createQueryBuilder('c');

        if ($searchTerm) {
            $qb->where('c.title LIKE :term OR c.content LIKE :term')
                ->setParameter('term', '%' . $searchTerm . '%');
        }

        return $qb->getQuery()->getResult();
    }
}
