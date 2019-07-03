<?php

namespace Blogger\BlogBundle\Controller;
//namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class TagController extends Controller
{

    public function sidebarAction()
    {
        $em = $this->getDoctrine()
            ->getManager();
        $tags = $em->getRepository('BloggerBlogBundle:Blog')
            ->getTags();
        $tagWeights = $em->getRepository('BloggerBlogBundle:Blog')
            ->getTagWeights($tags);
//         return $this->render('@BloggerBlog/Page/sidebar.html.twig', array(
//             'tags' => $tagWeights
//         ));
        $commentLimit   = $this->container
            ->getParameter('blogger_blog.comments.latest_comment_limit');
        $latestComments = $em->getRepository('BloggerBlogBundle:Comment')
            ->getLatestComments($commentLimit);

        return $this->render('@BloggerBlog/Page/sidebar.html.twig', array(
            'tags'              => $tagWeights,
            'latestComments'    => $latestComments

        ));

    }
}
?>