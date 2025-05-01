<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ImageController extends AbstractController
{
    #[Route('/img/{subdirectory}/{filename}', name: 'app_image', requirements: [
        'subdirectory' => 'teams|players', // allowed subdirectories
        'filename' => '.+' // allow any filename (including with slashes)
    ])]
    public function serveImage(string $subdirectory, string $filename): Response
    {
        $validSubdirectories = ['teams', 'players']; // Add others as needed
        $basePath = 'C:/xampp4/htdocs/img/';
        
        // Security check
        if (!in_array($subdirectory, $validSubdirectories, true)) {
            throw new NotFoundHttpException('Invalid image category');
        }

        $filePath = $basePath . $subdirectory . '/' . $filename;

        if (!file_exists($filePath)) {
            throw new NotFoundHttpException('Image not found');
        }

        $response = new BinaryFileResponse($filePath);
        $response->headers->set('Content-Type', mime_content_type($filePath));
        $response->setCache([
            'public' => true,
            'max_age' => '604800' // 1 week cache
        ]);
        
        return $response;
    }
} 