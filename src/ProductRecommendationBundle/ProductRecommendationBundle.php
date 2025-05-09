<?php

namespace App\ProductRecommendationBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ProductRecommendationBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__).'/ProductRecommendationBundle';
    }
}
