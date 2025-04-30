<?php

namespace App\ProductRecommendationBundle\Services;

use App\Entity\Product;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;

class ProductRecommendationService
{
    /**
     * @var RecommendationStrategyInterface[]
     */
    private $strategies = [];
    
    /**
     * @var ManagerRegistry
     */
    private $doctrine;
    
    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }
    
    /**
     * Add a recommendation strategy to the service
     *
     * @param RecommendationStrategyInterface $strategy
     * @return self
     */
    public function addStrategy(RecommendationStrategyInterface $strategy): self
    {
        $this->strategies[$strategy->getName()] = $strategy;
        return $this;
    }
    
    /**
     * Get recommendations using a specific strategy
     *
     * @param string $strategyName The name of the strategy to use
     * @param User|null $user The user to get recommendations for
     * @param Product|null $currentProduct The current product being viewed
     * @param array $options Additional options for the recommendation algorithm
     * @return array Array of recommended Product objects
     */
    public function getRecommendationsByStrategy(string $strategyName, ?User $user = null, ?Product $currentProduct = null, array $options = []): array
    {
        if (!isset($this->strategies[$strategyName])) {
            return [];
        }
        
        return $this->strategies[$strategyName]->getRecommendations($user, $currentProduct, $options);
    }
    
    /**
     * Get recommendations from all available strategies
     *
     * @param User|null $user The user to get recommendations for
     * @param Product|null $currentProduct The current product being viewed
     * @param array $options Additional options for the recommendation algorithm
     * @return array Associative array with strategy names as keys and arrays of Product objects as values
     */
    public function getAllRecommendations(?User $user = null, ?Product $currentProduct = null, array $options = []): array
    {
        $results = [];
        
        foreach ($this->strategies as $name => $strategy) {
            $results[$name] = $strategy->getRecommendations($user, $currentProduct, $options);
        }
        
        return $results;
    }
    
    /**
     * Get a combined list of recommendations from all strategies
     *
     * @param User|null $user The user to get recommendations for
     * @param Product|null $currentProduct The current product being viewed
     * @param int $limit Maximum number of recommendations to return
     * @param array $options Additional options for the recommendation algorithm
     * @return array Array of recommended Product objects
     */
    public function getCombinedRecommendations(?User $user = null, ?Product $currentProduct = null, int $limit = 8, array $options = []): array
    {
        $allRecommendations = [];
        $seenProductIds = [];
        
        // If we have a current product, add it to seen products so we don't recommend it
        if ($currentProduct) {
            $seenProductIds[] = $currentProduct->getId();
        }
        
        // Get recommendations from each strategy with a smaller limit
        $strategyCount = count($this->strategies);
        if ($strategyCount > 0) {
            $strategyLimit = max(2, intval($limit / $strategyCount));
        } else {
            $strategyLimit = $limit;
        }
        $options['limit'] = $strategyLimit;
        
        foreach ($this->strategies as $strategy) {
            $recommendations = $strategy->getRecommendations($user, $currentProduct, $options);
            
            foreach ($recommendations as $product) {
                if (!in_array($product->getId(), $seenProductIds)) {
                    $allRecommendations[] = $product;
                    $seenProductIds[] = $product->getId();
                    
                    // If we've reached our limit, stop adding products
                    if (count($allRecommendations) >= $limit) {
                        break 2;
                    }
                }
            }
        }
        
        // If we still need more recommendations, get some random products
        if (count($allRecommendations) < $limit) {
            $neededMore = $limit - count($allRecommendations);
            
            $repository = $this->doctrine->getRepository(Product::class);
            $qb = $repository->createQueryBuilder('p')
                ->where('p.deleted = false OR p.deleted IS NULL')
                ->andWhere('p.stock = :inStock');
                
            if (!empty($seenProductIds)) {
                $qb->andWhere('p.id NOT IN (:seenIds)')
                   ->setParameter('seenIds', $seenProductIds);
            }
            
            $qb->setParameter('inStock', 'yes')
               ->orderBy('p.id', 'DESC') // Use a simple ordering instead of RAND()
               ->setMaxResults($neededMore);
               
            $randomProducts = $qb->getQuery()->getResult();
            $allRecommendations = array_merge($allRecommendations, $randomProducts);
        }
        
        return $allRecommendations;
    }
    
    /**
     * Get all available strategy names
     *
     * @return array Array of strategy names
     */
    public function getAvailableStrategies(): array
    {
        return array_keys($this->strategies);
    }
}
