<?php
namespace Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Blogger\BlogBundle\Services\BlogHelper;
use Blogger\BlogBundle\Entity\Blog;
use Blogger\BlogBundle\Form\BlogType;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends Controller
{
    /**
     * @Route ("/blog/{id}", name="show", requirements={"id"="\d+"})
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $blog = $em->getRepository('BloggerBlogBundle:Blog')->find($id);
        $comments = $em->getRepository('BloggerBlogBundle:Comment')
            ->getCommentsBlog($blog->getId());
        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }

        return $this->render('@BloggerBlog/Blog/show.html.twig', array(
            'blog'      => $blog,
            'comments' => $comments
        ));
    }

    //Función que genera el formulario y lo muestra en el render.
    /**
     * @Route("/blog/new", name="newBlog"))
     */
    public function newAction()
    {
        $blog = new Blog();
        $form = $this->createForm(BlogType::class, $blog);
        return $this->render('@BloggerBlog/Blog/createBlog.html.twig', array(
            'blog' => $blog,
            'form' => $form->createView()
        ));
    }

    //Función que persiste el formulario generado y redirige a su entrada. Importante el name
    // que debe ser único, e indicarle el método.
    /**
     * @Route("/blog/", name="createBlog", methods={"POST"}))
     */
    public function createAction(Request $request)
    {
        $blog = new Blog();
        $form = $this->createForm(BlogType::class, $blog);
        $form->handleRequest($request);

        $file = $blog->getImage();
        $fileName = md5(uniqid()).'.'.$file->guessExtension();

        $fileDir = $this->container->getparameter('kernel.root_dir').'/../web/images';
        $file->move($fileDir, $fileName);

        $blog->setImage($fileName);

        //Controlamos que el formulario esté enviado y sea válido.
        if ($form->isSubmitted() && $form->isValid()) {

            //Persistencia en la BD
            $em = $this->getDoctrine()
                ->getManager();
            $em->persist($blog);
            $em->flush();

            // Redirección y visualización de los datos persistidos.
            return $this->redirect($this->generateUrl('show', array(
                'id' => $blog->getId()))
            );
        }

        return $this->render('@BloggerBlog/Blog/createBlog.html.twig', array(
            'blog' => $blog,
            'form' => $form->createView()
        ));
    }
}

?>