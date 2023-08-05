<?php

namespace App\Repository;

use App\Entity\PropertyDTO;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PropertyDTO>
 *
 * @method PropertyDTO|null find($id, $lockMode = null, $lockVersion = null)
 * @method PropertyDTO|null findOneBy(array $criteria, array $orderBy = null)
 * @method PropertyDTO[]    findAll()
 * @method PropertyDTO[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PropertyDTORepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PropertyDTO::class);
    }

//    /**
//     * @return PropertyDTO[] Returns an array of PropertyDTO objects
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

//    public function findOneBySomeField($value): ?PropertyDTO
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
