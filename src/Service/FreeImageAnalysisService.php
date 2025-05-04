<?php

namespace App\Service;

class FreeImageAnalysisService
{
    // Pre-defined categories and their associated keywords
    private $categories = [
        'sports' => ['ball', 'game', 'team', 'player', 'field', 'court', 'match', 'tournament', 'competition'],
        'clothing' => ['shirt', 'jersey', 'uniform', 'wear', 'apparel', 'outfit', 'garment', 'textile', 'fabric'],
        'trophies' => ['trophy', 'medal', 'award', 'prize', 'cup', 'gold', 'silver', 'champion', 'winner'],
        'equipment' => ['gear', 'tool', 'device', 'accessory', 'apparatus', 'kit', 'implement', 'instrument']
    ];
    
    // Common colors and their RGB values
    private $colors = [
        'red' => [255, 0, 0],
        'green' => [0, 255, 0],
        'blue' => [0, 0, 255],
        'yellow' => [255, 255, 0],
        'black' => [0, 0, 0],
        'white' => [255, 255, 255],
        'orange' => [255, 165, 0],
        'purple' => [128, 0, 128],
        'pink' => [255, 192, 203],
        'brown' => [165, 42, 42],
        'gray' => [128, 128, 128]
    ];
    
    /**
     * Analyze an image using local methods
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
            // Get image metadata
            $imageInfo = $this->getImageInfo($imagePath);
            
            // Extract keywords from filename
            $keywords = $this->extractKeywordsFromFilename($imagePath);
            
            // Determine likely categories based on keywords
            $likelyCategories = $this->determineLikelyCategories($keywords);
            
            // Create labels from keywords and categories
            $labels = $this->createLabels($keywords, $likelyCategories);
            
            // Generate simulated color analysis
            $colors = $this->simulateColorAnalysis($imagePath);
            
            return [
                'labels' => $labels,
                'colors' => $colors,
                'metadata' => $imageInfo,
                'categories' => array_keys($likelyCategories)
            ];
        } catch (\Exception $e) {
            return ['error' => 'Error analyzing image: ' . $e->getMessage()];
        }
    }
    
    /**
     * Get basic image information
     * 
     * @param string $imagePath Path to the image
     * @return array Image information
     */
    private function getImageInfo(string $imagePath): array
    {
        $info = [
            'filename' => basename($imagePath),
            'filesize' => filesize($imagePath),
            'filetype' => mime_content_type($imagePath),
            'dimensions' => 'unknown'
        ];
        
        // Try to get image dimensions if possible without GD
        $imageSize = @getimagesize($imagePath);
        if ($imageSize) {
            $info['dimensions'] = $imageSize[0] . 'x' . $imageSize[1];
            $info['width'] = $imageSize[0];
            $info['height'] = $imageSize[1];
        }
        
        return $info;
    }
    
    /**
     * Extract keywords from the image filename
     * 
     * @param string $imagePath Path to the image
     * @return array Keywords extracted from filename
     */
    private function extractKeywordsFromFilename(string $imagePath): array
    {
        $filename = pathinfo($imagePath, PATHINFO_FILENAME);
        
        // Remove numbers and special characters
        $cleanName = preg_replace('/[^a-zA-Z\s]/', ' ', $filename);
        
        // Convert to lowercase
        $cleanName = strtolower($cleanName);
        
        // Split into words
        $words = preg_split('/\s+/', $cleanName, -1, PREG_SPLIT_NO_EMPTY);
        
        // Filter out short words and common words
        $words = array_filter($words, function($word) {
            $commonWords = ['the', 'and', 'for', 'img', 'image', 'photo', 'pic', 'picture'];
            return strlen($word) >= 3 && !in_array($word, $commonWords);
        });
        
        return array_values($words); // Reset array keys
    }
    
    /**
     * Determine likely categories based on keywords
     * 
     * @param array $keywords Keywords to analyze
     * @return array Categories with their confidence scores
     */
    private function determineLikelyCategories(array $keywords): array
    {
        $categoryScores = [];
        
        foreach ($this->categories as $category => $categoryKeywords) {
            $score = 0;
            
            foreach ($keywords as $keyword) {
                // Direct match with category name
                if ($keyword === $category) {
                    $score += 1.0;
                    continue;
                }
                
                // Check if keyword is in category keywords
                if (in_array($keyword, $categoryKeywords)) {
                    $score += 0.8;
                    continue;
                }
                
                // Check for partial matches
                foreach ($categoryKeywords as $categoryKeyword) {
                    if (strpos($keyword, $categoryKeyword) !== false || 
                        strpos($categoryKeyword, $keyword) !== false) {
                        $score += 0.5;
                        break;
                    }
                }
            }
            
            if ($score > 0) {
                $categoryScores[$category] = min(1.0, $score / count($keywords));
            }
        }
        
        // If no categories were found, add a default one
        if (empty($categoryScores)) {
            $categoryScores['sports'] = 0.5; // Default to sports with medium confidence
        }
        
        // Sort by score (highest first)
        arsort($categoryScores);
        
        return $categoryScores;
    }
    
