<?php

namespace App\ProductRecommendationBundle\Services\RecommendationStrategy;

use App\Entity\Product;
use App\Entity\User;
use App\ProductRecommendationBundle\Services\RecommendationStrategyInterface;
use Doctrine\Persistence\ManagerRegistry;

class SameCategoryStrategy implements RecommendationStrategyInterface
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
        $category = $currentProduct->getCategory();
        
        try {
            $repository = $this->doctrine->getRepository(Product::class);
            $qb = $repository->createQueryBuilder('p')
                ->where('p.category = :category')
                ->andWhere('p.id != :currentId')
                ->andWhere('p.deleted = false OR p.deleted IS NULL')
                ->andWhere('p.stock = :inStock')
                ->setParameter('category', $category)
                ->setParameter('currentId', $currentProduct->getId())
                ->setParameter('inStock', 'yes')
                ->orderBy('p.priceproduct', 'ASC')
                ->setMaxResults($limit);
                
            return $qb->getQuery()->getResult();
        } catch (\Exception $e) {
            // If there's any error, return an empty array
            return [];
        }
    }
    
    public function getName(): string
    {
        return 'Same Category Products';
    }
}
