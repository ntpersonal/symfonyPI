<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/dashboard/product')]
class ProductController extends AbstractController
{
    #[Route('/', name: 'product_index', methods: ['GET'])]
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

    #[Route('/new', name: 'product_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ManagerRegistry $doctrine): Response
    {
        $product = new Product();
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('image')->getData();
            if ($imageFile) {
                $uploadDir = $this->getParameter('product_images_directory');
            
                // Validate file type
                $originalExtension = strtolower($imageFile->getClientOriginalExtension());
                $allowedExtensions = ['jpg', 'jpeg', 'png'];
                
                if (in_array($originalExtension, $allowedExtensions)) {
                    $newFilename = uniqid() . '.' . $originalExtension;
                
                    try {
                        $imageFile->move($uploadDir, $newFilename);
                        $product->setImage($newFilename);
                    } catch (FileException $e) {
                        $this->addFlash('error', 'Image upload failed.');
                    }
                } else {
                    $this->addFlash('error', 'Please upload a valid image (JPG, JPEG or PNG)');
                    return $this->render('product/new.html.twig', [
                        'form' => $form->createView(),
                    ]);
                }
            }

            $entityManager = $doctrine->getManager();
            $entityManager->persist($product);
            $entityManager->flush();

            return $this->redirectToRoute('product_index');
        }

        return $this->render('product/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/edit', name: 'product_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Product $product, ManagerRegistry $doctrine): Response
    {
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('image')->getData();
            if ($imageFile) {
                $uploadDir = $this->getParameter('product_images_directory');
            
                $originalExtension = strtolower($imageFile->getClientOriginalExtension());
                $allowedExtensions = ['jpg', 'jpeg', 'png'];
            
                if (in_array($originalExtension, $allowedExtensions)) {
                    $newFilename = uniqid() . '.' . $originalExtension;
            
                    try {
                        $imageFile->move($uploadDir, $newFilename);
                        $product->setImage($newFilename);
                    } catch (FileException $e) {
                        $this->addFlash('error', 'Image upload failed.');
                    }
                } else {
                    $this->addFlash('error', 'Please upload a valid image (JPG, JPEG or PNG)');
                }
            }
            
            $doctrine->getManager()->flush();
            return $this->redirectToRoute('product_index');
        }

        return $this->render('product/edit.html.twig', [
            'form' => $form->createView(),
            'product' => $product,
        ]);
    }

    #[Route('/{id}', name: 'product_delete', methods: ['POST'])]
    public function delete(Request $request, Product $product, ManagerRegistry $doctrine): Response
    {
        if ($this->isCsrfTokenValid('delete' . $product->getId(), $request->request->get('_token'))) {
            $entityManager = $doctrine->getManager();
            $entityManager->remove($product);
            $entityManager->flush();
        }

        return $this->redirectToRoute('product_index');
    }
}
