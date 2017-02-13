<?php

namespace PlataformaBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    /**
     * @Route("/" )
     */
    public function indexAction()
    {
        return $this->render('PlataformaBundle:Plataforma:principal.html.twig');
 	
    }
}	
 
