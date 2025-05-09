<?php

namespace App\ProductRecommendationBundle\Services;

use App\Entity\Product;
use App\Entity\User;

interface RecommendationStrategyInterface
{
    /**
     * Get product recommendations based on a specific strategy
     *
     * @param User|null $user The user to get recommendations for (optional)
     * @param Product|null $currentProduct The current product being viewed (optional)
     * @param array $options Additional options for the recommendation algorithm
     * @return array Array of recommended Product objects
     */
    public function getRecommendations(?User $user = null, ?Product $currentProduct = null, array $options = []): array;
    
    /**
     * Get the name of this recommendation strategy
     *
     * @return string
     */
    public function getName(): string;
}
