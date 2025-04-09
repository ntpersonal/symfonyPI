<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request; // Added missing import
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Team;
final class AdminDashboradController extends AbstractController
{
    #[Route('/admin/dashborad', name: 'app_admin_dashborad')]
    public function index(): Response
    {
        return $this->render('admin_dashborad/dashboard.html.twig', [
            'controller_name' => 'AdminDashboradController',
        ]);
    }

    #[Route('/admin/dashborad/profile', name: 'app_admin_dashborad_profile')]
    public function profile(): Response
    {
        return $this->render('admin_dashborad/profile.html.twig');
    }

    #[Route('/admin/dashborad/tables', name: 'app_admin_dashborad_tables')]
    public function tables(Request $request, ManagerRegistry $doctrine): Response
    {
        $teams = $doctrine->getRepository(Team::class)->findAll();
        return $this->render('admin_dashborad/tables.html.twig',[
            'teams' => $teams,
        ]);
    }

    #[Route('/admin/dashborad/virtual-reality', name: 'app_admin_dashborad_virtual_reality')]
    public function virtual_reality(): Response
    {
        return $this->render('admin_dashborad/virtual-reality.html.twig');
    }

    #[Route('/admin/dashborad/sign-in', name: 'app_admin_dashborad_sign_in')]
    public function sign_in(): Response
    {
        return $this->render('admin_dashborad/sign-in.html.twig');
    }

    #[Route('/admin/dashborad/sign-up', name: 'app_admin_dashborad_sign_up')]
    public function sign_up(): Response
    {
        return $this->render('admin_dashborad/sign-up.html.twig');
    }


    #[Route('/admin/dashborad/rtl', name: 'app_admin_dashborad_rtl')]
    public function rtl(): Response
    {
        return $this->render('admin_dashborad/rtl.html.twig');
    }
    #[Route('/admin/dashborad/billing', name: 'app_admin_dashborad_billing')]
    public function billing(): Response
    {
        return $this->render('admin_dashborad/billing.html.twig');
    }
    
    
    
    
}
