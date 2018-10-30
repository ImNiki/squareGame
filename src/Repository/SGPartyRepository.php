<?php

namespace App\Repository;

use App\Entity\SGParty;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SGParty|null find($id, $lockMode = null, $lockVersion = null)
 * @method SGParty|null findOneBy(array $criteria, array $orderBy = null)
 * @method SGParty[]    findAll()
 * @method SGParty[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SGPartyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SGParty::class);
    }

//    /**
//     * @return SGParty[] Returns an array of SGParty objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SGParty
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
