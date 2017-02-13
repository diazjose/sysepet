<?php

namespace PlataformaBundle\Controller;

use PlataformaBundle\Form\UsuariosType;
use PlataformaBundle\Entity\Usuarios;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;


class UsuarioController extends Controller
{

    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request) {


         $authenticationUtils = $this->get('security.authentication_utils');

                // obtener el error de login si hay
                $error = $authenticationUtils->getLastAuthenticationError();

                // último nombre de usuario introducido por el usuario
                $lastUsername = $authenticationUtils->getLastUsername();

         return $this->render('PlataformaBundle:Plataforma:login.html.twig', array('last_username' => $lastUsername, 'error' => $error));
    }

    /**
     * @Route("/login_check", name="check_login")
     */
    public function loginCheckAction()
    {

    }



     /**
     * @Route("/direccion/register", name="user_registration")
     */
    public function registerAction(Request $request)
    {
        // 1) Construye el formulario
        $user = new Usuarios();
        $form = $this->createForm(UsuariosType::class, $user);

        // 2) Manejamos el envío (sólo pasará con POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Codificamos el password (también se puede hacer a través de un Doctrine listener)
            $password = $this->get('security.password_encoder')
                ->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            // 4) Guardar el usuario
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            // ... hacer cualquier otra cosa, como enviar un email, etc
            // establecer un mensaje "flash" de éxito para el usuario

            return $this->redirectToRoute('user_list');
        }

        return $this->render(
            'PlataformaBundle:Plataforma:register.html.twig',
            array('form' => $form->createView())
        );
    }


    /**
     * @Route("/direccion/listado_usuarios", name="user_list" )
     */
    public function listuserAction()
    {
         
     	$em = $this->getDoctrine()->getManager();
    	$users = $em->getRepository('PlataformaBundle:Usuarios')->findAll();

        return $this->render('PlataformaBundle:Plataforma:user_list.html.twig', array('users' => $users ));

    	
    }
}	
 
