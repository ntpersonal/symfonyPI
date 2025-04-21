<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<User>
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    // Ensure no queries reference 'isActive' or 'is_active'.

    public function findAllUsers()
    {
        $queryBuilder = $this->createQueryBuilder('u');
        $queryBuilder->select('u.id', 'u.firstname', 'u.lastname', 'u.email', 'u.password', 'u.role', 'u.profilepicture')
                     ->from('App\Entity\User', 'u');
        return $queryBuilder->getQuery()->getResult();
    }
}
