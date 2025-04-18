<?php

namespace App\Controller;

use App\Entity\Reclamation;
use App\Entity\User;
use App\Entity\Answer;
use App\Form\ReclamationType;
use App\Form\AnswerType;
use App\Repository\ReclamationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/reclamation')]
class ReclamationController extends AbstractController
{
    #[Route('/', name: 'reclamation_index', methods: ['GET'])]
    public function index(ReclamationRepository $reclamationRepository): Response
    {
        return $this->render('reclamation/index.html.twig', [
            'reclamations' => $reclamationRepository->findAll(),
        ]);
    }
    #[Route('/my', name: 'app_reclamation_my')]
public function myReclamations(ReclamationRepository $reclamationRepository): Response
{
    $user = $this->getUser();

    // ✅ Still correct to use 'user' here (because it's the PHP property)
    $reclamations = $reclamationRepository->findBy(
        ['user' => $user],
        ['created_at' => 'DESC']
    );

    return $this->render('reclamation/user_reclamations.html.twig', [
        'reclamations' => $reclamations
    ]);
}


    #[Route('/new', name: 'reclamation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $reclamation = new Reclamation();
        $form = $this->createForm(ReclamationType::class, $reclamation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reclamation->setCreatedAt(new \DateTimeImmutable());
            $em->persist($reclamation);
            $em->flush();

            return $this->redirectToRoute('reclamation_index');
        }

        return $this->render('reclamation/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'reclamation_show', methods: ['GET', 'POST'])]
    public function show(Reclamation $reclamation, Request $request, EntityManagerInterface $em): Response
    {
        // Prepare a new Answer object
        $answer = new Answer();
        $answer->setReclamation($reclamation);
        $answer->setAdmin($this->getUser());
    
        // Create the form
        $form = $this->createForm(AnswerType::class, $answer);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($answer);
            $em->flush();
    
            $this->addFlash('success', 'Réponse ajoutée avec succès.');
            return $this->redirectToRoute('reclamation_show', ['id' => $reclamation->getId()]);
        }
    
        return $this->render('reclamation/show.html.twig', [
            'reclamation' => $reclamation,
            'form' => $form->createView(), // 🔥 This line is what was missing
        ]);
    }
    #[Route('/front/{id}', name: 'reclamation_show2', methods: ['GET', 'POST'])]
    public function show2(Reclamation $reclamation, Request $request, EntityManagerInterface $em): Response
    {
        // Prepare a new Answer object
        $answer = new Answer();
        $answer->setReclamation($reclamation);
        $answer->setAdmin($this->getUser());
    
        // Create the form
        $form = $this->createForm(AnswerType::class, $answer);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($answer);
            $em->flush();
    
            $this->addFlash('success', 'Réponse ajoutée avec succès.');
            return $this->redirectToRoute('reclamation_show2', ['id' => $reclamation->getId()]);
        }
    
        return $this->render('reclamation/show2.html.twig', [
            'reclamation' => $reclamation,
            'form' => $form->createView(), // 🔥 This line is what was missing
        ]);
    }
    

    #[Route('/{id}/edit', name: 'reclamation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Reclamation $reclamation, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(ReclamationType::class, $reclamation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            return $this->redirectToRoute('reclamation_index');
        }

        return $this->render('reclamation/edit.html.twig', [
            'form' => $form->createView(),
            'reclamation' => $reclamation,
        ]);
    }

    #[Route('/{id}', name: 'reclamation_delete', methods: ['POST'])]
    public function delete(Request $request, Reclamation $reclamation, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete' . $reclamation->getId(), $request->request->get('_token'))) {
            $em->remove($reclamation);
            $em->flush();
        }

        return $this->redirectToRoute('reclamation_index');
    }
    #[Route('/front/{id}', name: 'reclamation_delete2', methods: ['POST'])]
    public function delete2(Request $request, Reclamation $reclamation, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete2' . $reclamation->getId(), $request->request->get('_token'))) {
            $em->remove($reclamation);
            $em->flush();
        }

        return $this->redirectToRoute('app_reclamation_my');
    }

    #[Route('/user/{id}', name: 'reclamation_by_user', methods: ['GET'])]
    public function byUser(User $user, ReclamationRepository $repo): Response
    {
        $reclamations = $repo->findBy(['user' => $user]);

        return $this->render('reclamation/user_list.html.twig', [
            'reclamations' => $reclamations,
            'user' => $user,
        ]);
    }
    #[Route('/front/dashboard/contact', name: 'app_front_office_contact')]
public function newFromFront(Request $request, EntityManagerInterface $em): Response
{
    $reclamation = new Reclamation();

    // Get current user from session
    $user = $this->getUser();
    $reclamation->setUser($user);
    $reclamation->setCreatedAt(new \DateTime());

    $form = $this->createForm(ReclamationType::class, $reclamation);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $em->persist($reclamation);
        $em->flush();

        $this->addFlash('success', 'Votre réclamation a été envoyée avec succès.');

        return $this->redirectToRoute('app_front_office_contact');
    }

    return $this->render('front_office_dashboard/contact.html.twig', [
        'form' => $form->createView(),
    ]);
}


}
