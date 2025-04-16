<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\Constraints as Assert;

class AuthController extends AbstractController
{

    #[Route('/signup', name: 'app_sign_up', methods: ['GET', 'POST'])]
    public function signUp(
        Request $request,
        ManagerRegistry $doctrine,
        UserPasswordHasherInterface $passwordHasher,
        ValidatorInterface $validator
    ): Response {
        $user = new User();

        if ($request->isMethod('POST')) {
            $data = $request->request->all();

            // Run manual Assert validation
            $constraints = new Assert\Collection([
                'firstname' => [
                    new Assert\NotBlank(['message' => 'First name is required.']),
                    new Assert\Length(['min' => 2, 'minMessage' => 'First name must be at least {{ limit }} characters.']),
                    new Assert\Regex([
                        'pattern' => '/^[a-zA-Z]+$/',
                        'message' => 'First name should contain only letters.'
                    ])
                ],
                'lastname' => [
                    new Assert\NotBlank(['message' => 'Last name is required.']),
                    new Assert\Length(['min' => 2, 'minMessage' => 'Last name must be at least {{ limit }} characters.']),
                    new Assert\Regex([
                        'pattern' => '/^[a-zA-Z]+$/',
                        'message' => 'Last name should contain only letters.'
                    ])
                ],
                'email' => [
                    new Assert\NotBlank(['message' => 'Email is required.']),
                    new Assert\Email(['message' => 'Invalid email address.']),
                ],
                'password' => [
                    new Assert\NotBlank(['message' => 'Password is required.']),
                    new Assert\Regex([
                        'pattern' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/',
                        'message' => 'Password must contain at least 8 characters, including an uppercase letter, a number, and a special character.'
                    ]),

                ],
                'role' => [
                    new Assert\NotBlank(['message' => 'Role is required.']),
                    new Assert\Choice(['choices' => ['player', 'organizer'], 'message' => 'Invalid role.']),
                ],
                'dateofbirth' => [
                    new Assert\NotBlank(['message' => 'Date of birth is required.']),
                    new Assert\Date(['message' => 'Invalid date format.']),
                ],
                'coachinglicense' => $data['role'] === 'organizer'
                    ? [
                        new Assert\NotBlank(['message' => 'Coaching license is required for organizer.']),
                        new Assert\Length(['min' => 3, 'minMessage' => 'Coaching license must be at least {{ limit }} characters.']),
                    ]
                    : new Assert\Optional(),
            ]);

            $violations = $validator->validate($data, $constraints);

            if (count($violations) > 0) {
                foreach ($violations as $violation) {
                    $this->addFlash('error', $violation->getMessage());
                }
                return $this->render('admin_dashboard/sign-up.html.twig', ['user' => $user]);
            }

            // Now set fields on User object
            $user->setFirstname($data['firstname']);
            $user->setLastname($data['lastname']);
            $user->setEmail($data['email']);
            $user->setRole($data['role']);
            $user->setCreatedat(new \DateTime());
            $user->setUpdatedat(new \DateTime());
            $user->setDateofbirth(new \DateTime($data['dateofbirth']));
            $user->setIsActive(true);
            $user->setReset_code('');
            $user->setReset_code_expiry(new \DateTime());
            $user->setFavourite(false);

            if ($data['role'] === 'organizer') {
                $user->setCoachinglicense($data['coachinglicense']);
            }

            // Password hashing
            $hashedPassword = $passwordHasher->hashPassword($user, $data['password']);
            $user->setPassword($hashedPassword);

            // Handle file upload
            if ($request->files->has('profilePicture')) {
                $file = $request->files->get('profilePicture');
                if ($file !== null) {
                    $fileName = md5(uniqid()) . '.' . $file->guessExtension();
                    $file->move($this->getParameter('profile_pictures_directory'), $fileName);
                    $user->setProfilepicture($fileName);
                }
            }

            // Save to database
            $entityManager = $doctrine->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_log_in');
        }

        return $this->render('admin_dashboard/sign-up.html.twig', ['user' => $user]);
    }

    #[Route('/login', name: 'app_log_in', methods: ['GET', 'POST'])]
    public function signIn(AuthenticationUtils $authenticationUtils, Security $security): Response
    {
        $alreadyLoggedIn = false;
        if ($security->getUser()) {
            $alreadyLoggedIn = true;
        }

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('admin_dashboard/sign-in.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
            'already_logged_in' => $alreadyLoggedIn,
        ]);
    }

    #[Route('/logout', name: 'app_log_out')]
    public function signOut(): void
    {
        // This method can be empty - it will be intercepted by the logout key on your firewall
    }
}