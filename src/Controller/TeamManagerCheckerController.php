<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Team;
use App\Entity\User;
final class TeamManagerCheckerController extends AbstractController
{
    public function __construct(private EntityManagerInterface $entityManager) {}
    
    public function isTeamManager(Team $team): bool
    {
        $manager = $this->entityManager->getRepository(User::class)
            ->createQueryBuilder('u')
            ->where('u.team = :team')
            ->andWhere('u.role LIKE :role')
            ->setParameter('team', $team)
            ->setParameter('role', '%ROLE_MANAGER%')
            ->getQuery()
            ->getOneOrNullResult();

        return $manager !== null;
    }
}
