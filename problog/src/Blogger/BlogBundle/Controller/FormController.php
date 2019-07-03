<?php

namespace Blogger\BlogBundle\Controller;
//namespace AppBundle\Controller;

use Blogger\BlogBundle\Entity\Usuario;
use Blogger\BlogBundle\Form\UsuarioType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Blogger\BlogBundle\Entity\Enquire;
use Blogger\BlogBundle\Form\EnquiryType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class FormController extends Controller
{
    /**
     * @Route("/contact",name="contact")
     */
    public function contactAction(Request $request)
    {
        $enquiry = new Enquire();
        $form = $this->createForm(EnquiryType::class, $enquiry);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $message = \Swift_Message::newInstance()
                    ->setSubject('Contact enquiry from symblog')
//                    ->serFrom('marcosgallardoperez@gmail.com')
//                    ->setTo('marcosgallardoperez@gmail.com')
                    ->setBody($this->renderView('@BloggerBlog/contactEmail.txt.twig', array('enquiry' => $enquiry)));
                $this->get('mailer')->send($message);
                $this->addFlash('notice', 'Mensaje enviado');
            }
        }


        return $this->render('@BloggerBlog/Page/contact.html.twig', array(
            'form' => $form->createView()));
    }


    /**
     * @Route("/registro",name="registro")
     */
    public function nuevoUsuarioAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $usuario = new Usuario();
        $form = $this->createForm(UsuarioType::class, $usuario);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                // 3) Encode the password (you could also do this via Doctrine listener)
                $password = $passwordEncoder->encodePassword($usuario, $usuario->getPlainPassword());
                $usuario->setPassword($password);

                $usuario->setUsername($usuario->getEmail());

                // 4) save the User!
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($usuario);
                $entityManager->flush();

                // ... do any other work - like sending them an email, etc
                // maybe set a "flash" success message for the user

                return $this->redirectToRoute('login');
            }
        }

        return $this->render('@BloggerBlog/Page/nuevoUsuario.html.twig', array(
            'form' => $form->createView()));
    }

    /**
     * @Route("/login",name="login")
     */
    public function loginAction(Request $request,AuthenticationUtils $authenticationUtils)
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('@BloggerBlog/Page/login.html.twig',[
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }
}
