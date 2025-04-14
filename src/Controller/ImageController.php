<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ImageController extends AbstractController
{
    #[Route('/img/{filename}', name: 'app_image')]
    public function serveImage(string $filename): Response
    {
        // Define the base path where your images are stored
        $basePath = 'C:/xampp3/htdocs/img/';
        $filePath = $basePath . $filename;

        // Check if file exists
        if (!file_exists($filePath)) {
            throw new NotFoundHttpException('Image not found');
        }

        // Create and return the response
        $response = new BinaryFileResponse($filePath);
        $response->headers->set('Content-Type', mime_content_type($filePath));
        
        return $response;
    }
} 