<?php

namespace App\Repository;

use App\Entity\Dishes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Dishes>
 *
 * @method Dishes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Dishes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Dishes[]    findAll()
 * @method Dishes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DishRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Dishes::class);
    }

    public function save(Dishes $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Dishes $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Dish[] Returns an array of Dish objects
//     */
//    public function findByCategory($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.title = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Dish
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
