<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class ImaggaImageService
{
    private const IMAGGA_API_KEY = 'acc_c4e42d40aec3bea';
    private const IMAGGA_API_SECRET = 'acc_c4e42d40aec3bea';
    
    public function __construct(
        private HttpClientInterface $httpClient
    ) {}

    public function analyzeImage(string $imagePath): array
    {
        if (!file_exists($imagePath)) {
            return ['error' => 'Image file not found: ' . $imagePath];
        }

        $apiKey = self::IMAGGA_API_KEY;
        $apiSecret = self::IMAGGA_API_SECRET;

        try {
            // Upload image to Imagga
            $uploadResponse = $this->httpClient->request(
                'POST',
                'https://api.imagga.com/v2/uploads',
                [
                    'auth_basic' => [$apiKey, $apiSecret],
                    'body' => ['image' => fopen($imagePath, 'r')]
                ]
            );
            
            $uploadData = $uploadResponse->toArray();
            
            if (!isset($uploadData['result']['upload_id'])) {
                return ['error' => 'Failed to upload image to Imagga API'];
            }
            
            $uploadId = $uploadData['result']['upload_id'];

            // Get tags for the uploaded image
            $tagsResponse = $this->httpClient->request(
                'GET',
                'https://api.imagga.com/v2/tags',
                [
                    'auth_basic' => [$apiKey, $apiSecret],
                    'query' => ['image_upload_id' => $uploadId]
                ]
            );

            $tagsData = $tagsResponse->toArray();
            
            if (!isset($tagsData['result']['tags']) || empty($tagsData['result']['tags'])) {
                return ['error' => 'No tags returned from Imagga API'];
            }
            
            $tags = [];
            foreach ($tagsData['result']['tags'] as $tag) {
                $tags[] = [
                    'name' => $tag['tag']['en'],
                    'confidence' => $tag['confidence']
                ];
            }
            
            // Extract top tags for description
            $topTags = array_slice(array_column($tags, 'name'), 0, 5);
            
            // Generate a more natural description
            $description = $this->generateDescription($topTags);
            
            return [
                'description' => $description,
                'tags' => $tags
            ];

        } catch (\Exception $e) {
            return ['error' => 'Imagga API error: ' . $e->getMessage()];
        }
    }
    
    /**
     * Check if any of the tags belong to a specific category
     * 
     * @param array $tags Array of tags to check
     * @param array $categoryTags Array of category-related keywords
     * @return bool True if any tag matches the category
     */
    private function hasTagsInCategory(array $tags, array $categoryTags): bool
    {
        foreach ($tags as $tag) {
            foreach ($categoryTags as $categoryTag) {
                if (stripos($tag, $categoryTag) !== false) {
                    return true;
                }
            }
        }
        return false;
    }
    
    private function generateDescription(array $tags): string
    {
        if (empty($tags)) {
            return 'This is a high-quality sports product with excellent features.';
        }
        
        // Filter out generic tags that don't add value
        $specificTags = array_filter($tags, function($tag) {
            $genericTags = ['product', 'item', 'object', 'thing', 'merchandise', 'goods', 'article'];
            return !in_array(strtolower($tag), $genericTags);
        });
        
        // If we have no specific tags after filtering, use original tags
        if (empty($specificTags)) {
            $specificTags = $tags;
        }
        
        // Create more specific templates based on common product categories
        $templates = [];
        
        // Check for clothing-related tags
        if ($this->hasTagsInCategory($specificTags, ['sock', 'socks', 'clothing', 'apparel', 'wear', 'fabric', 'textile'])) {
            $templates[] = 'These premium sports socks feature %s, providing comfort and support during intense activities.';
            $templates[] = 'Designed with %s, these high-quality athletic socks offer exceptional comfort and durability for sports enthusiasts.';
            $templates[] = 'Enhance your athletic performance with these specialized sports socks showcasing %s, perfect for training and competition.';
        }
        
        // Check for ball-related tags
        if ($this->hasTagsInCategory($specificTags, ['ball', 'balls', 'football', 'soccer', 'basketball', 'volleyball', 'tennis'])) {
            $templates[] = 'This professional-grade sports ball features %s, ensuring optimal performance during gameplay.';
            $templates[] = 'Elevate your game with this tournament-quality ball that includes %s, designed for serious athletes.';
            $templates[] = 'Experience consistent play with this competition-level ball showcasing %s, perfect for official matches and training.';
        }
        
        // Check for equipment-related tags
        if ($this->hasTagsInCategory($specificTags, ['equipment', 'gear', 'accessory', 'accessories', 'tool', 'device'])) {
            $templates[] = 'This essential sports equipment features %s, helping athletes achieve their best performance.';
            $templates[] = 'Enhance your training routine with this professional-grade equipment that includes %s, designed for serious athletes.';
            $templates[] = 'Take your athletic performance to the next level with this high-quality gear showcasing %s, perfect for competitive sports.';
        }
        
        // If no specific category was matched, use generic templates
        if (empty($templates)) {
            $templates = [
                'This premium sports product features %s. Perfect for athletes who value quality and performance.',
                'Designed with %s, this high-quality sports item offers exceptional performance for athletes of all levels.',
                'Experience the difference with this professional-grade product showcasing %s, ideal for serious competitors.',
                'Elevate your game with this top-tier product that includes %s, designed for optimal athletic performance.',
                'This tournament-ready product highlights %s, making it the perfect choice for dedicated sports enthusiasts.'
            ];
        }
        
        $template = $templates[array_rand($templates)];
        $tagsList = implode(', ', $specificTags);
        
        return sprintf($template, $tagsList);
    }
}