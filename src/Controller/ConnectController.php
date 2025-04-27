<?php

// src/Controller/ConnectController.php
namespace App\Controller;

use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

class ConnectController extends AbstractController
{
    #[Route('/connect/google', name: 'connect_google_start')]
    public function connectGoogle(ClientRegistry $clientRegistry): RedirectResponse
    {
        $scopes = [
            'openid',
            'email',
            'profile',
            'https://www.googleapis.com/auth/user.birthday.read'
        ];
        
        return $clientRegistry->getClient('google')->redirect($scopes, []);
    }

    #[Route('/connect/google/check', name: 'connect_google_check')]
    public function connectCheck(): void
    {
        // Symfony will handle this route automatically
    }
}
