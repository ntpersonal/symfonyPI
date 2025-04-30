<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/product')]
class PublicProductController extends AbstractController
{
    #[Route('/', name: 'public_product_index', methods: ['GET'])]
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
        $searchTerm = $request->query->get('search');
        $category = $request->query->get('category');
        $stock = $request->query->get('stock');
        
        $repository = $doctrine->getRepository(Product::class);
        
        // If any search parameter is provided, use the search method
        if ($searchTerm || $category || $stock) {
            $products = $repository->search($searchTerm, $category, $stock);
        } else {
            $products = $repository->findAll();
        }

        // Get all available category and stock options for the filter dropdowns
        $categories = ['tournement', 'clothes', 'trophies'];
        $stockOptions = ['yes', 'coming', 'no'];

        return $this->render('product/index.html.twig', [
            'products' => $products,
            'searchTerm' => $searchTerm,
            'selectedCategory' => $category,
            'selectedStock' => $stock,
            'categories' => $categories,
            'stockOptions' => $stockOptions,
        ]);
    }
}
