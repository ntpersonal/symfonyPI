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
    
    public function isTeamManager(Team $team,User $user): bool
    {
        return
            $user->getTeam()?->getId() === $team->getId()
            && $user->getRole() === 'organizer'
        ;
    }
 
    /**
     * Returns true if the team has any manager assigned
     */
    public function hasTeamManager(Team $team): bool
    {
        $managerCount = $this->entityManager->getRepository(Team::class)
            ->createQueryBuilder('t')
            ->select('COUNT(u.id)')
            ->join('t.users', 'u')  // Changed from 't.user' to 't.users'
            ->where('t.id = :teamid')
            ->andWhere('u.role LIKE :role')  // Using 'role' (singular) as in your entity
            ->setParameter('teamid', $team->getId())
            ->setParameter('role', '%ORGANIZER%')  // Changed to match your role values
            ->getQuery()
            ->getSingleScalarResult();

        return $managerCount > 0;
    }

    /**
     * Gets all teams that have at least one manager
     * @return Team[]
     */
    public function getManagedTeams(): array
    {
        return $this->entityManager->getRepository(Team::class)
            ->createQueryBuilder('t')
            ->join('t.user', 'u')
            ->where('u.role LIKE :role')
            ->setParameter('role', '%ROLE_ORGANIZER%')
            ->getQuery()
            ->getResult();
    }
}
