<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Mercure\HubInterface;
class MercureExtension extends AbstractExtension
{
   
    public function __construct(
        private HubInterface $hub
    ) {}

    public function getFunctions(): array
    {
        return [
            new TwigFunction('mercure_subscribe_url', [$this, 'getSubscribeUrl']),
        ];
    }

    public function getSubscribeUrl(string $topic): string
    {
        return $this->hub->getPublicUrl() . '?topic=' . urlencode($topic);
    }
} 