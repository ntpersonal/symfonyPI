<?php

namespace App\Service;

class ProductDescriptionGenerator
{
    private $categories = [
        'tournement' => [
            'keywords' => ['competition', 'tournament', 'championship', 'match', 'event', 'sports'],
            'templates' => [
                'This premium tournament {item} is designed for serious competitors who demand excellence. Perfect for official competitions and professional events, it features {feature1} and {feature2} to enhance your performance.',
                'Elevate your tournament experience with this high-quality {item}. Specially crafted for championship-level play, it offers {feature1} and {feature2} that serious athletes appreciate.',
                'Official tournament-grade {item} that meets all competition standards. With its {feature1} and {feature2}, it is the preferred choice for professional events worldwide.'
            ]
        ],
        'clothes' => [
            'keywords' => ['jersey', 'uniform', 'apparel', 'wear', 'outfit', 'gear'],
            'templates' => [
                'This premium sports {item} combines style and performance. Made with {feature1} and designed with {feature2}, it provides comfort and durability for athletes at all levels.',
                'Elevate your game with this professional-grade {item}. Featuring {feature1} and {feature2}, it is designed to enhance performance while keeping you comfortable throughout the match.',
                'Stand out on the field with this high-quality {item}. Its {feature1} and {feature2} make it perfect for both practice sessions and official matches.'
            ]
        ],
        'trophies' => [
            'keywords' => ['award', 'medal', 'recognition', 'prize', 'achievement', 'honor'],
            'templates' => [
                'Celebrate excellence with this prestigious {item}. Featuring {feature1} and {feature2}, it is the perfect way to recognize achievements.',
                'This elegant {item} symbolizes success and achievement. Crafted with {feature1} and {feature2}, it makes a lasting impression.',
                'Honor champions with this exceptional {item}. Its {feature1} and {feature2} reflect the prestige of victory.'
            ]
        ],
        'default' => [
            'keywords' => ['sports', 'quality', 'performance', 'professional', 'premium'],
            'templates' => [
                'This high-quality {item} is designed for optimal performance. With its {feature1} and {feature2}, it is a must-have for any serious sports enthusiast.',
                'Enhance your sporting experience with this premium {item}. Featuring {feature1} and {feature2}, it delivers reliability and performance when you need it most.',
                'Professional-grade {item} built to last. Its {feature1} and {feature2} make it stand out from standard alternatives on the market.'
            ]
        ]
    ];
    
    private $features = [
        'tournement' => [
            'official certification', 'regulation dimensions', 'premium materials', 'enhanced durability',
            'professional-grade construction', 'tournament-tested design', 'competition-ready features',
            'precision engineering', 'advanced technology', 'superior craftsmanship'
        ],
        'clothes' => [
            'moisture-wicking fabric', 'breathable material', 'ergonomic design', 'flexible construction',
            'lightweight comfort', 'durable stitching', 'quick-dry technology', 'UV protection',
            'antimicrobial treatment', 'strategic ventilation', 'four-way stretch'
        ],
        'trophies' => [
            'premium finish', 'elegant design', 'customizable elements', 'solid construction',
            'attention to detail', 'premium materials', 'timeless styling', 'impressive presence',
            'precision engraving', 'handcrafted details'
        ],
        'default' => [
            'premium quality', 'durable construction', 'professional design', 'high-performance features',
            'superior materials', 'ergonomic elements', 'enhanced functionality', 'precision engineering',
            'innovative technology', 'reliable performance'
        ]
    ];
    
    /**
     * Generate a product description based on product name and category
     * 
     * @param string $productName The name of the product
     * @param string $category The category of the product
     * @return string Generated description
     */
    public function generateDescription(string $productName, string $category = null): string
    {
        // Normalize category
        $category = strtolower($category ?? '');
        
        // If category is not recognized, use default
        if (!isset($this->categories[$category])) {
            $category = 'default';
        }
        
        // Extract the item type from the product name
        $itemType = $this->extractItemType($productName, $category);
        
        // Select a random template
        $templates = $this->categories[$category]['templates'];
        $template = $templates[array_rand($templates)];
        
        // Select random features
        $categoryFeatures = $this->features[$category];
        shuffle($categoryFeatures);
        $feature1 = $categoryFeatures[0];
        $feature2 = $categoryFeatures[1];
        
        // Replace placeholders in the template
        $description = str_replace(
            ['{item}', '{feature1}', '{feature2}'],
            [$itemType, $feature1, $feature2],
            $template
        );
        
        // Add a second paragraph with more details
        $description .= "\n\n" . $this->generateSecondParagraph($productName, $category, $itemType);
        
        return $description;
    }
    
