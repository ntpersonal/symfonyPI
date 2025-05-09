<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

final class RedirectController extends AbstractController
{
    public function __construct(
        private UrlGeneratorInterface $urlGenerator
    ) {
    }

    public function redirectAction(Request $request, string $route, bool $permanent = false, bool $ignoreAttributes = false, array $statusCode = []): RedirectResponse
    {
        $parameters = $ignoreAttributes ? [] : $request->attributes->all();
        $referenceType = $permanent ? UrlGeneratorInterface::ABSOLUTE_URL : UrlGeneratorInterface::ABSOLUTE_PATH;
        $url = $this->urlGenerator->generate($route, $parameters, $referenceType);
        return new RedirectResponse($url, $statusCode['code'] ?? ($permanent ? 301 : 302));
    }

    public function urlRedirectAction(Request $request, string $path, bool $permanent = false, string $scheme = null, int $httpPort = null, int $httpsPort = null, bool $keepRequestMethod = false): RedirectResponse
    {
        $url = $this->urlGenerator->generate($path, [], UrlGeneratorInterface::ABSOLUTE_URL);
        $statusCode = $permanent ? 301 : 302;
        return new RedirectResponse($url, $statusCode);
    }

    public function redirectRouteAction(Request $request, bool $permanent = false, string $route = null, bool $ignoreAttributes = false): RedirectResponse
    {
        if (!$route) {
            $route = $request->attributes->get('_route');
        }
        return $this->redirectAction($request, $route, $permanent, $ignoreAttributes);
    }
}
