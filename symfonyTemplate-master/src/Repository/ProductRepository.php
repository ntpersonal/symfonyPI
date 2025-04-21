<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Product>
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    /**
     * Search for products based on criteria
     *
     * @param string|null $searchTerm Search term for product name
     * @param string|null $category Category filter
     * @param string|null $stock Stock status filter
     * @return array
     */
    public function search(?string $searchTerm = null, ?string $category = null, ?string $stock = null): array
    {
        $qb = $this->createQueryBuilder('p');
        
        // Filter by name if search term is provided
        if ($searchTerm) {
            $qb->andWhere('p.nameproduct LIKE :searchTerm')
               ->setParameter('searchTerm', '%' . $searchTerm . '%');
        }
        
        // Filter by category if provided
        if ($category) {
            $qb->andWhere('p.category = :category')
               ->setParameter('category', $category);
        }
        
        // Filter by stock status if provided
        if ($stock) {
            $qb->andWhere('p.stock = :stock')
               ->setParameter('stock', $stock);
        }
        
        return $qb->getQuery()->getResult();
    }

    // Custom queries can be added here later.
}
