<?php

namespace App\Repository;

use App\Entity\Tables;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Tables>
 *
 * @method Tables|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tables|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tables[]    findAll()
 * @method Tables[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TablesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tables::class);
    }

    public function save(Tables $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Tables $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @return Tables[] Returns an array of Tables objects
     */
    public function findAllTableFree($value): array
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.free = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(20)
            ->getQuery()
            ->getResult()
        ;
    }

//    public function findOneTableFree($value): ?Tables
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.free = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
