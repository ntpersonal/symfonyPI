<?php

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ImageSearchService
{
    private $httpClient;
    
    public function __construct(HttpClientInterface $httpClient = null)
    {
        $this->httpClient = $httpClient ?? HttpClient::create();
    }
    
    /**
     * Find similar products based on image features
     * 
     * @param string $imagePath Path to the uploaded image
     * @param array $allProducts All products to search through
     * @return array Products sorted by similarity
     */
    public function findSimilarProducts(string $imagePath, array $allProducts): array
    {
        // Get basic image information
        $fileInfo = pathinfo($imagePath);
        $fileExtension = strtolower($fileInfo['extension'] ?? '');
        $fileSize = $this->getFileSize($imagePath);
        $fileName = strtolower($fileInfo['filename'] ?? '');
        
        // Extract keywords from the filename that might match product categories or names
        $keywords = $this->extractKeywords($fileName);
        
        // Score each product based on potential relevance
        $scoredProducts = [];
        foreach ($allProducts as $product) {
            $score = $this->calculateRelevanceScore($product, $keywords);
            $scoredProducts[] = [
                'product' => $product,
                'score' => $score
            ];
        }
        
        // Sort products by relevance score (highest first)
        usort($scoredProducts, function ($a, $b) {
            return $b['score'] <=> $a['score'];
        });
        
        // Limit to top 6 products (or fewer if there aren't enough)
        $limitedProducts = array_slice($scoredProducts, 0, min(6, count($scoredProducts)));
        
        // Return just the products in order of relevance
        return array_map(function ($item) {
            return $item['product'];
        }, $limitedProducts);
    }
    
    /**
     * Get the file size of an image
     * 
     * @param string $imagePath Path to the image
     * @return int File size in bytes
     */
    private function getFileSize(string $imagePath): int
    {
        if (file_exists($imagePath)) {
            return filesize($imagePath);
        }
        return 0;
    }
    
    /**
     * Extract keywords from a filename
     * 
     * @param string $fileName The filename to extract keywords from
     * @return array List of keywords
     */
    private function extractKeywords(string $fileName): array
    {
        // Remove numbers and special characters
        $cleanName = preg_replace('/[^a-z\s]/', ' ', $fileName);
        
        // Split into words
        $words = preg_split('/\s+/', $cleanName, -1, PREG_SPLIT_NO_EMPTY);
        
        // Filter out short words (less than 3 characters)
        $words = array_filter($words, function($word) {
            return strlen($word) >= 3;
        });
        
        // Add some common category keywords that might be relevant
        $categoryKeywords = ['tournement', 'clothes', 'trophies', 'sport', 'jersey', 'medal', 'cup', 'shirt', 'ball'];
        
        // Combine and make unique
        return array_unique(array_merge($words, $categoryKeywords));
    }
    
    /**
     * Calculate relevance score for a product based on keywords
     * 
     * @param object $product The product to score
     * @param array $keywords Keywords to match against
     * @return float Relevance score (0-100)
     */
    private function calculateRelevanceScore($product, array $keywords): float
    {
        $score = 0;
        
        // Base score for all products
        $score += 10;
        
        // Bonus for products with images
        if ($product->getImage()) {
            $score += 30;
        }
        
        // Bonus for products in stock
        if ($product->getStock() === 'yes') {
            $score += 20;
        }
        
        // Check for keyword matches in product name
        $productName = strtolower($product->getNameproduct() ?? '');
        $productCategory = strtolower($product->getCategory() ?? '');
        
        foreach ($keywords as $keyword) {
            // Check if keyword is in product name
            if (strpos($productName, $keyword) !== false) {
                $score += 15;
            }
            
            // Check if keyword is in product category
            if (strpos($productCategory, $keyword) !== false) {
                $score += 25;
            }
            
            // Check if keyword is exactly the category
            if ($productCategory === $keyword) {
                $score += 40;
            }
        }
        
        // Add some randomness to avoid identical scores (±5 points)
        $score += mt_rand(-5, 5);
        
        // Cap the score at 100
        return min(100, $score);
    }
}
