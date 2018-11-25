<?php

namespace App\Repository;

use App\Entity\Localidade;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Localidade|null find($id, $lockMode = null, $lockVersion = null)
 * @method Localidade|null findOneBy(array $criteria, array $orderBy = null)
 * @method Localidade[]    findAll()
 * @method Localidade[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LocalidadeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Localidade::class);
    }

    // /**
    //  * @return Localidade[] Returns an array of Localidade objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Localidade
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
