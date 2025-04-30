<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\User;
use App\Entity\Team;
use App\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use App\Form\AddUserType;
use App\Form\EditUserType;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use App\Repository\UserRepository;

final class UserController extends AbstractController
{
    #[Route('/admin/dashboard/users', name: 'app_admin_dashboard_users')]
    public function index(Request $request, ManagerRegistry $doctrine, PaginatorInterface $paginator, UserRepository $userRepository): Response
    {
        $search = $request->query->get('q');
        $queryBuilder = $doctrine->getRepository(User::class)->createQueryBuilder('u');

        if ($search) {
            $queryBuilder
                ->where('u.firstname LIKE :search')
                ->orWhere('u.lastname LIKE :search')
                ->orWhere('u.email LIKE :search')
                ->setParameter('search', '%' . $search . '%');
        }

        $query = $queryBuilder
            ->orderBy('u.createdat', 'DESC')
            ->addOrderBy('u.id', 'DESC')
            ->getQuery();

        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            5, // Set to 5 users per page
            [
                'defaultSortFieldName' => 'u.createdat',
                'defaultSortDirection' => 'desc',
                'distinct' => false
            ]
        );

        // Get dashboard statistics
        $totalUsers = $userRepository->count([]);
        $activeUsers = $userRepository->count(['is_active' => true]);
        $playerUsers = $userRepository->count(['role' => 'player']);
        $organizerUsers = $userRepository->count(['role' => 'organizer']);

        // Calculate user growth rate
        $currentMonth = new \DateTime('first day of this month');
        $lastMonth = new \DateTime('first day of last month');

        $usersThisMonth = $userRepository->createQueryBuilder('u')
            ->select('COUNT(u.id)')
            ->where('u.createdat >= :start')
            ->setParameter('start', $currentMonth)
            ->getQuery()
            ->getSingleScalarResult();

        $usersLastMonth = $userRepository->createQueryBuilder('u')
            ->select('COUNT(u.id)')
            ->where('u.createdat >= :start AND u.createdat < :end')
            ->setParameter('start', $lastMonth)
            ->setParameter('end', $currentMonth)
            ->getQuery()
            ->getSingleScalarResult();

        $userGrowthRate = $usersLastMonth > 0 ?
            round(($usersThisMonth - $usersLastMonth) / $usersLastMonth * 100) : 100;

        // Get recent users
        $recentUsers = $userRepository->createQueryBuilder('u')
            ->orderBy('u.createdat', 'DESC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();

        // Check if it's an AJAX request
        if ($request->isXmlHttpRequest()) {
            $users = [];
            foreach ($pagination as $user) {
                $users[] = [
                    'id' => $user->getId(),
                    'firstname' => $user->getFirstname(),
                    'lastname' => $user->getLastname(),
                    'email' => $user->getEmail(),
                    'role' => $user->getRole(),
                    'isActive' => $user->isIsActive(),
                    'profilepicture' => $user->getProfilepicture(),
                    'team' => $user->getTeam() ? ['name' => $user->getTeam()->getNom()] : null,
                    'csrfToken' => $this->container->get('security.csrf.token_manager')->getToken('delete' . $user->getId())->getValue()
                ];
            }

            return $this->json([
                'users' => $users,
                'pagination' => [
                    'currentPage' => $pagination->getCurrentPageNumber(),
                    'totalPages' => $pagination->getPageCount(),
                    'totalItems' => $pagination->getTotalItemCount(),
                    'itemsPerPage' => $pagination->getItemNumberPerPage()
                ]
            ]);
        }

        // Normal page render if not AJAX
        $teams = $doctrine->getRepository(Team::class)->findAll();

        return $this->render('admin_dashboard/users/index.html.twig', [
            'pagination' => $pagination,
            'teams' => $teams,
            'totalUsers' => $totalUsers,
            'activeUsers' => $activeUsers,
            'playerUsers' => $playerUsers,
            'organizerUsers' => $organizerUsers,
            'userGrowthRate' => $userGrowthRate,
            'recentUsers' => $recentUsers
        ]);
    }
    #[Route('/admin/dashboard/users/new', name: 'app_admin_dashboard_user_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ManagerRegistry $doctrine, UserPasswordHasherInterface $passwordHasher, SluggerInterface $slugger, UserRepository $userRepository): Response
    {
        $user = new User();
        $form = $this->createForm(AddUserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                // Set current datetime for createdat and updatedat fields
                $now = new \DateTime();
                $user->setCreatedat($now);
                $user->setUpdatedat($now);

                // Set default values for reset code fields
                $user->setResetCode(bin2hex(random_bytes(16))); // Generate a random reset code
                $user->setResetCodeExpiry($now->modify('+24 hours')); // Set expiry to 24 hours from now

                // Get the plainPassword from the form since it's not mapped to the entity
                $plainPassword = $form->get('password')->getData();

                if (!$plainPassword) {
                    throw new \InvalidArgumentException('Password is required for new users');
                }

                // Hash the password
                $hashedPassword = $passwordHasher->hashPassword($user, $plainPassword);
                $user->setPassword($hashedPassword);

                // Handle file upload
                $profilePictureFile = $form->get('profilepicture')->getData();
                if ($profilePictureFile) {
                    $newFilename = $this->handleFileUpload($profilePictureFile);
                    $user->setProfilepicture($newFilename);
                }

                $entityManager = $doctrine->getManager();
                $entityManager->persist($user);
                $entityManager->flush();

                $this->addFlash('success', 'User created successfully!');
                return $this->redirectToRoute('app_admin_dashboard_users');
            } catch (\Exception $e) {
                $this->addFlash('error', 'Error creating user: ' . $e->getMessage());
            }
        } elseif ($form->isSubmitted() && !$form->isValid()) {
            // If form was submitted but validation failed, display errors
            $this->addFlash('error', 'Unable to create user. Please check the form for errors.');

            // Add specific validation errors as flash messages
            foreach ($form->getErrors(true) as $error) {
                $this->addFlash('error', $error->getMessage());
            }
        }

