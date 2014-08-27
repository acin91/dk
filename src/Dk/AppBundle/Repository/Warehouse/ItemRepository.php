<?php

namespace Dk\AppBundle\Repository\Warehouse;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;

/**
 * @author Zmicier Aliakseyeu <z.aliakseyeu@gmail.com>
 */
class ItemRepository extends EntityRepository
{
    /**
     * @return array
     */
    public function getAll()
    {
        $qb = $this->createQueryBuilder('i');

        return $qb->getQuery()->getResult(Query::HYDRATE_ARRAY);
    }

    /**
     * @param int $id
     * @return \Dk\AppBundle\Entity\Warehouse\Item
     */
    public function get($id)
    {
        $qb = $this->createQueryBuilder('i');

        $qb
            ->andWhere('i.id = :id')
            ->setParameter('id', $id)
        ;

        $items = $qb->getQuery()->getResult();

        if (count($items) > 0) {
            return $items[0];
        }

        return null;
    }
}