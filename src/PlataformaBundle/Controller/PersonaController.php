<?php

namespace PlataformaBundle\Controller;

use PlataformaBundle\Form\PersonasType;
use PlataformaBundle\Entity\Personas;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class PersonaController extends Controller
{
    /**
     * @Route("/persona/register", name="cargar_persona" )
     */
    public function registerAction(Request $request)
    {
    	// 1) Construye el formulario
        $persona = new Personas();
        $form = $this->createForm(PersonasType::class, $persona);

        // 2) Manejamos el envío (sólo pasará con POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 4) Guardar el usuario
            $em = $this->getDoctrine()->getManager();
            $em->persist($persona);
            $em->flush();

            $this->addFlash('mensaje', 'Se ha Creado una Persona Nueva');
            $id = $persona->getId();
            $dni = $persona->getDni();
            $apellido = $persona->getApellido();
            $nombre = $persona->getNombre();
            $direccion = $persona->getDireccion();

            // ... hacer cualquier otra cosa, como enviar un email, etc
            // establecer un mensaje "flash" de éxito para el usuario

            

            return $this->render('PlataformaBundle:Plataforma:form_persona.html.twig', ['id' => $id , 'apellido' => $apellido, 'nombre' => $nombre, 'direccion' =>$direccion, 'dni' => $dni]);
        }
            $id = '';
            $nombre = '';
            $apellido = '';
            $dni = '';
            $direccion = '';
        return $this->render(
            'PlataformaBundle:Plataforma:form_persona.html.twig',
            array('form' => $form->createView(), 'id' => $id , 'apellido' => $apellido, 'nombre' => $nombre, 'direccion' =>$direccion, 'dni' => $dni)
        );
 	
    }

    /**
     * @Route("/persona/buscar", name="buscar_persona" )
     */
    public function listuserAction(Request $request)
    {
        /* 
     	$em = $this->getDoctrine()->getManager();
    	$users = $em->getRepository('PlataformaBundle:Usuarios')->findAll();

        return $this->render('PlataformaBundle:Plataforma:user_list.html.twig', array('users' => $users ));
        */
        $query = $request->get('query');

        if (!empty($query)) {
            /*
            $finder = $this->container->get('fos_elastica.finder.app.user');
            $user = $finder->createPaginatorAdapter($query);
            */
            $em = $this->getDoctrine()->getEntityManager();
            $user = $em->getRepository('PlataformaBundle:Personas')->findByApellido($query);
        }
        else{
            $em = $this->getDoctrine()->getEntityManager();
            $dql = "SELECT e FROM PlataformaBundle:Personas e";
            $user = $em->createQuery($dql);    
        }
        
 
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($user, $request->query->getInt('page', 1), 5);
 
        return $this->render('PlataformaBundle:Plataforma:personas_listado.html.twig',
                array('pagination' => $pagination));
    	
    }

    /**
     * @Route("/persona/delete/{id}", name="delete_persona" )
     */
    public function deleteAction($id){

        $em = $this->getDoctrine()->getEntityManager();
        $user = $em->getRepository("PlataformaBundle:Personas")->find($id);

        
        if ($user) {
            $em->remove($user);
            $em->flush();
            $this->addFlash('mensaje', 'Persona Eliminada con Exito');
            return $this->redirectToRoute('buscar_persona');
        }

    }


}	
 
