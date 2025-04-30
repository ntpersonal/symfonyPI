<?php

namespace App\ProductRecommendationBundle\Services\RecommendationStrategy;

use App\Entity\Product;
use App\Entity\User;
use App\Entity\Order;
use App\ProductRecommendationBundle\Services\RecommendationStrategyInterface;
use Doctrine\Persistence\ManagerRegistry;

class PopularProductsStrategy implements RecommendationStrategyInterface
{
    private $doctrine;
    
    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }
    
    public function getRecommendations(?User $user = null, ?Product $currentProduct = null, array $options = []): array
    {
        $limit = $options['limit'] ?? 4;
        $excludeIds = [];
        
        if ($currentProduct) {
            $excludeIds[] = $currentProduct->getId();
        }
        
        // Get products ordered by popularity (number of orders)
        $entityManager = $this->doctrine->getManager();
        
        try {
            // Query to get products ordered by number of orders
            $query = $entityManager->createQuery(
                'SELECT p, COUNT(o.id) as orderCount
                 FROM App\\Entity\\Product p
                 LEFT JOIN App\\Entity\\Order o WITH o.product = p
                 WHERE (p.deleted = false OR p.deleted IS NULL)
                 AND p.stock = :inStock
                 GROUP BY p.id
                 ORDER BY orderCount DESC'
            )->setParameter('inStock', 'yes')
             ->setMaxResults($limit);
             
            $results = $query->getResult();
        } catch (\Exception $e) {
            // If there's an error with the query, fall back to a simpler query
            $repository = $this->doctrine->getRepository(Product::class);
            $qb = $repository->createQueryBuilder('p')
                ->where('p.deleted = false OR p.deleted IS NULL')
                ->andWhere('p.stock = :inStock')
                ->setParameter('inStock', 'yes')
                ->orderBy('p.id', 'DESC')
                ->setMaxResults($limit);
                
            if (!empty($excludeIds)) {
                $qb->andWhere('p.id NOT IN (:excludeIds)')
                   ->setParameter('excludeIds', $excludeIds);
            }
            
            $results = [];
            foreach ($qb->getQuery()->getResult() as $product) {
                $results[] = [$product, 1]; // Simulate the [product, count] format
            }
        }
        
        // Extract just the Product entities
        $products = [];
        foreach ($results as $result) {
            if (is_array($result) && isset($result[0]) && $result[0] instanceof Product) {
                if (!in_array($result[0]->getId(), $excludeIds)) {
                    $products[] = $result[0];
                }
            }
        }
        
        // If we don't have enough products, get some more based on price
        if (count($products) < $limit) {
            $neededMore = $limit - count($products);
            $existingIds = array_map(function($product) {
                return $product->getId();
            }, $products);
            
            $excludeIds = array_merge($excludeIds, $existingIds);
            
            $repository = $this->doctrine->getRepository(Product::class);
            $qb = $repository->createQueryBuilder('p')
                ->where('p.deleted = false OR p.deleted IS NULL')
                ->andWhere('p.stock = :inStock');
                
            if (!empty($excludeIds)) {
                $qb->andWhere('p.id NOT IN (:excludeIds)')
                   ->setParameter('excludeIds', $excludeIds);
            }
            
            $qb->setParameter('inStock', 'yes')
               ->orderBy('p.priceproduct', 'DESC')
               ->setMaxResults($neededMore);
               
            $additionalProducts = $qb->getQuery()->getResult();
            $products = array_merge($products, $additionalProducts);
        }
        
        return $products;
    }
    
    public function getName(): string
    {
        return 'Popular Products';
    }
}
