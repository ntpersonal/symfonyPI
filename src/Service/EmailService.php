<?php

namespace App\Service;

use App\Entity\Order;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Part\DataPart;
use Symfony\Component\Mime\Part\File;

class EmailService
{
    private $mailer;
    private $pdfService;
    private $senderEmail;
    
    public function __construct(MailerInterface $mailer, PdfService $pdfService, string $senderEmail = 'noreply@sportify.com')
    {
        $this->mailer = $mailer;
        $this->pdfService = $pdfService;
        $this->senderEmail = $senderEmail;
    }
    
    public function sendOrderConfirmation(Order $order, ?string $customEmail = null): void
    {
        $email = $customEmail;
        if (!$email) {
            $email = 'customer@example.com'; // fallback if not provided
        }
        if (!$email) {
            return;
        }
        // Generate PDF invoice
        $pdfContent = $this->pdfService->generateInvoicePdf($order);
        
        // Create email
        $emailMessage = (new Email())
            ->from($this->senderEmail)
            ->to($email) // Use the custom or user email
            ->subject('Sportify - Order Confirmation #' . $order->getId())
            ->html($this->getOrderConfirmationHtml($order))
            ->attach($pdfContent, 'invoice-' . $order->getId() . '.pdf', 'application/pdf');
        
        try {
            // Send email
            $this->mailer->send($emailMessage);
            
            // Also log the email to a file for debugging
            $this->logEmailToFile($emailMessage, $order->getId());
        } catch (\Exception $e) {
            // Create log directory if it doesn't exist
            $logDir = __DIR__ . '/../../var/log';
            if (!is_dir($logDir)) {
                mkdir($logDir, 0777, true);
            }
            
            // Log the error
            file_put_contents(
                $logDir . '/email_errors.log',
                date('Y-m-d H:i:s') . ' - Error sending email for order #' . $order->getId() . ': ' . $e->getMessage() . "\n",
                FILE_APPEND
            );
        }
    }
    
    /**
     * Log email content to a file for debugging purposes
     */
    private function logEmailToFile(Email $email, $orderId): void
    {
        $logDir = __DIR__ . '/../../var/log/emails';
        if (!is_dir($logDir)) {
            mkdir($logDir, 0777, true);
        }
        
        $timestamp = date('Y-m-d_H-i-s');
        $filename = $logDir . '/email_' . $orderId . '_' . $timestamp . '.html';
        
        // Convert Address objects to strings
        $toAddresses = [];
        foreach ($email->getTo() as $address) {
            $toAddresses[] = $address->getAddress();
        }
        
        $fromAddresses = [];
        foreach ($email->getFrom() as $address) {
            $fromAddresses[] = $address->getAddress();
        }
        
        $content = "To: " . implode(', ', $toAddresses) . "\n";
        $content .= "From: " . implode(', ', $fromAddresses) . "\n";
        $content .= "Subject: " . $email->getSubject() . "\n";
        $content .= "Date: " . date('Y-m-d H:i:s') . "\n\n";
        $content .= "HTML Content:\n" . $email->getHtmlBody() . "\n";
        
        file_put_contents($filename, $content);
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
}
