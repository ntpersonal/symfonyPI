<?php

namespace App\Service;

use App\Entity\Order;
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class PdfService
{
    private $twig;
    
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }
    
    public function generateInvoicePdf(Order $order): string
    {
        // Configure Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        
        // Instantiate Dompdf
        $dompdf = new Dompdf($options);
        
        // Render the invoice template
        $html = $this->twig->render('pdf/invoice.html.twig', [
            'order' => $order,
            'date' => new \DateTime(),
        ]);
        
        // Load HTML into Dompdf
        $dompdf->loadHtml($html);
        
        // Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');
        
        // Render the PDF
        $dompdf->render();
        
        // Return the generated PDF as a string
        return $dompdf->output();
    }
    
    public function generateInvoiceResponse(Order $order): Response
    {
        $pdfContent = $this->generateInvoicePdf($order);
        
        // Create response with PDF content
        $response = new Response($pdfContent);
        $response->headers->set('Content-Type', 'application/pdf');
        $response->headers->set('Content-Disposition', 'attachment; filename="invoice-' . $order->getId() . '.pdf"');
        
        return $response;
    }
}
