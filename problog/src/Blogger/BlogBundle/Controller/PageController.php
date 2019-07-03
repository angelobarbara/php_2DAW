<?php

namespace Blogger\BlogBundle\Controller;
//namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Blogger\BlogBundle\Service\BlogHelper;
class PageController extends Controller
{
    /**
     * @Route("/",name="blog")
     */
    public function indexAction()
    {
        $em = $this -> getDoctrine() -> getManager();
        $blog = $em->getRepository('BloggerBlogBundle:Blog')
            ->getLatestBlogs();
        return $this->render('@BloggerBlog/Page/index.html.twig', array(
            'blogs' => $blog));
    }

    /**
     * @Route("/service", name="service")
     */
    public function serviceAction(BlogHelper $blogHelper){
        $em = $this -> getDoctrine() -> getManager();
        $blog = $blogHelper->creaIndex($em);
        return $this->render('@BloggerBlog/Page/index.html.twig', array(
            'blogs' => $blog));
    }

    /**
     * @Route("/about",name="about")
     */
    public function aboutAction()
    {
        return $this->render('@BloggerBlog/Page/about.html.twig');
    }
//    /**
//     * @Route("/contact",name="contact")
//     */
//    public function contactAction()
//    {
//        return $this->render('@BloggerBlog/Page/contact.html.twig');
//    }
}
