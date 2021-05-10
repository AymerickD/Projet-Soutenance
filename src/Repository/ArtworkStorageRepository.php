<?php

namespace App\Repository;

use App\Entity\ArtworkStorage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ArtworkStorage|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArtworkStorage|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArtworkStorage[]    findAll()
 * @method ArtworkStorage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArtworkStorageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArtworkStorage::class);
    }

    // /**
    //  * @return ArtworkStorage[] Returns an array of ArtworkStorage objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ArtworkStorage
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
