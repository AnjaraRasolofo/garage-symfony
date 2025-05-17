<?php

namespace App\Repository;

use App\Entity\Employe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * @extends ServiceEntityRepository<Employe>
 */
class EmployeRepository extends ServiceEntityRepository
{
    
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Employe::class);
    }

    public function findPaginated(String $search = '', int $page = 0, int $limit = 10): Paginator {

        $query = $this->createQueryBuilder('e');

        if(!empty($search)){
            $query->where('e.nom LIKE :search OR e.prenom LIKE :search OR e.poste LIKE :search')
                ->setParameter('search', '%' .$search. '%');
        }

        $query->orderBy('e.prenom', 'ASC')
            ->setFirstResult(($page - 1) * $limit)
            ->setMaxResults($limit)
            ->getQuery();

        return new Paginator($query);
    }

}
