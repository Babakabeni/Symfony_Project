<?php

namespace App\Repository;

use App\Entity\Property;
use App\Entity\PropertyDTO;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Migrations\Query\Query;
use Doctrine\ORM\Query as ORMQuery;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Property>
 *
 * @method Property|null find($id, $lockMode = null, $lockVersion = null)
 * @method Property|null findOneBy(array $criteria, array $orderBy = null)
 * @method Property[]    findAll()
 * @method Property[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PropertyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Property::class);
    }

    /**
     * @return Query
     */

    public function findAllVisibleQuery(PropertyDTO $search): ORMQuery
    {
        $query = $this->findVisibleQuery();
        if($search->getMaxPrice()){
        $query = $query
                ->andWhere('p.Price <= :maxprice')
                ->setParameter('maxprice', $search->getMaxPrice());
        }
        if($search->getMinSurface()){
            $query = $query
                    ->andWhere('p.Surface <= :minsurface')
                    ->setParameter('minsurface', $search->getMinSurface());
            }
        return $query->getQuery();
    }

    /**
     * @return Property[]
     */

    public function findlatest(): array
    {
        return $this->findVisibleQuery()
            ->setMaxResults(maxResults:4)
            ->getQuery()
            ->getResult();
    }

    private function findVisibleQuery(): QueryBuilder
    {
        return $this->createQueryBuilder(alias:'p')
        ->where(predicates:'p.Sold = false');
    }
//    /**
//     * @return Property[] Returns an array of Property objects
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

//    public function findOneBySomeField($value): ?Property
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
