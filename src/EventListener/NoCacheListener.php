<?php
namespace App\EventListener;

use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\Security\Core\Security;

class NoCacheListener
{
    private $security;
    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public function onKernelResponse(ResponseEvent $event)
    {
        // Only for master requests and authenticated users
        if (!$event->isMainRequest() || !$this->security->getUser()) {
            return;
        }

        $response = $event->getResponse();
        $response->headers->set('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expires', '0');
    }
} 