        // Get dashboard statistics for the template
        $totalUsers = $userRepository->count([]);
        $activeUsers = $userRepository->count(['is_active' => true]);
        $playerUsers = $userRepository->count(['role' => 'player']);
        $organizerUsers = $userRepository->count(['role' => 'organizer']);

        return $this->render('admin_dashboard/users/new.html.twig', [
            'form' => $form->createView(),
            'totalUsers' => $totalUsers,
            'activeUsers' => $activeUsers,
            'playerUsers' => $playerUsers,
            'organizerUsers' => $organizerUsers
        ]);
    }

    #[Route('/admin/dashboard/users/{id}/edit', name: 'app_admin_dashboard_user_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, User $user, ManagerRegistry $doctrine, UserPasswordHasherInterface $passwordHasher, SluggerInterface $slugger, UserRepository $userRepository): Response
    {
        // Store original profile picture path before form handling
        $originalProfilePicture = $user->getProfilepicture();

        $form = $this->createForm(EditUserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                // Update the updatedat timestamp
                $user->setUpdatedat(new \DateTime());

                // Only hash password if a new password was provided
                $plainPassword = $form->get('password')->getData();
                if ($plainPassword) {
                    $hashedPassword = $passwordHasher->hashPassword($user, $plainPassword);
                    $user->setPassword($hashedPassword);
                }

                // Handle file upload only if a new file was provided
                $profilePictureFile = $form->get('profilepicture')->getData();
                if ($profilePictureFile) {
                    $newFilename = $this->handleFileUpload($profilePictureFile);
                    $user->setProfilepicture($newFilename);
                } else {
                    // If no new file was uploaded, ensure the original profile picture is kept
                    $user->setProfilepicture($originalProfilePicture);
                }

                $entityManager = $doctrine->getManager();
                $entityManager->persist($user);
                $entityManager->flush();

                $this->addFlash('success', 'User updated successfully!');
                return $this->redirectToRoute('app_admin_dashboard_users');
            } catch (\Exception $e) {
                $this->addFlash('error', 'Error updating user: ' . $e->getMessage());
            }
        } elseif ($form->isSubmitted() && !$form->isValid()) {
            // If form was submitted but validation failed, display errors
            $this->addFlash('error', 'Unable to update user. Please check the form for errors.');

            // Add specific validation errors as flash messages
            foreach ($form->getErrors(true) as $error) {
                $this->addFlash('error', $error->getMessage());
            }
        }

        // Get dashboard statistics for the template
        $totalUsers = $userRepository->count([]);
        $activeUsers = $userRepository->count(['is_active' => true]);
        $playerUsers = $userRepository->count(['role' => 'player']);
        $organizerUsers = $userRepository->count(['role' => 'organizer']);

        return $this->render('admin_dashboard/users/edit.html.twig', [
            'form' => $form->createView(),
            'user' => $user,
            'totalUsers' => $totalUsers,
            'activeUsers' => $activeUsers,
            'playerUsers' => $playerUsers,
            'organizerUsers' => $organizerUsers
        ]);
    }

    #[Route('/admin/dashboard/users/{id}/delete', name: 'app_admin_dashboard_user_delete', methods: ['DELETE', 'POST'])]
    public function delete(Request $request, User $user, ManagerRegistry $doctrine): Response
    {
        if ($this->isCsrfTokenValid('delete' . $user->getId(), $request->request->get('_token'))) {
            // Delete profile picture if exists
            $filename = $user->getProfilepicture();
            if ($filename) {
                $filePath = $this->getParameter('profile_pictures_directory') . '/' . $filename;
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }

            $entityManager = $doctrine->getManager();
            $entityManager->remove($user);
            $entityManager->flush();

            $this->addFlash('success', 'User deleted successfully!');
        }

        return $this->redirectToRoute('app_admin_dashboard_users');
    }

    #[Route('/admin/dashboard/users/{id}', name: 'app_admin_dashboard_user_show', methods: ['GET'])]
    public function show(User $user): Response
    {
        return $this->render('admin_dashboard/users/show.html.twig', [
            'user' => $user,
        ]);
    }

    private function handleFileUpload($file)
    {
        // Generate a unique filename
        $newFilename = md5(uniqid()).'.'.$file->guessExtension();
        $uploadDir = $this->getParameter('profile_pictures_directory');

        // Ensure the upload directory exists
        if (!file_exists($uploadDir)) {
            if (!mkdir($uploadDir, 0777, true)) {
                throw new \RuntimeException('Failed to create upload directory: ' . $uploadDir);
            }
        }

        // Move the file to the upload directory
        $file->move($uploadDir, $newFilename);
        return $newFilename;
    }
}
