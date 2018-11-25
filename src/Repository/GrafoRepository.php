<?php

namespace App\Repository;

use App\Entity\Grafo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Grafo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Grafo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Grafo[]    findAll()
 * @method Grafo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GrafoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Grafo::class);
    }

    // /**
    //  * @return Grafo[] Returns an array of Grafo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Grafo
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
