<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class AppExtension extends AbstractExtension
{
    private $urlGenerator;

    public function __construct(UrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('team_logo', [$this, 'getTeamLogoPath']),
        ];
    }

    public function getTeamLogoPath(?string $logoPath): string
    {
        if (empty($logoPath)) {
            return '/assets/images/team-2.jpg'; // Default image if no logo is set
        }

        // Extract filename from the path
        $filename = basename($logoPath);
        
        // Generate URL using the route
        return $this->urlGenerator->generate('app_image', ['filename' => $filename]);
    }
} 