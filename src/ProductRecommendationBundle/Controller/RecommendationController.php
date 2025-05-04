<?php

namespace App\ProductRecommendationBundle\Controller;

use App\Entity\Product;
use App\ProductRecommendationBundle\Services\ProductRecommendationService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecommendationController extends AbstractController
{
    /**
     * @var ProductRecommendationService
     */
    private $recommendationService;
    
    public function __construct(ProductRecommendationService $recommendationService)
    {
        $this->recommendationService = $recommendationService;
    }
    
    /**
     * Display product recommendations
     */
    public function showRecommendations(Product $product = null, string $strategy = null, int $limit = 4): Response
    {
        $user = $this->getUser();
        
        if ($strategy) {
            $recommendations = $this->recommendationService->getRecommendationsByStrategy(
                $strategy, 
                $user, 
                $product, 
                ['limit' => $limit]
            );
            
            return $this->render('@ProductRecommendation/recommendation/recommendations_by_strategy.html.twig', [
                'recommendations' => $recommendations,
                'strategy' => $strategy,
                'currentProduct' => $product
            ]);
        }
        
        $recommendations = $this->recommendationService->getCombinedRecommendations(
            $user, 
            $product, 
            $limit
        );
        
        return $this->render('@ProductRecommendation/recommendation/recommendations.html.twig', [
            'recommendations' => $recommendations,
            'currentProduct' => $product
        ]);
    }
    
    /**
     * Display all recommendation strategies
     */
    public function showAllStrategies(Product $product = null, int $limit = 3): Response
    {
        $user = $this->getUser();
        
        $allRecommendations = $this->recommendationService->getAllRecommendations(
            $user, 
            $product, 
            ['limit' => $limit]
        );
        
        return $this->render('@ProductRecommendation/recommendation/all_strategies.html.twig', [
            'allRecommendations' => $allRecommendations,
            'currentProduct' => $product
        ]);
    }
}
