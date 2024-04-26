<?php

namespace App\Repository;

use App\Entity\Produits;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Produits>
 *
 * @method Produits|null find($id, $lockMode = null, $lockVersion = null)
 * @method Produits|null findOneBy(array $criteria, array $orderBy = null)
 * @method Produits[]    findAll()
 * @method Produits[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Produits::class);
    }
    public function findAllSorted($tri)
    {
        // Ajoutez votre logique de tri ici, en fonction du critère $tri
        $query = $this->createQueryBuilder('p');

        switch ($tri) {
            case 'nom':
                $query->orderBy('p.Nom', 'ASC');
                break;
            case 'prix':
                $query->orderBy('p.Prix', 'ASC');
                break;
            // Ajoutez d'autres cas de tri si nécessaire
            default:
                $query->orderBy('p.nom', 'ASC');
                break;
        }

        return $query->getQuery()->getResult();
    }

    public function findProduitByNom(string $nomProduit): ?Produits
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.Nom = :nom')
            ->setParameter('nom', $nomProduit)
            ->getQuery()
            ->getOneOrNullResult();
    }
    public function findProduitsEnRupture()
    {
        return $this->createQueryBuilder('p')
            ->where('p.Stock < :stockMin')
            ->setParameter('stockMin', 5)
            ->getQuery()
            ->getResult();
    }
//    /**
//     * @return Produits[] Returns an array of Produits objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Produits
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }



public function searchAndSort($nom, $tri)
{
    return $this->createQueryBuilder('p')
        ->andWhere('p.Nom LIKE :nom')
        ->setParameter('nom', '%'.$nom.'%')
        ->orderBy('p.'.$tri)
        ->getQuery()
        ->getResult();
}


}