    /**
     * Extract the item type from the product name
     * 
     * @param string $productName The name of the product
     * @param string $category The category of the product
     * @return string The extracted item type
     */
    private function extractItemType(string $productName, string $category): string
    {
        // List of common item types by category
        $itemTypes = [
            'tournement' => ['ball', 'equipment', 'set', 'kit', 'package', 'gear'],
            'clothes' => ['jersey', 'uniform', 'shirt', 'shorts', 'socks', 'outfit', 'apparel'],
            'trophies' => ['trophy', 'medal', 'award', 'cup', 'plaque', 'recognition'],
            'default' => ['item', 'product', 'equipment', 'gear']
        ];
        
        // Convert product name to lowercase for easier matching
        $lowercaseName = strtolower($productName);
        
        // Try to find a match in the product name
        foreach ($itemTypes[$category] as $type) {
            if (strpos($lowercaseName, $type) !== false) {
                return $type;
            }
        }
        
        // If no match is found, use a default based on category
        $defaults = [
            'tournement' => 'equipment',
            'clothes' => 'apparel',
            'trophies' => 'trophy',
            'default' => 'product'
        ];
        
        return $defaults[$category];
    }
    
    /**
     * Generate a second paragraph with additional details
     * 
     * @param string $productName The name of the product
     * @param string $category The category of the product
     * @param string $itemType The type of item
     * @return string The generated paragraph
     */
    private function generateSecondParagraph(string $productName, string $category, string $itemType): string
    {
        $paragraphs = [
            'tournement' => [
                "Designed with athletes in mind, this {$itemType} provides the reliability and performance needed for competitive play. Whether you are training for the next big tournament or competing at the highest level, it delivers consistent results every time.",
                "This {$itemType} has been tested and approved by professional athletes, ensuring it meets the highest standards of performance and durability. It is an essential addition to any serious competitor equipment collection.",
                "Backed by our quality guarantee, this tournament-grade {$itemType} is built to withstand the rigors of competitive play. Invest in your performance with equipment that professionals trust."
            ],
            'clothes' => [
                "This {$itemType} is designed to move with you, providing unrestricted motion and all-day comfort. The premium materials ensure it will maintain its shape and appearance wash after wash.",
                "Perfect for both practice and game day, this {$itemType} combines style and functionality. The attention to detail in its construction ensures it will remain a favorite in your athletic wardrobe for seasons to come.",
                "Experience the difference quality makes with this premium {$itemType}. It is designed to help you perform at your best while keeping you comfortable in any conditions."
            ],
            'trophies' => [
                "This {$itemType} makes a powerful statement about achievement and excellence. It is carefully crafted to be a lasting symbol of success that will be displayed with pride for years to come.",
                "Celebrate outstanding performance with this distinguished {$itemType}. Its quality construction and impressive design make it a fitting tribute to exceptional achievement.",
                "Make recognition memorable with this exceptional {$itemType}. It is more than just an award, it is a lasting reminder of dedication, hard work, and success."
            ],
            'default' => [
                "Quality is evident in every aspect of this {$itemType}, from its thoughtful design to its superior construction. It is built to deliver reliable performance season after season.",
                "This {$itemType} represents the perfect balance of quality, performance, and value. It is designed to exceed expectations and enhance your sporting experience.",
                "Invest in your passion with this premium {$itemType}. Its thoughtful design and quality construction make it a standout choice for discerning sports enthusiasts."
            ]
        ];
        
        $categoryParagraphs = $paragraphs[$category];
        return $categoryParagraphs[array_rand($categoryParagraphs)];
    }
}
