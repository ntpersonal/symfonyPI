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
     * @param bool $includeDeleted Include soft-deleted products
     * @return array
     */
    public function search(?string $searchTerm = null, ?string $category = null, ?string $stock = null, bool $includeDeleted = false): array
    {
        $qb = $this->createQueryBuilder('p');

        // Exclude soft-deleted products by default
        if (!$includeDeleted) {
            $qb->andWhere('p.deleted = false OR p.deleted IS NULL');
        }

        // Search by name if search term is provided
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
            switch ($stock) {
                case 'in_stock':
                    $qb->andWhere('p.stock > 0');
                    break;
                case 'low_stock':
                    $qb->andWhere('p.stock > 0 AND p.stock < 10');
                    break;
                case 'out_of_stock':
                    $qb->andWhere('p.stock = 0');
                    break;
                default:
                    // If it's a specific stock value
                    $qb->andWhere('p.stock = :stock')
                       ->setParameter('stock', $stock);
            }
        }
        
        return $qb->getQuery()->getResult();
    }

    //    /**
    //     * @return Product[] Returns an array of Product objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('p.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Product
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
    
    /**
     * Override findAll to exclude soft-deleted products by default
     */
    public function findAll(): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.deleted = false OR p.deleted IS NULL')
            ->getQuery()
            ->getResult();
    }
    
    /**
     * Find all products including soft-deleted ones
     */
    public function findAllWithDeleted(): array
    {
        return parent::findAll();
    }
    
    /**
     * Override find to exclude soft-deleted products by default
     */
    public function find($id, $lockMode = null, $lockVersion = null): ?Product
    {
        $product = parent::find($id, $lockMode, $lockVersion);
        
        // Return null if product is soft-deleted
        if ($product && $product->isDeleted()) {
            return null;
        }
        
        return $product;
    }
    
    /**
     * Find a product by ID even if it's soft-deleted
     */
    public function findWithDeleted($id, $lockMode = null, $lockVersion = null): ?Product
    {
        return parent::find($id, $lockMode, $lockVersion);
    }
}
