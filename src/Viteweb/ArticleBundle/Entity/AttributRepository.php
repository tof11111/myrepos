<?php

namespace Viteweb\ArticleBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * AttributRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AttributRepository extends EntityRepository
{
    public function getValidAttribute(){
       return $this->createQueryBuilder('c')->where('c.state=1');
    }
}