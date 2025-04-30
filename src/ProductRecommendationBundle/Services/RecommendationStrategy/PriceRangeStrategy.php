<?php

namespace App\ProductRecommendationBundle\Services\RecommendationStrategy;

use App\Entity\Product;
use App\Entity\User;
use App\ProductRecommendationBundle\Services\RecommendationStrategyInterface;
use Doctrine\Persistence\ManagerRegistry;

class PriceRangeStrategy implements RecommendationStrategyInterface
{
    private $doctrine;
    
    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }
    
    public function getRecommendations(?User $user = null, ?Product $currentProduct = null, array $options = []): array
    {
        if (!$currentProduct) {
            return [];
        }
        
        $limit = $options['limit'] ?? 4;
        $priceRange = $options['priceRange'] ?? 20; // Default price range is ±$20
        
        $currentPrice = $currentProduct->getPriceproduct();
        $minPrice = $currentPrice - $priceRange;
        $maxPrice = $currentPrice + $priceRange;
        
        if ($minPrice < 0) {
            $minPrice = 0;
        }
        
        try {
            $repository = $this->doctrine->getRepository(Product::class);
            $qb = $repository->createQueryBuilder('p')
                ->where('p.priceproduct BETWEEN :minPrice AND :maxPrice')
                ->andWhere('p.id != :currentId')
                ->andWhere('p.deleted = false OR p.deleted IS NULL')
                ->andWhere('p.stock = :inStock')
                ->setParameter('minPrice', $minPrice)
                ->setParameter('maxPrice', $maxPrice)
                ->setParameter('currentId', $currentProduct->getId())
                ->setParameter('inStock', 'yes')
                ->setParameter('currentPrice', $currentPrice)
                ->setMaxResults($limit);
            
            // Some database systems might not support ABS function directly
            // Try to use it but fall back if it fails
            try {
                $qb->orderBy('ABS(p.priceproduct - :currentPrice)', 'ASC');
                return $qb->getQuery()->getResult();
            } catch (\Exception $e) {
                // Fall back to a simpler ordering if ABS function fails
                $qb->orderBy('p.priceproduct', 'ASC');
                return $qb->getQuery()->getResult();
            }
        } catch (\Exception $e) {
            // If there's any other error, return an empty array
            return [];
        }
    }
    
    public function getName(): string
    {
        return 'Similar Price Range';
    }
}
