<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChatPageController extends AbstractController
{
    #[Route('/chat', name: 'chat_page')]
    public function __invoke(): Response
    {
        return $this->render('chat/index.html.twig');
    }
}
