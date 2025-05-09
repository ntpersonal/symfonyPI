<?php

namespace App\Repository;

use App\Entity\Order;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Order>
 */
class OrderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Order::class);
    }

    /**
     * Search for orders based on criteria
     *
     * @param string|null $search Search term for order ID or customer email
     * @param string|null $status Order status filter
     * @param string|null $product Product name filter
     * @param string|null $dateFrom Date filter (from)
     * @return array
     */
    public function search(?string $search = null, ?string $status = null, ?string $product = null, ?string $dateFrom = null): array
    {
        $qb = $this->createQueryBuilder('o')
            ->leftJoin('o.user', 'u')
            ->leftJoin('o.product', 'p');

        // Search by ID or customer email
        if ($search) {
            $qb->andWhere('o.id = :searchId OR u.email LIKE :searchEmail')
               ->setParameter('searchId', $search)
               ->setParameter('searchEmail', '%' . $search . '%');
        }
        
        // Filter by status if provided
        if ($status) {
            $qb->andWhere('o.status = :status')
               ->setParameter('status', $status);
        }
        
        // Filter by product name if provided
        if ($product) {
            $qb->andWhere('p.nameproduct = :product')
               ->setParameter('product', $product);
        }
        
        // Filter by date if provided
        if ($dateFrom) {
            $qb->andWhere('o.date >= :dateFrom')
               ->setParameter('dateFrom', new \DateTime($dateFrom . ' 00:00:00'));
        }
        
        // Order by most recent first
        $qb->orderBy('o.date', 'DESC');
        
        return $qb->getQuery()->getResult();
    }

    //    public function findOneBySomeField($value): ?Order
    //    {
    //        return $this->createQueryBuilder('o')
    //            ->andWhere('o.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
