<?php

namespace App\Repository;

use App\Entity\Evenement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Evenement>
 *
 * @method Evenement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Evenement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Evenement[]    findAll()
 * @method Evenement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EvenementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Evenement::class);
    }

//    /**
//     * @return Evenement[] Returns an array of Evenement objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Evenement
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }



public function SortByNomEvent(){
    return $this->createQueryBuilder('e')
        ->orderBy('e.NomEvent','ASC')
        ->getQuery()
        ->getResult()
        ;
}

public function SortByLieuEvent()
{
    return $this->createQueryBuilder('e')
        ->orderBy('e.LieuEvent','ASC')
        ->getQuery()
        ->getResult()
        ;
}


public function SortByDateEvent()
{
    return $this->createQueryBuilder('e')
        ->orderBy('e.DateEvent','ASC')
        ->getQuery()
        ->getResult()
        ;
}

public function findByNomEvent( $NomEvent)
{
    return $this-> createQueryBuilder('e')
        ->andWhere('e.NomEvent LIKE :NomEvent')
        ->setParameter('NomEvent','%' .$NomEvent. '%')
        ->getQuery()
        ->execute();
}
public function findByLieuEvent( $LieuEvent)
{
    return $this-> createQueryBuilder('e')
        ->andWhere('e.LieuEvent LIKE :LieuEvent')
        ->setParameter('LieuEvent','%' .$LieuEvent. '%')
        ->getQuery()
        ->execute();
}
public function findByDateEvent( $DateEvent)
{
    return $this-> createQueryBuilder('e')
        ->andWhere('e.DateEvent LIKE :DateEvent')
        ->setParameter('DateEvent','%' .$DateEvent. '%')
        ->getQuery()
        ->execute();
}

}
