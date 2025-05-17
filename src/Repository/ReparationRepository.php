<?php

namespace App\Repository;

use App\Entity\Reparation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * @extends ServiceEntityRepository<Reparation>
 */
class ReparationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reparation::class);
    }

    public function findPaginated(String $search = '', int $page = 1, int $limit = 10): Paginator {
        
        $query = $this->createQueryBuilder('r');

        if(!empty($search)){
            $query->where('r.description LIKE :search')
                ->setParameter('search', '%' . $search . '%');
        }

        $query->orderBy('r.id', 'ASC')
            ->setFirstResult(($page -1) * $limit)
            ->setMaxResults($limit)
            ->getQuery();
        
        return new Paginator($query);
    }

}
