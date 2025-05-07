<?php

namespace App\Service;

use App\Entity\Reclamation;
use App\Entity\Answer;
use App\Entity\User;
use App\Entity\Order;
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
    private $pdfService;
    private $senderEmail;
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
        PdfService $pdfService,
        LoggerInterface $logger = null,
        string $senderEmail = 'noreply@sportify.com'
    ) {
        $this->mailer = $mailer;
        $this->pdfService = $pdfService;
        $this->senderEmail = $senderEmail;
        $this->router = $router;
        $this->twig = $twig;
        $this->params = $params;
        $this->security = $security;
        $this->logger = $logger;
    }

    /**
     * Send order confirmation email
     */
    public function sendOrderConfirmation(Order $order, ?string $customEmail = null): void
    {
        $emailAddress = $customEmail ?: 'customer@example.com';

        if (!$emailAddress) {
            return;
        }

        try {
            $pdfContent = $this->pdfService->generateInvoicePdf($order);

            $emailMessage = (new Email())
                ->from($this->senderEmail)
                ->to($emailAddress)
                ->subject('Sportify - Order Confirmation #' . $order->getId())
                ->html($this->getOrderConfirmationHtml($order))
                ->attach($pdfContent, 'invoice-' . $order->getId() . '.pdf', 'application/pdf');

            $this->mailer->send($emailMessage);

            $this->logEmailToFile($emailMessage, $order->getId());

            if ($this->logger) {
                $this->logger->info('Order confirmation email sent to: ' . $emailAddress);
            }
        } catch (\Exception $e) {
            if ($this->logger) {
                $this->logger->error('Error sending order confirmation: ' . $e->getMessage());
            }
            $this->logEmailError($order->getId(), $e->getMessage());
        }
    }

    /**
     * Send reclamation confirmation email
     */
    public function sendReclamationConfirmation(Reclamation $reclamation): void
    {
        try {
            $connectedUser = $this->security->getUser();
            $userFromReclamation = $reclamation->getUser();

            $user = ($connectedUser && $connectedUser->getUserIdentifier() === $userFromReclamation->getEmail())
                ? $connectedUser
                : $userFromReclamation;

            if (!$user) {
                if ($this->logger) {
                    $this->logger->error('No user associated with reclamation #' . $reclamation->getId());
                }
                return;
            }

            $userEmail = $user->getEmail();
            if (!$userEmail) {
                if ($this->logger) {
                    $this->logger->error('User #' . $user->getId() . ' has no email');
                }
                return;
            }

            if ($this->logger) {
                $this->logger->info('Sending reclamation confirmation to: ' . $userEmail);
            }

            $url = $this->router->generate('reclamation_show2', [
                'id' => $reclamation->getId()
            ], UrlGeneratorInterface::ABSOLUTE_URL);

            $context = [
                'reclamation' => $reclamation,
                'user' => $user,
                'url' => $url
            ];

            $email = (new TemplatedEmail())
                ->from('sportius.noreply@gmail.com')
                ->to($userEmail)
                ->subject('Confirmation de votre réclamation #' . $reclamation->getId())
                ->htmlTemplate('emails/reclamation_confirmation.html.twig')
                ->context($context);

            $this->mailer->send($email);

            if ($this->logger) {
                $this->logger->info('Reclamation confirmation email sent to: ' . $userEmail);
            }
        } catch (\Exception $e) {
            if ($this->logger) {
                $this->logger->error('Error sending reclamation confirmation: ' . $e->getMessage());
            }
        }
    }

    /**
     * Log email content to a file
     */
    private function logEmailToFile(Email $email, $orderId): void
    {
        $logDir = __DIR__ . '/../../var/log/emails';
        if (!is_dir($logDir)) {
            mkdir($logDir, 0777, true);
        }

        $timestamp = date('Y-m-d_H-i-s');
        $filename = $logDir . '/email_' . $orderId . '_' . $timestamp . '.html';

        $toAddresses = array_map(fn($a) => $a->getAddress(), $email->getTo());
        $fromAddresses = array_map(fn($a) => $a->getAddress(), $email->getFrom());

        $content = "To: " . implode(', ', $toAddresses) . "\n";
        $content .= "From: " . implode(', ', $fromAddresses) . "\n";
        $content .= "Subject: " . $email->getSubject() . "\n";
        $content .= "Date: " . date('Y-m-d H:i:s') . "\n\n";
        $content .= "HTML Content:\n" . $email->getHtmlBody() . "\n";

        file_put_contents($filename, $content);
    }

    /**
     * Log email errors to file
     */
    private function logEmailError($orderId, string $errorMessage): void
    {
        $logDir = __DIR__ . '/../../var/log';
        if (!is_dir($logDir)) {
            mkdir($logDir, 0777, true);
        }

        file_put_contents(
            $logDir . '/email_errors.log',
            date('Y-m-d H:i:s') . ' - Error sending email for order #' . $orderId . ': ' . $errorMessage . "\n",
            FILE_APPEND
        );
    }

    private function getOrderConfirmationHtml(Order $order): string
    {
        $product = $order->getProduct();
        $productName = $product ? $product->getNameproduct() : 'Unknown Product';

        return "
            <html>
            <head>
                <style>
                    body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                    .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                    .header { background-color: #0ea5e9; color: white; padding: 15px; text-align: center; }
                    .content { padding: 20px; border: 1px solid #ddd; }
                    .footer { text-align: center; margin-top: 20px; font-size: 12px; color: #777; }
                    .order-details { margin: 20px 0; }
                    .order-details table { width: 100%; border-collapse: collapse; }
                    .order-details th, .order-details td { padding: 10px; border-bottom: 1px solid #ddd; text-align: left; }
                    .total { font-weight: bold; text-align: right; margin-top: 20px; }
                </style>
            </head>
            <body>
                <div class='container'>
                    <div class='header'>
                        <h1>Order Confirmation</h1>
                    </div>
                    <div class='content'>
                        <p>Dear Customer,</p>
                        <p>Thank you for your order! We're pleased to confirm that your order has been received and is being processed.</p>
                        
                        <div class='order-details'>
                            <h3>Order Details:</h3>
                            <p><strong>Order Number:</strong> #" . $order->getId() . "</p>
                            <p><strong>Order Date:</strong> " . $order->getDate()->format('Y-m-d H:i') . "</p>
                            
                            <table>
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>" . $productName . "</td>
                                        <td>" . $order->getQuantityOrder() . "</td>
                                        <td>$" . ($product ? number_format($product->getPriceproduct(), 2) : '0.00') . "</td>
                                        <td>$" . number_format($order->getTotalAmount(), 2) . "</td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            <div class='total'>
                                <p>Total: $" . number_format($order->getTotalAmount(), 2) . "</p>
                            </div>
                        </div>
                        
                        <p>A detailed invoice is attached to this email as a PDF.</p>
                        <p>If you have any questions about your order, please contact our customer service team.</p>
                        
                        <p>Thank you for shopping with Sportify!</p>
                    </div>
                    <div class='footer'>
                        <p>&copy; " . date('Y') . " Sportify. All rights reserved.</p>
                    </div>
                </div>
            </body>
            </html>
        ";
    }


    public function sendAnswerNotification(Answer $answer): void
    {
        try {
            $reclamation = $answer->getReclamation();
            $user = $reclamation->getUser();

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
                $this->logger->info('Tentative d\'envoi d\'email de notification de réponse à: ' . $userEmail);
            }

            // Générer l'URL absolue pour voir la réclamation et sa réponse
            $url = $this->router->generate('reclamation_show2', [
                'id' => $reclamation->getId()
            ], UrlGeneratorInterface::ABSOLUTE_URL);

            // Préparer les données pour le template
            $context = [
                'reclamation' => $reclamation,
                'answer' => $answer,
                'user' => $user,
                'url' => $url
            ];

            // Créer l'email
            $email = (new TemplatedEmail())
                ->from('sportius.noreply@gmail.com')
                ->to($userEmail)
                ->subject('Nouvelle réponse à votre réclamation #' . $reclamation->getId())
                ->htmlTemplate('emails/answer_notification.html.twig')
                ->context($context);

            // Envoyer l'email
            $this->mailer->send($email);

            // Journaliser le succès
            if ($this->logger) {
                $this->logger->info('Email de notification de réponse envoyé avec succès à: ' . $userEmail);
            }
        } catch (\Exception $e) {
            // Log l'erreur mais ne bloque pas le processus
            error_log('Erreur lors de l\'envoi de l\'email de notification: ' . $e->getMessage());
            if ($this->logger) {
                $this->logger->error('Erreur lors de l\'envoi de l\'email de notification: ' . $e->getMessage(), [
                    'exception' => $e,
                    'trace' => $e->getTraceAsString()
                ]);
            }
        }
    }



}
