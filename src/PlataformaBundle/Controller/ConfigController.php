<?php

namespace PlataformaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use PlataformaBundle\Entity\Config_curso;
use PlataformaBundle\Entity\Config_inscripcion;
use PlataformaBundle\Form\Config_inscripcionType;



class ConfigController extends Controller
{
    /**
     * @Route("/config/curso", name="view_config")
     */
    public function viewAction(){

    	$anio = date('Y');
    	$em = $this->getDoctrine()->getManager();
    	$curso = $em->getRepository('PlataformaBundle:Config_curso')->findByAnio($anio, array('curso' => 'ASC', 'division' => 'ASC'));

    	return $this->render('PlataformaBundle:Plataforma:config_curso.html.twig', ['cursos' => $curso]);
    }

    /**
     * @Route("/config/insert_curso", name="insert_curso")
     */
    public function insertAction(Request $request){

    	$cursos = new Config_curso();

    	if ($request->get('curso')) {
   			
   			$anio = date('Y');
	   		$em = $this->getDoctrine()->getManager();
	   		
	   		$cur = $request->get('curso');
	   		$division = $request->get('division');

	   		$existe = $em->getRepository('PlataformaBundle:Config_curso')->findBy(array('curso' => $cur, 'division' => $division));	

			if ($existe) {
				$curso = $em->getRepository('PlataformaBundle:Config_curso')->findByAnio($anio, array('curso' => 'ASC', 'division' => 'ASC'));
				$this->addFlash('mensaje', 'El Curso ya esta cargado');
	            return $this->render('PlataformaBundle:Plataforma:config_curso.html.twig', ['cursos' => $curso]);

			}
			else{

				$cursos->setCurso($cur);
	    		$cursos->setDivision($division);
	    		$cursos->setCantidad($request->get('cantidad'));
	    		
	    		
	    		$cursos->setAnio($anio);

	    		$em = $this->getDoctrine()->getManager();
	            $em->persist($cursos);
	            $em->flush(); 
	          
	            $curso = $em->getRepository('PlataformaBundle:Config_curso')->findByAnio($anio, array('curso' => 'ASC', 'division' => 'ASC'));
	    		$this->addFlash('mensaje', 'Curso cargado con Exito');
	            return $this->render('PlataformaBundle:Plataforma:config_curso.html.twig', ['cursos' => $curso]);


			}

    		
       	}
    }

    /**
     * @Route("/config/delete_curso/{id}", name="eliminar_curso")
     */
    public function deleteCursoAction($id){

    	$em = $this->getDoctrine()->getManager();
        $cur = $em->getRepository("PlataformaBundle:Config_curso")->find($id);

        
        if ($cur) {
            $em->remove($cur);
            $em->flush();
            $this->addFlash('mensaje', 'Curso Eliminada con Exito');
        }


    	$anio = date('Y');
    	$curso = $em->getRepository('PlataformaBundle:Config_curso')->findByAnio($anio, array('curso' => 'ASC', 'division' => 'ASC'));

    	return $this->render('PlataformaBundle:Plataforma:config_curso.html.twig', ['cursos' => $curso]);
    }

    /**
     * @Route("/config/preinscripcion", name="view_inscripcion")
     */
    public function viewPreinscripcionAction(){

    	$em = $this->getDoctrine()->getManager();
    	$curso = $em->getRepository('PlataformaBundle:Config_inscripcion')->findBy(array(), array('anio' => 'DESC'));

    	return $this->render('PlataformaBundle:Plataforma:config_inscripcion.html.twig', ['cursos' => $curso]);
    }

    /**
     * @Route("/config/register_preins", name="register_preins")
     */
    public function register_preinsAction(Request $request){

    	// 1) Construye el formulario
        $config = new Config_inscripcion();
        $form = $this->createForm(Config_inscripcionType::class, $config);

        // 2) Manejamos el envío (sólo pasará con POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
     

            // 3) Guardar
            $em = $this->getDoctrine()->getManager();
            $em->persist($config);
            $em->flush();

            $this->addFlash('mensaje', 'Se ha Creado una configuracion Nueva');

            // ... hacer cualquier otra cosa, como enviar un email, etc
            // establecer un mensaje "flash" de éxito para el usuario

            return $this->redirectToRoute('view_inscripcion');
        }

        return $this->render(
            'PlataformaBundle:Plataforma:register_inscripcion.html.twig',
            array('form' => $form->createView())
        );

    }

}    