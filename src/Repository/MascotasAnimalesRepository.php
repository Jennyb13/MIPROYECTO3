<?php

namespace App\Repository;

use App\Entity\MascotasAnimales;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MascotasAnimales>
 *
 * @method MascotasAnimales|null find($id, $lockMode = null, $lockVersion = null)
 * @method MascotasAnimales|null findOneBy(array $criteria, array $orderBy = null)
 * @method MascotasAnimales[]    findAll()
 * @method MascotasAnimales[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MascotasAnimalesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MascotasAnimales::class);
    }

//    /**
//     * @return MascotasAnimales[] Returns an array of MascotasAnimales objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?MascotasAnimales
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