    /**
     * Create labels from keywords and categories
     * 
     * @param array $keywords Extracted keywords
     * @param array $categories Likely categories with scores
     * @return array Labels with confidence scores
     */
    private function createLabels(array $keywords, array $categories): array
    {
        $labels = [];
        
        // Add keywords as labels
        foreach ($keywords as $keyword) {
            $labels[] = [
                'description' => $keyword,
                'score' => 0.9 // High confidence for keywords from filename
            ];
        }
        
        // Add categories as labels
        foreach ($categories as $category => $score) {
            $labels[] = [
                'description' => $category,
                'score' => $score
            ];
            
            // Add some related terms from the category
            $categoryKeywords = $this->categories[$category];
            $selectedKeywords = array_slice($categoryKeywords, 0, 3);
            
            foreach ($selectedKeywords as $keyword) {
                // Only add if not already present
                $exists = false;
                foreach ($labels as $label) {
                    if ($label['description'] === $keyword) {
                        $exists = true;
                        break;
                    }
                }
                
                if (!$exists) {
                    $labels[] = [
                        'description' => $keyword,
                        'score' => $score * 0.8 // Slightly lower confidence
                    ];
                }
            }
        }
        
        // Sort by score (highest first)
        usort($labels, function($a, $b) {
            return $b['score'] <=> $a['score'];
        });
        
        // Limit to top 10 labels
        return array_slice($labels, 0, 10);
    }
    
    /**
     * Simulate color analysis without using GD
     * 
     * @param string $imagePath Path to the image
     * @return array Simulated color analysis
     */
    private function simulateColorAnalysis(string $imagePath): array
    {
        // Use file hash to generate pseudo-random but consistent colors for the same image
        $fileHash = md5_file($imagePath);
        $hashParts = str_split($fileHash, 8);
        
        $simulatedColors = [];
        $colorNames = array_keys($this->colors);
        
        // Use parts of the hash to select colors and their proportions
        for ($i = 0; $i < min(3, count($hashParts)); $i++) {
            $hashValue = hexdec($hashParts[$i]);
            $colorIndex = $hashValue % count($colorNames);
            $colorName = $colorNames[$colorIndex];
            $rgb = $this->colors[$colorName];
            
            // Slightly randomize the RGB values
            $rgb[0] = min(255, max(0, $rgb[0] + (($hashValue >> 8) % 30) - 15));
            $rgb[1] = min(255, max(0, $rgb[1] + (($hashValue >> 16) % 30) - 15));
            $rgb[2] = min(255, max(0, $rgb[2] + (($hashValue >> 24) % 30) - 15));
            
            $simulatedColors[] = [
                'red' => $rgb[0],
                'green' => $rgb[1],
                'blue' => $rgb[2],
                'score' => 1.0 - ($i * 0.2), // Decreasing confidence for each color
                'pixelFraction' => 0.5 - ($i * 0.15) // Decreasing fraction for each color
            ];
        }
        
        return $simulatedColors;
    }
    
    /**
     * Find products similar to the analyzed image
     * 
     * @param array $imageAnalysis Analysis results
     * @param array $allProducts All products to search through
     * @return array Products sorted by similarity
     */
    public function findSimilarProducts(array $imageAnalysis, array $allProducts): array
    {
        // If there was an error in analysis, return a subset of products
        if (isset($imageAnalysis['error'])) {
            shuffle($allProducts);
            return array_slice($allProducts, 0, min(6, count($allProducts)));
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
        
        // Limit to top 6 products (or fewer if there aren't enough)
        $limitedProducts = array_slice($scoredProducts, 0, min(6, count($scoredProducts)));
        
        // Return just the products in order of similarity
        return array_map(function ($item) {
            return $item['product'];
        }, $limitedProducts);
    }
    
    /**
     * Calculate similarity score between image analysis and a product
     * 
     * @param array $imageAnalysis Analysis results
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
                
                // Check if label exactly matches category
                if ($productCategory === $labelText) {
                    $score += 40 * $confidence;
                }
            }
        }
        
        // Add some randomness (±5 points)
        $score += mt_rand(-5, 5);
        
        // Cap the score at 100
        return min(100, $score);
    }
}
