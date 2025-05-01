<?php

// src/Controller/ResetPasswordController.php
namespace App\Controller;

use App\Entity\User;
use App\Form\ChangePasswordFormType;
use App\Form\ResetPasswordRequestFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use SymfonyCasts\Bundle\ResetPassword\Controller\ResetPasswordControllerTrait;
use SymfonyCasts\Bundle\ResetPassword\Exception\ResetPasswordExceptionInterface;
use SymfonyCasts\Bundle\ResetPassword\ResetPasswordHelperInterface;

#[Route('/reset-password')]
class ResetPasswordController extends AbstractController
{
    use ResetPasswordControllerTrait;

    public function __construct(
        private ResetPasswordHelperInterface $resetPasswordHelper,
        private MailerInterface $mailer,
        private EntityManagerInterface $entityManager
    ) {}

    #[Route('', name: 'app_forgot_password_request')]
    public function request(Request $request): Response
    {
        $form = $this->createForm(ResetPasswordRequestFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            return $this->processSendingPasswordResetEmail(
                $form->get('email')->getData()
            );
        }

        return $this->render('reset_password/request.html.twig', [
            'requestForm' => $form->createView(),
        ]);
    }

    #[Route('/check-email', name: 'app_check_email')]
    public function checkEmail(): Response
    {
        // Prevent users from directly accessing this page
        if (null === ($resetToken = $this->getTokenObjectFromSession())) {
            $resetToken = $this->resetPasswordHelper->generateFakeResetToken();
        }

        return $this->render('reset_password/check_email.html.twig', [
            'resetToken' => $resetToken,
        ]);
    }

    #[Route('/reset/{token}', name: 'app_reset_password')]
    public function reset(
        Request $request,
        UserPasswordHasherInterface $passwordHasher,
        string $token = null
    ): Response {
        if ($token) {
            $this->storeTokenInSession($token);
            return $this->redirectToRoute('app_reset_password');
        }

        $token = $this->getTokenFromSession();
        if (null === $token) {
            throw $this->createNotFoundException('No reset password token found in the URL or in the session.');
        }

        try {
            $user = $this->resetPasswordHelper->validateTokenAndFetchUser($token);
        } catch (ResetPasswordExceptionInterface $e) {
            $this->addFlash('reset_password_error', sprintf(
                'There was a problem validating your reset request - %s',
                $e->getReason()
            ));

            return $this->redirectToRoute('app_forgot_password_request');
        }

        $form = $this->createForm(ChangePasswordFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->resetPasswordHelper->removeResetRequest($token);

            $encodedPassword = $passwordHasher->hashPassword(
                $user,
                $form->get('plainPassword')->getData()
            );

            $user->setPassword($encodedPassword);
            $this->entityManager->flush();

            $this->cleanSessionAfterReset();

            return $this->redirectToRoute('app_log_in');
        }

        return $this->render('reset_password/reset.html.twig', [
            'resetForm' => $form->createView(),
            'token' => $token,
        ]);
    }

    private function processSendingPasswordResetEmail(string $emailFormData): Response
    {
        error_log('Starting password reset process for email: ' . $emailFormData);
        
        $user = $this->entityManager->getRepository(User::class)->findOneBy([
            'email' => $emailFormData,
        ]);

        if (!$user) {
            error_log('No user found with email: ' . $emailFormData);
            // Don't reveal whether a user account was found or not
            return $this->redirectToRoute('app_check_email');
        }

        error_log('User found: ' . $user->getEmail());

        try {
            $resetToken = $this->resetPasswordHelper->generateResetToken($user);
            error_log('Reset token generated successfully');
        } catch (ResetPasswordExceptionInterface $e) {
            error_log('Error generating reset token: ' . $e->getMessage());
            $this->addFlash('reset_password_error', sprintf(
                'There was a problem handling your password reset request - %s',
                $e->getReason()
            ));
            return $this->redirectToRoute('app_forgot_password_request');
        }

        try {
            error_log('Creating email for: ' . $user->getEmail());
            $email = (new TemplatedEmail())
                ->from(new Address('reset@yourdomain.com', 'Password Reset'))
                ->to($user->getEmail())
                ->subject('Your password reset request')
                ->htmlTemplate('reset_password/email.html.twig')
                ->context([
                    'resetToken' => $resetToken,
                    'user' => $user,
                ]);

            error_log('Attempting to send email...');
            try {
                $this->mailer->send($email);
                error_log('Email sent successfully');
            } catch (\Symfony\Component\Mailer\Exception\TransportExceptionInterface $e) {
                error_log('Transport error: ' . $e->getMessage());
                throw $e;
            }
            
            $this->setTokenObjectInSession($resetToken);
        } catch (\Exception $e) {
            error_log('Email sending error: ' . $e->getMessage());
            error_log('Stack trace: ' . $e->getTraceAsString());
            
            $this->addFlash('reset_password_error', sprintf(
                'There was a problem sending the email: %s. Please try again later.',
                $e->getMessage()
            ));
            return $this->redirectToRoute('app_forgot_password_request');
        }

        return $this->redirectToRoute('app_check_email');
    }
}