<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ResetPasswordRequestFormType;
use App\Form\SignUpType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Psr\Log\LoggerInterface;

class AuthController extends AbstractController
{

    #[Route('/signup', name: 'app_sign_up', methods: ['GET', 'POST'])]
    public function signUp(
        Request $request,
        ManagerRegistry $doctrine,
        UserPasswordHasherInterface $passwordHasher,
        LoggerInterface $logger
    ): Response {
        $user = new User();
        $form = $this->createForm(SignUpType::class, $user);
        $form->handleRequest($request);

        // Debug form submission
        if ($request->isMethod('POST')) {
            $logger->info('Form submitted');
            
            if ($form->isSubmitted()) {
                $logger->info('Form is submitted');
                
                if ($form->isValid()) {
                    $logger->info('Form is valid');
                    
                    // Set additional fields
                    $user->setCreatedat(new \DateTime());
                    $user->setUpdatedat(new \DateTime());
                    $user->setIsActive(true);
                    $user->setReset_code('');
                    $user->setReset_code_expiry(new \DateTime());
                    $user->setFavourite(false);

                    // Password hashing
                    $hashedPassword = $passwordHasher->hashPassword($user, $form->get('password')->getData());
                    $user->setPassword($hashedPassword);

                    // Handle file upload
                    $profilePicture = $form->get('profilePicture')->getData();
                    if ($profilePicture) {
                        $fileName = md5(uniqid()) . '.' . $profilePicture->guessExtension();
                        $profilePicture->move($this->getParameter('profile_pictures_directory'), $fileName);
                        $user->setProfilepicture($fileName);
                    }

                    // Save to database
                    $entityManager = $doctrine->getManager();
                    $entityManager->persist($user);
                    $entityManager->flush();

                    $this->addFlash('success', 'Your account has been created successfully. You can now log in.');
                    return $this->redirectToRoute('app_log_in');
                } else {
                    $logger->error('Form validation failed');
                    $errors = [];
                    foreach ($form->getErrors(true) as $error) {
                        $errors[] = $error->getMessage();
                        $logger->error('Form error: ' . $error->getMessage());
                    }
                    $this->addFlash('error', 'Please correct the errors in the form: ' . implode(', ', $errors));
                }
            } else {
                $logger->error('Form is not submitted');
            }
        }

        return $this->render('admin_dashboard/sign-up.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/login', name: 'app_log_in', methods: ['GET', 'POST'])]
    public function signIn(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('admin_dashboard/sign-in.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    #[Route('/logout', name: 'app_log_out')]
    public function signOut(): void
    {
        // This method can be empty - it will be intercepted by the logout key on your firewall
    }


}