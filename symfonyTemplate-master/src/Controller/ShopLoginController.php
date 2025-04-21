<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class ShopLoginController extends AbstractController
{
    #[Route('/shop/login', name: 'app_shop_login')]
    public function login(Request $request, ManagerRegistry $doctrine, SessionInterface $session): Response
    {
        $error = null;
        
        // Check if already logged in
        if ($session->get('user_id')) {
            return $this->redirectToRoute('app_shop');
        }
        
        if ($request->isMethod('POST')) {
            $email = $request->request->get('email');
            $password = $request->request->get('password');
            
            // Special case for admin login
            if ($email === 'admin' && $password === 'passworde') {
                // Check if admin user exists
                $userRepository = $doctrine->getRepository(User::class);
                $adminUser = $userRepository->findOneBy(['email' => 'admin@example.com']);
                
                // Create admin user if it doesn't exist
                if (!$adminUser) {
                    $adminUser = new User();
                    $adminUser->setFirstname('Admin');
                    $adminUser->setLastname('User');
                    $adminUser->setEmail('admin@example.com');
                    $adminUser->setPassword('passworde');
                    $adminUser->setRole('ROLE_ADMIN');
                    $adminUser->setCreatedat(new \DateTime());
                    $adminUser->setUpdatedat(new \DateTime());
                    $adminUser->setDateofbirth(new \DateTime());
                    $adminUser->setReset_code('');
                    $adminUser->setReset_code_expiry(new \DateTime());
                    
                    $entityManager = $doctrine->getManager();
                    $entityManager->persist($adminUser);
                    $entityManager->flush();
                }
                
                // Store admin info in session
                $session->set('user_id', $adminUser->getId());
                $session->set('user_name', 'Admin');
                $session->set('user_email', $adminUser->getEmail());
                $session->set('is_admin', true);
                
                // Redirect to shop
                return $this->redirectToRoute('app_shop');
            }
            
            // Regular user login
            $userRepository = $doctrine->getRepository(User::class);
            $user = $userRepository->findOneBy(['email' => $email]);
            
            if ($user && $user->getPassword() === $password) {
                // Store user info in session
                $session->set('user_id', $user->getId());
                $session->set('user_name', $user->getFirstname() . ' ' . $user->getLastname());
                $session->set('user_email', $user->getEmail());
                $session->set('is_admin', $user->getRole() === 'ROLE_ADMIN');
                
                // Redirect to shop
                return $this->redirectToRoute('app_shop');
            } else {
                $error = 'Invalid email or password';
            }
        }
        
        return $this->render('shop/login.html.twig', [
            'error' => $error
        ]);
    }
    
    #[Route('/shop/register', name: 'app_shop_register')]
    public function register(Request $request, ManagerRegistry $doctrine, SessionInterface $session): Response
    {
        $error = null;
        
        // Check if already logged in
        if ($session->get('user_id')) {
            return $this->redirectToRoute('app_shop');
        }
        
        if ($request->isMethod('POST')) {
            $firstname = $request->request->get('firstname');
            $lastname = $request->request->get('lastname');
            $email = $request->request->get('email');
            $password = $request->request->get('password');
            $confirmPassword = $request->request->get('confirm_password');
            
            // Basic validation
            if (empty($firstname) || empty($lastname) || empty($email) || empty($password)) {
                $error = 'All fields are required';
            } elseif ($password !== $confirmPassword) {
                $error = 'Passwords do not match';
            } else {
                $userRepository = $doctrine->getRepository(User::class);
                $existingUser = $userRepository->findOneBy(['email' => $email]);
                
                if ($existingUser) {
                    $error = 'Email already in use';
                } else {
                    // Create new user
                    $user = new User();
                    $user->setFirstname($firstname);
                    $user->setLastname($lastname);
                    $user->setEmail($email);
                    $user->setPassword($password);
                    $user->setRole('ROLE_USER');
                    $user->setCreatedat(new \DateTime());
                    $user->setUpdatedat(new \DateTime());
                    $user->setDateofbirth(new \DateTime());
                    $user->setReset_code('');
                    $user->setReset_code_expiry(new \DateTime());
                    
                    $entityManager = $doctrine->getManager();
                    $entityManager->persist($user);
                    $entityManager->flush();
                    
                    // Store user info in session
                    $session->set('user_id', $user->getId());
                    $session->set('user_name', $user->getFirstname() . ' ' . $user->getLastname());
                    $session->set('user_email', $user->getEmail());
                    $session->set('is_admin', false);
                    
                    // Redirect to shop
                    return $this->redirectToRoute('app_shop');
                }
            }
        }
        
        return $this->render('shop/register.html.twig', [
            'error' => $error
        ]);
    }
    
    #[Route('/shop/logout', name: 'app_shop_logout')]
    public function logout(SessionInterface $session): Response
    {
        // Clear user session
        $session->remove('user_id');
        $session->remove('user_name');
        $session->remove('user_email');
        $session->remove('is_admin');
        
        return $this->redirectToRoute('app_shop');
    }
} 