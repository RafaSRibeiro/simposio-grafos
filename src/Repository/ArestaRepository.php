<?php

namespace App\Repository;

use App\Entity\Aresta;
use App\Entity\Grafo;
use App\Entity\Vertice;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Aresta|null find($id, $lockMode = null, $lockVersion = null)
 * @method Aresta|null findOneBy(array $criteria, array $orderBy = null)
 * @method Aresta[]    findAll()
 * @method Aresta[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArestaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Aresta::class);
    }

    public function findByGrafoAndOrigem(Grafo $grafo, Vertice $origem) {
        return $this->createQueryBuilder('aresta')
            ->join('aresta.grafos', 'grafo')
            ->where('aresta.origem = :origem')
            ->andWhere('grafo = :grafo')
            ->setParameter('grafo', $grafo)
            ->setParameter('origem', $origem)
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return Aresta[] Returns an array of Aresta objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Aresta
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
