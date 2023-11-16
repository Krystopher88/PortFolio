<?php

namespace App\Repository;

use App\Entity\ScreensProject;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ScreensProject>
 *
 * @method ScreensProject|null find($id, $lockMode = null, $lockVersion = null)
 * @method ScreensProject|null findOneBy(array $criteria, array $orderBy = null)
 * @method ScreensProject[]    findAll()
 * @method ScreensProject[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScreensProjectRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ScreensProject::class);
    }

//    /**
//     * @return ScreensProject[] Returns an array of ScreensProject objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ScreensProject
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
