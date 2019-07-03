<?php
/**
 * Created by PhpStorm.
 * User: marco
 * Date: 14/02/2019
 * Time: 10:02
 */

namespace Blogger\BlogBundle\Repository;
use Doctrine\ORM\EntityRepository;

class CommentRepository extends EntityRepository{

    public function getCommentsBlog($blogId, $approved = true){
        $gb = $this->createQueryBuilder('c')->select('c')->
        where('c.blog= :blog_id')->addOrderBy('c.created')
            ->setParameter('blog_id',$blogId);

        if(false === is_null($approved))
            $gb->andWhere('c.approved = :approved')->setParameter('approved',$approved);

        return $gb->getQuery()->getResult();
    }
    public function getLatestComments($limit = 10)
    {
        $qb = $this->createQueryBuilder('c')
            ->select('c')
            ->addOrderBy('c.id', 'DESC');

        if (false === is_null($limit))
            $qb->setMaxResults($limit);

        return $qb->getQuery()
            ->getResult();
    }
}