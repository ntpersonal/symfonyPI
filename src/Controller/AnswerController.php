<?php

namespace App\Controller;

use App\Entity\Answer;
use App\Entity\Reclamation;
use App\Form\AnswerType;
use App\Repository\AnswerRepository;
use App\Repository\ReclamationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

#[Route('/answer')]
class AnswerController extends AbstractController
{
    #[Route('/create/{id}', name: 'answer_create', methods: ['GET', 'POST'])]
    public function create(Reclamation $reclamation, Request $request, EntityManagerInterface $em): Response
    {
        $answer = new Answer();
        $answer->setReclamation($reclamation);
        $answer->setAdmin($this->getUser());

        $form = $this->createForm(AnswerType::class, $answer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($answer);
            $em->flush();

            $this->addFlash('success', 'Answer submitted successfully.');

            return $this->redirectToRoute('reclamation_show', ['id' => $reclamation->getId()]);
        }

        return $this->render('answer/create.html.twig', [
            'form' => $form->createView(),
            'reclamation' => $reclamation,
        ]);
    }

    #[Route('/edit/{id}', name: 'answer_edit', methods: ['GET', 'POST'])]
    public function edit(Answer $answer, Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(AnswerType::class, $answer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();

            $this->addFlash('success', 'Answer updated successfully.');

            return $this->redirectToRoute('reclamation_show', ['id' => $answer->getReclamation()->getId()]);
        }

        return $this->render('answer/edit.html.twig', [
            'form' => $form->createView(),
            'answer' => $answer
        ]);
    }

    #[Route('/delete/{id}', name: 'answer_delete', methods: ['POST'])]
    public function delete(Answer $answer, EntityManagerInterface $em): Response
    {
        $reclamationId = $answer->getReclamation()->getId();

        $em->remove($answer);
        $em->flush();

        $this->addFlash('success', 'Answer deleted successfully.');

        return $this->redirectToRoute('reclamation_show', ['id' => $reclamationId]);
    }
    #[Route('/delete2/{id}', name: 'answer_delete2', methods: ['POST'])]
    public function delete2(Answer $answer, EntityManagerInterface $em): Response
    {
        $reclamationId = $answer->getReclamation()->getId();

        $em->remove($answer);
        $em->flush();

        $this->addFlash('success', 'Answer deleted successfully.');

        return $this->redirectToRoute('reclamation_show', ['id' => $reclamationId]);
    }

    #[Route('/reclamation/{id}', name: 'answer_by_reclamation', methods: ['GET'])]
    public function listByReclamation(Reclamation $reclamation, AnswerRepository $answerRepository): Response
    {
        $answers = $answerRepository->findBy(['reclamation' => $reclamation]);

        return $this->render('answer/list.html.twig', [
            'reclamation' => $reclamation,
            'answers' => $answers,
        ]);
    }
}
