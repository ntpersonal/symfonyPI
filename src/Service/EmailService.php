<?php

namespace App\Service;

use App\Entity\Reclamation;
use App\Entity\User;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Twig\Environment;
use Psr\Log\LoggerInterface;
use Symfony\Component\Security\Core\Security;

class EmailService
{
    private $mailer;
    private $router;
    private $twig;
    private $params;
    private $logger;
    private $security;

    public function __construct(
        MailerInterface $mailer, 
        UrlGeneratorInterface $router, 
        Environment $twig,
        ParameterBagInterface $params,
        Security $security,
        LoggerInterface $logger = null
    ) {
        $this->mailer = $mailer;
        $this->router = $router;
        $this->twig = $twig;
        $this->params = $params;
        $this->security = $security;
        $this->logger = $logger;
    }

    /**
     * Envoie un email de confirmation après la création d'une réclamation
     */
    public function sendReclamationConfirmation(Reclamation $reclamation): void
    {
        try {
            // Priorité 1: Obtenir l'utilisateur directement connecté
            $connectedUser = $this->security->getUser();
            
            // Priorité 2: Utiliser l'utilisateur associé à la réclamation
            $userFromReclamation = $reclamation->getUser();
            
            // Priorité 3: Si les deux correspondent, utiliser l'utilisateur connecté
            $user = $connectedUser && $connectedUser->getUserIdentifier() === $userFromReclamation->getEmail() 
                ? $connectedUser 
                : $userFromReclamation;
            
            if (!$user) {
                if ($this->logger) {
                    $this->logger->error('Aucun utilisateur associé à la réclamation #' . $reclamation->getId());
                }
                return;
            }
            
            $userEmail = $user->getEmail();
            
            if (!$userEmail) {
                if ($this->logger) {
                    $this->logger->error('L\'utilisateur #' . $user->getId() . ' n\'a pas d\'email');
                }
                return;
            }

            // Journaliser l'email utilisé
            if ($this->logger) {
                $this->logger->info('Tentative d\'envoi d\'email à: ' . $userEmail);
            }
            
            // Générer l'URL absolue pour la réclamation
            $url = $this->router->generate('reclamation_show2', [
                'id' => $reclamation->getId()
            ], UrlGeneratorInterface::ABSOLUTE_URL);
            
            // Préparer les données pour le template
            $context = [
                'reclamation' => $reclamation,
                'user' => $user,
                'url' => $url
            ];
            
            // Créer l'email
            $email = (new TemplatedEmail())
                ->from('sportius.noreply@gmail.com')
                ->to($userEmail)  // Utiliser explicitement l'email de l'utilisateur
                ->subject('Confirmation de votre réclamation #' . $reclamation->getId())
                ->htmlTemplate('emails/reclamation_confirmation.html.twig')
                ->context($context);
            
            // Envoyer l'email
            $this->mailer->send($email);
            
            // Journaliser le succès
            if ($this->logger) {
                $this->logger->info('Email envoyé avec succès à: ' . $userEmail);
            }
        } catch (\Exception $e) {
            // Log l'erreur mais ne bloque pas le processus
            error_log('Erreur lors de l\'envoi de l\'email: ' . $e->getMessage());
            if ($this->logger) {
                $this->logger->error('Erreur lors de l\'envoi de l\'email: ' . $e->getMessage(), [
                    'exception' => $e,
                    'trace' => $e->getTraceAsString()
                ]);
            }
        }
    }
} 