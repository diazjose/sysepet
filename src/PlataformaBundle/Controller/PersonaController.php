<?php

namespace PlataformaBundle\Controller;

use PlataformaBundle\Form\PersonasType;
use PlataformaBundle\Entity\Personas;
use PlataformaBundle\Entity\Alumnos;
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
     * @Route("/alumno/buscar", name="buscar_alumno" )
     */
    public function listalumnoAction(Request $request)
    {
        $que = $request->get('query');

        if (!empty($que)) {
            
            $em = $this->getDoctrine()->getManager();
            $dql = "select a, p from PlataformaBundle:Personas a
                    join a.alumno p
                    where a.dni=:dni";
            $query = $em->createQuery($dql);
            $query->setParameter('dni', $que);
            $user = $query->getResult();        

            if ($user) {
                            
            }
            else{
                $dql = "select a, p from PlataformaBundle:Personas a
                    join a.alumno p
                    where a.apellido=:apellido";
                $query = $em->createQuery($dql);
                $query->setParameter('apellido', $que);
                $user = $query->getResult();        
                  
            }

            $paginator = $this->get('knp_paginator');
            $pagination = $paginator->paginate($user, $request->query->getInt('page', 1), 5);
                                   
        }
        else{
            $pagination = '';
        }
        
 
        
 
        return $this->render('PlataformaBundle:Plataforma:personas_listado.html.twig',
                array('pagination' => $pagination));
    	
    }

    /**
     * @Route("/persona/delete/{id}", name="delete_persona" )
     */
    public function deleteAction($id){

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository("PlataformaBundle:Personas")->find($id);

        
        if ($user) {
            $em->remove($user);
            $em->flush();
            $this->addFlash('mensaje', 'Persona Eliminada con Exito');
            return $this->redirectToRoute('buscar_persona');
        }

    }

    


}	
 
