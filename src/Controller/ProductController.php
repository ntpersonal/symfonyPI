<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use App\Service\ImaggaImageService;
use App\Service\ProductDescriptionGenerator;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
#[Route('/admin/dashboard/product')]
#[IsGranted('ROLE_ADMIN')]
class ProductController extends AbstractController
{
    #[Route('/upload-temp-image', name: 'upload_temp_image', methods: ['POST'])]
    public function uploadTempImage(Request $request): Response
    {
        $uploadDir = $this->getParameter('product_images_directory');
        $imageFile = $request->files->get('image');
        
        if (!$imageFile) {
            return $this->json(['success' => false, 'error' => 'No image provided']);
        }
        
        $originalExtension = strtolower($imageFile->getClientOriginalExtension());
        $allowedExtensions = ['jpg', 'jpeg', 'png'];
        
        if (!in_array($originalExtension, $allowedExtensions)) {
            return $this->json(['success' => false, 'error' => 'Invalid file type']);
        }
        
        $newFilename = uniqid() . '.' . $originalExtension;
        
        try {
            $imageFile->move($uploadDir, $newFilename);
            return $this->json([
                'success' => true,
                'filename' => $newFilename
            ]);
        } catch (FileException $e) {
            return $this->json(['success' => false, 'error' => 'Failed to upload image']);
        }
    }
    
    #[Route('/save-description/{id}', name: 'save_product_description', methods: ['POST'])]
    public function saveDescription(Request $request, Product $product, ManagerRegistry $doctrine): Response
    {
        $description = $request->request->get('description');
        
        if ($description) {
            // Directly update the product description in the database
            $product->setProductdescription($description);
            $entityManager = $doctrine->getManager();
            $entityManager->flush();
            
            return $this->json([
                'success' => true,
                'message' => 'Description saved successfully!'
            ]);
        }
        
        return $this->json([
            'success' => false,
            'message' => 'No description provided'
        ]);
    }
    
