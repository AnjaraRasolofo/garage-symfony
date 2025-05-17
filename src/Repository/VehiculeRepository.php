<?php

namespace App\Repository;

use App\Entity\Vehicule;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * @extends ServiceEntityRepository<Vehicule>
 */
class VehiculeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vehicule::class);
    }

    public function findPaginated(int $page = 1, int $limit = 10): Paginator {

        $query = $this->createQueryBuilder('v')
            ->orderBy('v.id', 'ASC')
            ->setFirstResult(($page - 1) *$limit)
            ->setMaxResults($limit)
            ->getQuery();

        return new Paginator($query);
    }

    public function findPaginatedByCriteria(String $search = '', int $page = 1, int $limit = 10): Paginator {
        
        $query = $this->createQueryBuilder('v');

        if(!empty($search)) {
           
            $query->where('v.immatriculation LIKE :search OR v.marque LIKE :search OR v.modele LIKE :search')
            ->setParameter('search', '%' . $search . '%');
        }
        
        $query->orderBy('v.id', 'ASC')
            ->setFirstResult(($page - 1) * $limit)
            ->setMaxResults($limit)
            ->getQuery();

        return new Paginator($query);
    }

}
