<?php

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class ImageAIService
{
    private $httpClient;
    private $params;
    private $apiKey;
    
    public function __construct(HttpClientInterface $httpClient = null, ParameterBagInterface $params = null)
    {
        $this->httpClient = $httpClient ?? HttpClient::create();
        $this->params = $params;
        
        // In production, this should be stored in your .env file or Symfony secrets
        // For now, we'll use a placeholder that you'll need to replace with your actual API key
        $this->apiKey = 'YOUR_GOOGLE_CLOUD_VISION_API_KEY';
    }
    
    /**
     * Analyze an image using Google Cloud Vision API
     * 
     * @param string $imagePath Path to the image file
     * @return array Analysis results
     */
    public function analyzeImage(string $imagePath): array
    {
        if (!file_exists($imagePath)) {
            return ['error' => 'Image file not found'];
        }
        
        try {
            // Read the image file and encode it as base64
            $imageContent = file_get_contents($imagePath);
            $base64Image = base64_encode($imageContent);
            
            // Prepare the request payload for Google Cloud Vision API
            $payload = [
                'requests' => [
                    [
                        'image' => [
                            'content' => $base64Image
                        ],
                        'features' => [
                            [
                                'type' => 'LABEL_DETECTION',
                                'maxResults' => 10
                            ],
                            [
                                'type' => 'IMAGE_PROPERTIES',
                                'maxResults' => 5
                            ],
                            [
                                'type' => 'OBJECT_LOCALIZATION',
                                'maxResults' => 5
                            ]
                        ]
                    ]
                ]
            ];
            
            // Make the API request
            $response = $this->httpClient->request('POST', 
                'https://vision.googleapis.com/v1/images:annotate?key=' . $this->apiKey, 
                [
                    'json' => $payload,
                    'headers' => [
                        'Content-Type' => 'application/json'
                    ]
                ]
            );
            
            // Parse and return the results
            $statusCode = $response->getStatusCode();
            if ($statusCode === 200) {
                $result = $response->toArray();
                return $this->parseVisionApiResponse($result);
            } else {
                return ['error' => 'API request failed with status code ' . $statusCode];
            }
            
        } catch (\Exception $e) {
            return ['error' => 'Error analyzing image: ' . $e->getMessage()];
        }
    }
    
    /**
     * Parse the Google Cloud Vision API response
     * 
     * @param array $response The API response
     * @return array Parsed results
     */
    private function parseVisionApiResponse(array $response): array
    {
        $result = [
            'labels' => [],
            'colors' => [],
            'objects' => []
        ];
        
        if (!isset($response['responses'][0])) {
            return $result;
        }
        
        $annotations = $response['responses'][0];
        
        // Extract labels (general image content)
        if (isset($annotations['labelAnnotations'])) {
            foreach ($annotations['labelAnnotations'] as $label) {
                $result['labels'][] = [
                    'description' => $label['description'],
                    'score' => $label['score']
                ];
            }
        }
        
        // Extract dominant colors
        if (isset($annotations['imagePropertiesAnnotation']['dominantColors']['colors'])) {
            foreach ($annotations['imagePropertiesAnnotation']['dominantColors']['colors'] as $color) {
                $result['colors'][] = [
                    'red' => $color['color']['red'] ?? 0,
                    'green' => $color['color']['green'] ?? 0,
                    'blue' => $color['color']['blue'] ?? 0,
                    'score' => $color['score'] ?? 0,
                    'pixelFraction' => $color['pixelFraction'] ?? 0
                ];
            }
        }
        
        // Extract detected objects
        if (isset($annotations['localizedObjectAnnotations'])) {
            foreach ($annotations['localizedObjectAnnotations'] as $object) {
                $result['objects'][] = [
                    'name' => $object['name'],
                    'score' => $object['score']
                ];
            }
        }
        
        return $result;
    }
    
    /**
     * Find products similar to the analyzed image
     * 
     * @param array $imageAnalysis Analysis results from Google Cloud Vision
     * @param array $allProducts All products to search through
     * @return array Products sorted by similarity
     */
    public function findSimilarProducts(array $imageAnalysis, array $allProducts): array
    {
        // If there was an error in analysis, return all products
        if (isset($imageAnalysis['error'])) {
            return $allProducts;
        }
        
        // Score each product based on similarity to the image analysis
        $scoredProducts = [];
        foreach ($allProducts as $product) {
            $score = $this->calculateSimilarityScore($imageAnalysis, $product);
            $scoredProducts[] = [
                'product' => $product,
                'score' => $score
            ];
        }
        
        // Sort products by similarity score (highest first)
        usort($scoredProducts, function ($a, $b) {
            return $b['score'] <=> $a['score'];
        });
        
        // Return just the products in order of similarity
        return array_map(function ($item) {
            return $item['product'];
        }, $scoredProducts);
    }
    
    /**
     * Calculate similarity score between image analysis and a product
     * 
     * @param array $imageAnalysis Analysis results from Google Cloud Vision
     * @param object $product Product to compare
     * @return float Similarity score (0-100)
     */
    private function calculateSimilarityScore(array $imageAnalysis, $product): float
    {
        $score = 0;
        
        // Base score for all products
        $score += 10;
        
        // Bonus for products with images
        if ($product->getImage()) {
            $score += 20;
        }
        
        // Bonus for products in stock
        if ($product->getStock() === 'yes') {
            $score += 15;
        }
        
        // Get product details
        $productName = strtolower($product->getNameproduct() ?? '');
        $productCategory = strtolower($product->getCategory() ?? '');
        
        // Check for label matches
        if (isset($imageAnalysis['labels'])) {
            foreach ($imageAnalysis['labels'] as $label) {
                $labelText = strtolower($label['description']);
                $confidence = $label['score']; // 0 to 1
                
                // Check if label appears in product name
                if (strpos($productName, $labelText) !== false) {
                    $score += 25 * $confidence;
                }
                
                // Check if label appears in product category
                if (strpos($productCategory, $labelText) !== false) {
                    $score += 30 * $confidence;
                }
                
                // Special case for sports-related labels
                $sportsTerms = ['sport', 'ball', 'game', 'player', 'team', 'athletic', 'competition'];
                foreach ($sportsTerms as $term) {
                    if (strpos($labelText, $term) !== false) {
                        $score += 15 * $confidence;
                        break;
                    }
                }
            }
        }
        
        // Check for object matches
        if (isset($imageAnalysis['objects'])) {
            foreach ($imageAnalysis['objects'] as $object) {
                $objectName = strtolower($object['name']);
                $confidence = $object['score']; // 0 to 1
                
                // Check if object appears in product name
                if (strpos($productName, $objectName) !== false) {
                    $score += 25 * $confidence;
                }
                
                // Specific object types that might be relevant to products
                $relevantObjects = [
                    'Clothing' => ['clothes', 'jersey', 'shirt', 'uniform'],
                    'Sports equipment' => ['tournement', 'ball', 'equipment'],
                    'Trophy' => ['trophies', 'award', 'medal']
                ];
                
                foreach ($relevantObjects as $category => $terms) {
                    if ($objectName === strtolower($category)) {
                        if (in_array($productCategory, $terms)) {
                            $score += 40 * $confidence;
                        }
                    }
                }
            }
        }
        
        // Add some randomness (±5 points)
        $score += mt_rand(-5, 5);
        
        // Cap the score at 100
        return min(100, $score);
    }
}
