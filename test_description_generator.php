<?php

require_once __DIR__.'/vendor/autoload.php';

use App\Service\ProductDescriptionGenerator;

// Create an instance of the service
$generator = new ProductDescriptionGenerator();

// Test the service with a sample product
$productName = 'Tournament Basketball';
$category = 'tournement';

// Generate a description
$description = $generator->generateDescription($productName, $category);

// Output the result
echo "Product: {$productName}\n";
echo "Category: {$category}\n";
echo "\nGenerated Description:\n";
echo "==================\n";
echo $description;
echo "\n\n";

// Test with another category
$productName = 'Sports Jersey';
$category = 'clothes';

// Generate a description
$description = $generator->generateDescription($productName, $category);

// Output the result
echo "Product: {$productName}\n";
echo "Category: {$category}\n";
echo "\nGenerated Description:\n";
echo "==================\n";
echo $description;
echo "\n";
