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

    // src/Repository/EmployeRepository.php
    public function countDisponibles(): int
    {
        $sub = $this->_em->createQueryBuilder()
            ->select('e2.id')
            ->from('App\Entity\Employe', 'e2')
            ->innerJoin('e2.reparations', 'r2')
            ->where('r2.status = :status')
            ->getDQL();

        return $this->createQueryBuilder('e')
            ->select('COUNT(e.id)')
            ->where("e.id NOT IN ($sub)")
            ->setParameter('status', 'en_cours')
            ->getQuery()
            ->getSingleScalarResult();
    }


}
