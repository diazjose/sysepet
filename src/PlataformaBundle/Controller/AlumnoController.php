<?php

namespace PlataformaBundle\Controller;

use PlataformaBundle\Entity\Alumnos;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class AlumnoController extends Controller
{
    /**
     * @Route("/alumno/register/{id}", name="cargar_alumno" )
     */
    public function registerAction(Request $request, $id)
    {
    	
            
        return $this->render('PlataformaBundle:Plataforma:form_alumno.html.twig', ['id' => $id]);
 	  
    }

    /**
     * @Route("/alumno/regis", name="cargar" )
     */
    public function altaAction(Request $request){

      
    

    }

           
}	
 
