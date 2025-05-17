<?php

namespace App\Repository;

use App\Entity\Client;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * @extends ServiceEntityRepository<Client>
 */
class ClientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Client::class);
    }

    public function findPaginated(String $search = '', int $page = 1, int $limit = 10): Paginator {

        $query = $this->createQueryBuilder('c');

        if(!empty($search)){
            $query->where('c.nom LIKE :search OR c.prenom LIKE :search')
                ->setParameter('search', '%' . $search . '%');
        }

        $query->orderBy('c.id', 'ASC')
            ->setFirstResult(($page - 1) * $limit)
            ->setMaxResults($limit)
            ->getQuery();

        return new Paginator($query);
    }
}
