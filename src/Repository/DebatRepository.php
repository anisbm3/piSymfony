<?php

namespace App\Repository;

use App\Entity\Debat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Debat>
 *
 * @method Debat|null find($id, $lockMode = null, $lockVersion = null)
 * @method Debat|null findOneBy(array $criteria, array $orderBy = null)
 * @method Debat[]    findAll()
 * @method Debat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DebatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Debat::class);
    }

//    /**
//     * @return Debat[] Returns an array of Debat objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Debat
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
public function SortByNomAnime()
{
    return $this->createQueryBuilder('e')
        ->orderBy('e.nom_anime','ASC')
        ->getQuery()
        ->getResult()
        ;
}
public function SortByNoteAnime(){
    return $this->createQueryBuilder('e')
        ->orderBy('e.noteanimes','ASC')
        ->getQuery()
        ->getResult()
        ;
}


public function findByNomAnime( $NomAnime)
{
    return $this-> createQueryBuilder('e')
        ->andWhere('e.nom_anime LIKE :NomAnime')
        ->setParameter('NomAnime','%' .$NomAnime. '%')
        ->getQuery()
        ->execute();
}



public function findByNoteAnime( $NoteAnime)
{
    return $this-> createQueryBuilder('e')
        ->andWhere('e.noteanimes LIKE :NoteAnime')
        ->setParameter('NoteAnime','%' .$NoteAnime. '%')
        ->getQuery()
        ->execute();
}
}