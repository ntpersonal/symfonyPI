<?php

namespace App\Controller;

use App\Entity\Order;
use App\Entity\Panier;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use App\Service\PdfService;

#[Route('/admin/dashboard/order')]
#[IsGranted('ROLE_ADMIN')]
class OrderController extends AbstractController
{
    #[Route('/', name: 'order_index', methods: ['GET'])]
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
        $search = $request->query->get('search');
        $status = $request->query->get('status');
        $product = $request->query->get('product');
        $dateFrom = $request->query->get('date_from');
        
        $orderRepository = $doctrine->getRepository(Order::class);
        
        // If any search parameter is provided, use the search method
        if ($search || $status || $product || $dateFrom) {
            $orders = $orderRepository->search($search, $status, $product, $dateFrom);
        } else {
            $orders = $orderRepository->findAll();
        }
        
        // Prepare valid product options for the dropdown
        $productOptions = [];
        $productRepo = $doctrine->getRepository(\App\Entity\Product::class);
        
        foreach ($orders as $order) {
            try {
                if ($order->getProduct() && !in_array($order->getProduct()->getNameproduct(), $productOptions)) {
                    // Verify the product exists by accessing it
                    $productId = $order->getProduct()->getId();
                    $product = $productRepo->find($productId);
                    
                    if ($product) {
                        $productOptions[] = $order->getProduct()->getNameproduct();
                    }
                }
            } catch (\Exception $e) {
                // Skip this order's product if it doesn't exist
            }
        }

        return $this->render('order/index.html.twig', [
            'orders' => $orders,
            'productOptions' => $productOptions,
        ]);
    }

    #[Route('/{id}', name: 'order_show', methods: ['GET'])]
    public function show(Order $order): Response
    {
        // Check if the product exists before rendering
        try {
            // Access the product to check if it exists
            if ($order->getProduct()) {
                $productName = $order->getProduct()->getNameproduct();
            }
        } catch (\Exception $e) {
            // Product doesn't exist, add a flash message
            $this->addFlash('warning', 'The product associated with this order no longer exists in the database.');
        }
        
        return $this->render('order/show.html.twig', [
            'order' => $order,
        ]);
    }

    #[Route('/{id}/edit', name: 'order_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Order $order, ManagerRegistry $doctrine): Response
    {
        if ($request->isMethod('POST')) {
            $status = $request->request->get('status');
            $order->setStatus($status);
            
            $entityManager = $doctrine->getManager();
            $entityManager->flush();
            
            $this->addFlash('success', 'Order status updated successfully.');
            return $this->redirectToRoute('order_index');
        }

        return $this->render('order/edit.html.twig', [
            'order' => $order,
        ]);
    }
    
    #[Route('/{id}/invoice', name: 'order_invoice', methods: ['GET'])]
    public function downloadInvoice(Order $order, PdfService $pdfService): Response
    {
        return $pdfService->generateInvoiceResponse($order);
    }
}
