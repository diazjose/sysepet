<?php

namespace PlataformaBundle\Controller;

use PlataformaBundle\Entity\Alumnos;
use PlataformaBundle\Entity\Personas;
use PlataformaBundle\Entity\TutorAlumno;
use PlataformaBundle\Entity\Tutor;
use PlataformaBundle\Entity\Inscripciones;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class AlumnoController extends Controller
{
    /**
     * @Route("/alumno/view/{id}", name="view_alumno")
     */
    public function viewAction($id){

        $em = $this->getDoctrine()->getManager();
        $alumno = $em->getRepository("PlataformaBundle:Alumnos")->find($id);

        $tutoralumno = $em->getRepository("PlataformaBundle:TutorAlumno")->findOneByAlumno($alumno);
        
        return $this->render('PlataformaBundle:Plataforma:msj.html.twig', ['alumno' => $alumno, 'tualumno' => $tutoralumno ]);


    }

    /**
     * @Route("/alumno/register", name="cargar_alumno")
     */
    public function registerAction(Request $request)
    {
        if ($request->get('dni')) {
            

            $persona = new Personas();
            $alumno = new Alumnos();



            $em = $this->getDoctrine()->getManager();
            $user = $em->getRepository('PlataformaBundle:Personas')->findByDni($request->get('dni'));
            $alu = $em->getRepository('PlataformaBundle:Alumnos')->findByNumeroLegajo($request->get('numero_legajo'));

            if ($user) {
                $this->addFlash('mensaje', 'Ya existe una Persona con este Dni');
                return $this->render('PlataformaBundle:Plataforma:form_alumno.html.twig');
            }
            else{
                if ($alu) {
                    $this->addFlash('mensaje', 'Ya existe un Alumno con este Legajo');
                    return $this->render('PlataformaBundle:Plataforma:form_alumno.html.twig');            
                }
            }
           
            $persona->setDni($request->get('dni'));
            $persona->setApellido($request->get('apellido'));
            $persona->setNombre($request->get('nombre'));
            $persona->setDireccion($request->get('direccion'));


            $alumno->setNumeroLegajo($request->get('numero_legajo'));
            $alumno->setEdad($request->get('edad'));
            $alumno->setFechaNac($request->get('fecha_nac'));
            $alumno->setLugarNac($request->get('lugar_nac'));
            $alumno->setConvive($request->get('convive'));
            $alumno->setHermanos($request->get('hermanos'));
            $alumno->setPrimaria($request->get('primaria'));
            $alumno->setEscProviene($request->get('proviene'));
            $alumno->setObraSocial($request->get('obra_social'));
            $alumno->setEnferAlergicas($request->get('enfer_alergicas'));
            $alumno->setCertDiscapacidad($request->get('certificado'));

            $alumno->setPersona($persona);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($persona);
            $em->persist($alumno);
            $em->flush(); 
          

            $tutoralumno = $em->getRepository("PlataformaBundle:TutorAlumno")->findOneByAlumno($alumno);
        
            return $this->render('PlataformaBundle:Plataforma:msj.html.twig', ['alumno' => $alumno, 'tualumno' => $tutoralumno ]);


        }    	
            
        return $this->render('PlataformaBundle:Plataforma:form_alumno.html.twig');
 	  
    }

    /**
     * @Route("/alumno/delete/{id}", name="eliminar_alumno")
     */
    public function deleteAction($id){

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository("PlataformaBundle:Alumnos")->find($id);
               
        if ($user) {
            $em->remove($user);
            $em->flush();
            $this->addFlash('mensaje', 'Alumno Eliminada con Exito');
        }

        return $this->redirectToRoute('buscar_persona');
    }
           
    /**
     * @Route("/alumno/editar/{id}", name="update_alumno")
     */       
    public function updateAction($id){

        $em = $this->getDoctrine()->getManager();

        $alumno = $em->getRepository('PlataformaBundle:Alumnos')->find($id);
         
            
        return $this->render('PlataformaBundle:Plataforma:form_alumno.html.twig');

    }

    /**
     * @Route("/tutor/register/{id}", name="alta_tutor")
     */       
    public function resgtutorAction(Request $request, $id){

        if ($request->get('dni')) {
            
            $em = $this->getDoctrine()->getManager();
            $alumno = $em->getRepository('PlataformaBundle:Alumnos')->find($id);
                        
            $persona = new Personas();

            $persona->setDni($request->get('dni'));
            $persona->setApellido($request->get('apellido'));
            $persona->setNombre($request->get('nombre'));
            $persona->setDireccion($request->get('direccion'));

            $tutor = new Tutor();

            $tutor->setTelefono($request->get('telefono'));
            $tutor->setLugarTrabajo($request->get('lugar_trabajo'));
            $tutor->setProgramaSocial($request->get('plan_social'));

            $tutor->setPersona($persona);

            $em = $this->getDoctrine()->getManager();
            $em->persist($persona);
            $em->persist($tutor);
            $em->flush(); 

            $alumno = $em->getRepository('PlataformaBundle:Alumnos')->find($id);

            $tutoralumno = new TutorAlumno();

            $tutoralumno->setTutor($tutor);
            $tutoralumno->setAlumno($alumno);
            $tutoralumno->setParentesco($request->get('parentesco'));

            $em = $this->getDoctrine()->getManager();
            $em->persist($tutoralumno);
            $em->flush(); 

            $tutoralumno = $em->getRepository("PlataformaBundle:TutorAlumno")->findOneByAlumno($alumno);
        
            return $this->render('PlataformaBundle:Plataforma:msj.html.twig', ['alumno' => $alumno, 'tualumno' => $tutoralumno ]);


        }

        
            
        return $this->render('PlataformaBundle:Plataforma:form_tutor.html.twig', ['id' => $id ]);

    }

    /**
     * @Route("/alumno/inscribir/{id}", name="inscribir_alumno")
     */       
    public function iscribiralumnoAction(Request $request, $id){

        if ($request->get('curso')) {
            
            $em = $this->getDoctrine()->getManager();
            $alumno = $em->getRepository('PlataformaBundle:Alumnos')->find($id);
                        
            $inscripcion = new Inscripciones();

            $inscripcion->setCurso($request->get('curso'));
            $inscripcion->setDivision($request->get('division'));
            $inscripcion->setTurno($request->get('turno'));
            $inscripcion->setEspecialidad($request->get('especialidad'));
            $inscripcion->setCantMateAdeuda($request->get('cant_mate_adeuda'));
            
            $fecha = date('Y-m-d');
            $anio = date('Y');    

            $inscripcion->setFechaInscripcion($fecha);
            $inscripcion->setAnio($anio);

            $inscribir = $em->getRepository('PlataformaBundle:Inscripciones')->findByAnio($anio);

            if ($inscribir) {
                
            }
            else{
                $inscripcion->setAlumno($alumno);
                
                $em->persist($inscripcion);
                $em->flush();     
            }

            

            $tutoralumno = $em->getRepository("PlataformaBundle:TutorAlumno")->findOneByAlumno($alumno);
        
            return $this->render('PlataformaBundle:Plataforma:msj.html.twig', ['alumno' => $alumno, 'tualumno' => $tutoralumno ]);

        }

        
            
        return $this->render('PlataformaBundle:Plataforma:inscribir_alumno.html.twig', ['id' => $id ]);

    }

}	
 