    #[Route('/generate-description', name: 'generate_product_description', methods: ['POST'])]
    public function generateDescription(Request $request, ImaggaImageService $imaggaImageService, ProductDescriptionGenerator $descriptionGenerator): Response
    {
        $uploadDir = $this->getParameter('product_images_directory');
        $imageName = $request->request->get('image');
        $productName = $request->request->get('name');
        $category = $request->request->get('category');
        
        // Default response
        $response = [
            'success' => false,
            'description' => ''
        ];
        
        // If we have an image, analyze it
        if ($imageName) {
            $imagePath = $uploadDir . '/' . $imageName;
            
            if (file_exists($imagePath)) {
                $imageAnalysis = $imaggaImageService->analyzeImage($imagePath);
                
                if (!isset($imageAnalysis['error']) && isset($imageAnalysis['description'])) {
                    // Include tags in the response for debugging
                    $tagNames = [];
                    if (isset($imageAnalysis['tags']) && is_array($imageAnalysis['tags'])) {
                        foreach ($imageAnalysis['tags'] as $tag) {
                            if (isset($tag['name'])) {
                                $tagNames[] = $tag['name'] . ' (' . ($tag['confidence'] ?? 'N/A') . ')';
                            }
                        }
                    }
                    
                    $response = [
                        'success' => true,
                        'description' => $imageAnalysis['description'],
                        'source' => 'image',
                        'tags' => $tagNames
                    ];
                }
            }
        }
        
        // If image analysis failed or no image provided, use text-based generator
        if (!$response['success'] && $productName && $category) {
            $description = $descriptionGenerator->generateDescription($productName, $category);
            $response = [
                'success' => true,
                'description' => $description,
                'source' => 'text'
            ];
        }
        
        return $this->json($response);
    }


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
    public function new(
        Request $request, 
        ManagerRegistry $doctrine, 
        ImaggaImageService $imaggaImageService, 
        ProductDescriptionGenerator $descriptionGenerator
    ): Response
    {
        $product = new Product();
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('image')->getData();
            $generateAiDescription = $request->request->get('generate_ai_description') === 'on';
            $imagePath = null;
            
            if ($imageFile) {
                $uploadDir = $this->getParameter('product_images_directory');
            
                // Validate file type
                $originalExtension = strtolower($imageFile->getClientOriginalExtension());
                $allowedExtensions = ['jpg', 'jpeg', 'png'];
                
                if (in_array($originalExtension, $allowedExtensions)) {
                    $newFilename = uniqid() . '.' . $originalExtension;
                    $imagePath = $uploadDir . '/' . $newFilename;
                
                    try {
                        $imageFile->move($uploadDir, $newFilename);
                        $product->setImage($newFilename);
                        
                        // Generate AI description if requested and we have an image
                        if ($generateAiDescription) {
                            // First try to generate description from image using Imagga
                            $imageAnalysis = $imaggaImageService->analyzeImage($imagePath);
                            
                            if (!isset($imageAnalysis['error']) && isset($imageAnalysis['description'])) {
                                // Use image-based description if available
                                $description = $imageAnalysis['description'];
                                $this->addFlash('success', 'AI description generated from image analysis!');
                            } else {
                                // Fall back to text-based description generator
                                $description = $descriptionGenerator->generateDescription(
                                    $product->getNameproduct(),
                                    $product->getCategory()
                                );
                                $this->addFlash('warning', 'Image analysis failed: ' . ($imageAnalysis['error'] ?? 'Unknown error') . '. Using text-based description instead.');
                            }
                            
                            $product->setProductdescription($description);
                        }
                    } catch (FileException $e) {
                        $this->addFlash('error', 'Image upload failed.');
                    }
                } else {
                    $this->addFlash('error', 'Please upload a valid image (JPG, JPEG or PNG)');
                    return $this->render('product/new.html.twig', [
                        'form' => $form->createView(),
                    ]);
                }
            } else if ($generateAiDescription) {
                // If no image but AI description requested, use text-based generator
                $description = $descriptionGenerator->generateDescription(
                    $product->getNameproduct(),
                    $product->getCategory()
                );
                $product->setProductdescription($description);
                $this->addFlash('success', 'AI description generated successfully!');
            }

            // Make sure the description is explicitly set before persisting
            $description = $form->get('productdescription')->getData();
            if ($description) {
                $product->setProductdescription($description);
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
    public function edit(
        Request $request, 
        int $id,
        ManagerRegistry $doctrine, 
        ImaggaImageService $imaggaImageService, 
        ProductDescriptionGenerator $descriptionGenerator
    ): Response
    {
        // Find the product manually instead of using param converter
        $productRepository = $doctrine->getRepository(Product::class);
        $product = $productRepository->find($id);
        
        // If product doesn't exist, redirect to product list with error message
        if (!$product) {
            $this->addFlash('error', 'Product not found. It may have been deleted.');
            return $this->redirectToRoute('product_index');
        }
        
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('image')->getData();
            $generateAiDescription = $request->request->get('generate_ai_description') === 'on';
            $imagePath = null;
            
            if ($imageFile) {
                $uploadDir = $this->getParameter('product_images_directory');
            
                $originalExtension = strtolower($imageFile->getClientOriginalExtension());
                $allowedExtensions = ['jpg', 'jpeg', 'png'];
            
                if (in_array($originalExtension, $allowedExtensions)) {
                    $newFilename = uniqid() . '.' . $originalExtension;
                    $imagePath = $uploadDir . '/' . $newFilename;
            
                    try {
                        $imageFile->move($uploadDir, $newFilename);
                        $product->setImage($newFilename);
                        
                        // Generate AI description if requested and we have a new image
                        if ($generateAiDescription) {
                            // First try to generate description from image using Imagga
                            $imageAnalysis = $imaggaImageService->analyzeImage($imagePath);
                            
                            if (!isset($imageAnalysis['error']) && isset($imageAnalysis['description'])) {
                                // Use image-based description if available
                                $description = $imageAnalysis['description'];
                                $this->addFlash('success', 'AI description generated from image analysis!');
                            } else {
                                // Fall back to text-based description generator
                                $description = $descriptionGenerator->generateDescription(
                                    $product->getNameproduct(),
                                    $product->getCategory()
                                );
                                $this->addFlash('warning', 'Image analysis failed: ' . ($imageAnalysis['error'] ?? 'Unknown error') . '. Using text-based description instead.');
                            }
                            
                            $product->setProductdescription($description);
                        }
                    } catch (FileException $e) {
                        $this->addFlash('error', 'Image upload failed.');
                    }
                } else {
                    $this->addFlash('error', 'Please upload a valid image (JPG, JPEG or PNG)');
                }
            } else if ($generateAiDescription) {
                // If no new image but AI description requested, use existing image or text-based generator
                if ($product->getImage()) {
                    $imagePath = $this->getParameter('product_images_directory') . '/' . $product->getImage();
                    if (file_exists($imagePath)) {
                        $imageAnalysis = $imaggaImageService->analyzeImage($imagePath);
                        
                        if (!isset($imageAnalysis['error']) && isset($imageAnalysis['description'])) {
                            $description = $imageAnalysis['description'];
                            $product->setProductdescription($description);
                            $this->addFlash('success', 'AI description generated from existing image!');
                        } else {
                            // Fall back to text-based generator
                            $description = $descriptionGenerator->generateDescription(
                                $product->getNameproduct(),
                                $product->getCategory()
                            );
                            $product->setProductdescription($description);
                            $this->addFlash('success', 'AI description generated from product details!');
                        }
                    } else {
                        // Image file doesn't exist, use text-based generator
                        $description = $descriptionGenerator->generateDescription(
                            $product->getNameproduct(),
                            $product->getCategory()
                        );
                        $product->setProductdescription($description);
                        $this->addFlash('success', 'AI description generated from product details!');
                    }
                } else {
                    // No image at all, use text-based generator
                    $description = $descriptionGenerator->generateDescription(
                        $product->getNameproduct(),
                        $product->getCategory()
                    );
                    $product->setProductdescription($description);
                    $this->addFlash('success', 'AI description generated from product details!');
                }
            }
            
            // Make sure the description is explicitly set before persisting
            $description = $form->get('productdescription')->getData();
            if ($description) {
                $product->setProductdescription($description);
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
            // Check if product is referenced by any orders
            $hasOrders = !$product->getOrders()->isEmpty();
            
            $entityManager = $doctrine->getManager();
            
            if ($hasOrders) {
                // Soft delete if the product has orders
                $product->softDelete();
                $this->addFlash('notice', 'Product has been soft-deleted because it is referenced by orders.');
            } else {
                // Hard delete if no orders reference this product
                $entityManager->remove($product);
                $this->addFlash('success', 'Product has been permanently deleted.');
            }
            
            $entityManager->flush();
        }

        return $this->redirectToRoute('product_index');
    }
}
