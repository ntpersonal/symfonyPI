<?php
// src/Controller/MatchesController.php

namespace App\Controller;

use App\Entity\Matches;
use App\Form\MatchesType;
use App\Repository\MatchesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/dashborad/matches')]
class MatchesController extends AbstractController
{
    #[Route('/', name: 'app_matches_index', methods: ['GET'])]
    public function index(
        Request $request,
        MatchesRepository $matchesRepository,
        PaginatorInterface $paginator
    ): Response {
        $searchTerm = $request->query->get('q', '');
        $qb = $matchesRepository->createQueryBuilder('m')
            ->orderBy('m.matchTime', 'DESC');

        if ($searchTerm !== '') {
            $qb->andWhere('m.teamAName LIKE :term OR m.teamBName LIKE :term')
               ->setParameter('term', '%' . $searchTerm . '%');
        }

        $pagination = $paginator->paginate(
            $qb->getQuery(),
            $request->query->getInt('page', 1),
            10
        );

        if ($request->isXmlHttpRequest()) {
            return $this->render('matches/_matches_table.html.twig', [
                'matches' => $pagination,
            ]);
        }

        return $this->render('matches/index.html.twig', [
            'matches' => $pagination,
        ]);
    }

    #[Route('/new', name: 'app_matches_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $match = new Matches();
        $form  = $this->createForm(MatchesType::class, $match);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($match);
            $entityManager->flush();

            return $this->redirectToRoute('app_matches_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('matches/new.html.twig', [
            'match' => $match,
            'form'  => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_matches_show', methods: ['GET'])]
    public function show(Matches $match): Response
    {
        return $this->render('matches/show.html.twig', [
            'match' => $match,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_matches_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Matches $match, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MatchesType::class, $match);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            return $this->redirectToRoute('app_matches_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('matches/edit.html.twig', [
            'match' => $match,
            'form'  => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_matches_delete', methods: ['POST'])]
    public function delete(Request $request, Matches $match, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$match->getId(), $request->request->get('_token'))) {
            $entityManager->remove($match);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_matches_index', [], Response::HTTP_SEE_OTHER);
    }
}
