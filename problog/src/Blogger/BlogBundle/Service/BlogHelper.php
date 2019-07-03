<?php
/**
 * Created by PhpStorm.
 * User: marco
 * Date: 14/02/2019
 * Time: 8:33
 */
namespace Blogger\BlogBundle\Service;
class BlogHelper
{
    public function creaIndex($em){

        return $em->getRepository('BloggerBlogBundle:Blog')->getLatestBlogs();
    }
}