<?php

namespace PlataformaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use EM\MyBundle\Entity\Personas;
use EM\MyBundle\Entity\Inscripciones;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * Alumnos
 *
 * @ORM\Table(name="alumnos")
 * @ORM\Entity(repositoryClass="PlataformaBundle\Repository\AlumnosRepository")
 * @UniqueEntity(fields="numero_legajo", message="Ya existe un Alumno con este Legajo")
 */
class Alumnos
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * 
     * @ORM\OneToOne(targetEntity="Personas", inversedBy="alumno", cascade="remove")
     * @ORM\JoinColumn(name="persona_id", referencedColumnName="id")
     */
    private $persona;

    /**
     * @ORM\OneToMany(targetEntity="Inscripciones", mappedBy="alumno")
     */
    private $inscripciones;


    /**
     * @var int
     *
     * @ORM\Column(name="edad", type="integer")
     */
    private $edad;

    /**
     * @var string
     *
     * @ORM\Column(name="fecha_nac", type="string")
     */
    private $fechaNac;

    /**
     * @var string
     *
     * @ORM\Column(name="lugar_nac", type="string", length=255)
     */
    private $lugarNac;

    /**
     * @var string
     *
     * @ORM\Column(name="enfer_alergicas", type="string", length=255)
     */
    private $enferAlergicas;

    /**
     * @var string
     *
     * @ORM\Column(name="cert_discapacidad", type="string", length=255)
     */
    private $certDiscapacidad;

    /**
     * @var string
     *
     * @ORM\Column(name="obra_social", type="string", length=255)
     */
    private $obraSocial;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_legajo", type="string", length=255)
     */
    private $numeroLegajo;

    /**
     * @var string
     *
     * @ORM\Column(name="convive", type="string", length=255)
     */
    private $convive;

    /**
     * @var string
     *
     * @ORM\Column(name="hermanos", type="string", length=255)
     */
    private $hermanos;

    /**
     * @var string
     *
     * @ORM\Column(name="primaria", type="string", length=255)
     */
    private $primaria;

    /**
     * @var string
     *
     * @ORM\Column(name="esc_proviene", type="string", length=255)
     */
    private $escProviene;


    public function __construct() {
        $this->inscripciones = new ArrayCollection();
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set edad
     *
     * @param integer $edad
     *
     * @return Alumnos
     */
    public function setEdad($edad)
    {
        $this->edad = $edad;

        return $this;
    }

    /**
     * Get edad
     *
     * @return int
     */
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * Set fechaNac
     *
     * @param \DateTime $fechaNac
     *
     * @return Alumnos
     */
    public function setFechaNac($fechaNac)
    {
        $this->fechaNac = $fechaNac;

        return $this;
    }

    /**
     * Get fechaNac
     *
     * @return \DateTime
     */
    public function getFechaNac()
    {
        return $this->fechaNac;
    }

    /**
     * Set lugarNac
     *
     * @param string $lugarNac
     *
     * @return Alumnos
     */
    public function setLugarNac($lugarNac)
    {
        $this->lugarNac = $lugarNac;

        return $this;
    }

    /**
     * Get lugarNac
     *
     * @return string
     */
    public function getLugarNac()
    {
        return $this->lugarNac;
    }

    /**
     * Set enferAlergicas
     *
     * @param string $enferAlergicas
     *
     * @return Alumnos
     */
    public function setEnferAlergicas($enferAlergicas)
    {
        $this->enferAlergicas = $enferAlergicas;

        return $this;
    }

    /**
     * Get enferAlergicas
     *
     * @return string
     */
    public function getEnferAlergicas()
    {
        return $this->enferAlergicas;
    }

    /**
     * Set certDiscapacidad
     *
     * @param string $certDiscapacidad
     *
     * @return Alumnos
     */
    public function setCertDiscapacidad($certDiscapacidad)
    {
        $this->certDiscapacidad = $certDiscapacidad;

        return $this;
    }

    /**
     * Get certDiscapacidad
     *
     * @return string
     */
    public function getCertDiscapacidad()
    {
        return $this->certDiscapacidad;
    }

    /**
     * Set obraSocial
     *
     * @param string $obraSocial
     *
     * @return Alumnos
     */
    public function setObraSocial($obraSocial)
    {
        $this->obraSocial = $obraSocial;

        return $this;
    }

    /**
     * Get obraSocial
     *
     * @return string
     */
    public function getObraSocial()
    {
        return $this->obraSocial;
    }

    /**
     * Set numeroLegajo
     *
     * @param string $numeroLegajo
     *
     * @return Alumnos
     */
    public function setNumeroLegajo($numeroLegajo)
    {
        $this->numeroLegajo = $numeroLegajo;

        return $this;
    }

    /**
     * Get numeroLegajo
     *
     * @return string
     */
    public function getNumeroLegajo()
    {
        return $this->numeroLegajo;
    }

    /**
     * Set convive
     *
     * @param string $convive
     *
     * @return Alumnos
     */
    public function setConvive($convive)
    {
        $this->convive = $convive;

        return $this;
    }

    /**
     * Get convive
     *
     * @return string
     */
    public function getConvive()
    {
        return $this->convive;
    }

    /**
     * Set hermanos
     *
     * @param string $hermanos
     *
     * @return Alumnos
     */
    public function setHermanos($hermanos)
    {
        $this->hermanos = $hermanos;

        return $this;
    }

    /**
     * Get hermanos
     *
     * @return string
     */
    public function getHermanos()
    {
        return $this->hermanos;
    }

    /**
     * Set primaria
     *
     * @param string $primaria
     *
     * @return Alumnos
     */
    public function setPrimaria($primaria)
    {
        $this->primaria = $primaria;

        return $this;
    }

    /**
     * Get primaria
     *
     * @return string
     */
    public function getPrimaria()
    {
        return $this->primaria;
    }

    /**
     * Set escProviene
     *
     * @param string $escProviene
     *
     * @return Alumnos
     */
    public function setEscProviene($escProviene)
    {
        $this->escProviene = $escProviene;

        return $this;
    }

    /**
     * Get escProviene
     *
     * @return string
     */
    public function getEscProviene()
    {
        return $this->escProviene;
    }

    /**
     * Set persona
     *
     * @param \PlataformaBundle\Entity\Personas $persona
     *
     * @return Alumnos
     */
    public function setPersona(\PlataformaBundle\Entity\Personas $persona = null)
    {
        $this->persona = $persona;

        return $this;
    }

    /**
     * Get persona
     *
     * @return \PlataformaBundle\Entity\Personas
     */
    public function getPersona()
    {
        return $this->persona;
    }

    /**
     * Set inscripciones
     *
     * @param \PlataformaBundle\Entity\Inscripciones $inscripciones
     *
     * @return Alumnos
     */
    public function setInscripciones(\PlataformaBundle\Entity\Inscripciones $inscripciones = null)
    {
        $this->inscripciones = $inscripciones;

        return $this;
    }

    /**
     * Get inscripciones
     *
     * @return \PlataformaBundle\Entity\Inscripciones
     */
    public function getInscripciones()
    {
        return $this->inscripciones;
    }

    /**
     * Add inscripcione
     *
     * @param \PlataformaBundle\Entity\Inscripciones $inscripcione
     *
     * @return Alumnos
     */
    public function addInscripcione(\PlataformaBundle\Entity\Inscripciones $inscripcione)
    {
        $this->inscripciones[] = $inscripcione;

        return $this;
    }

    /**
     * Remove inscripcione
     *
     * @param \PlataformaBundle\Entity\Inscripciones $inscripcione
     */
    public function removeInscripcione(\PlataformaBundle\Entity\Inscripciones $inscripcione)
    {
        $this->inscripciones->removeElement($inscripcione);
    }
}
