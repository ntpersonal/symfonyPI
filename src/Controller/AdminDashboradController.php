<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request; // Added missing import
use Doctrine\Persistence\ManagerRegistry;



final class AdminDashboradController extends AbstractController
{
    #[Route('/admin/dashboard', name: 'app_admin_dashborad')]
    public function index(): Response
    {
        return $this->render('admin_dashboard/dashboard.html.twig', [
            'controller_name' => 'AdminDashboradController',
        ]);
    }

    #[Route('/admin/dashboard/profile', name: 'app_admin_dashborad_profile')]
    public function profile(): Response
    {
        return $this->render('admin_dashborad/profile.html.twig');
    }

   
   
    #[Route('/admin/dashboard/virtual-reality', name: 'app_admin_dashborad_virtual_reality')]
    public function virtual_reality(): Response
    {
        return $this->render('admin_dashboard/virtual-reality.html.twig');
    }

    #[Route('/admin/dashboard/sign-in', name: 'app_admin_dashborad_sign_in')]
    public function sign_in(): Response
    {
        return $this->render('admin_dashboard/sign-in.html.twig');
    }

    #[Route('/admin/dashboard/sign-up', name: 'app_admin_dashborad_sign_up')]
    public function sign_up(): Response
    {
        return $this->render('admin_dashboard/sign-up.html.twig');
    }


    #[Route('/admin/dashboard/rtl', name: 'app_admin_dashborad_rtl')]
    public function rtl(): Response
    {
        return $this->render('admin_dashborad/rtl.html.twig');
    }
    #[Route('/admin/dashboard/billing', name: 'app_admin_dashborad_billing')]
    public function billing(): Response
    {
        return $this->render('admin_dashboard/billing.html.twig');
    }

    
    
    
    
    
}
