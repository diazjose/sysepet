<?php

namespace PlataformaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use EM\MyBundle\Entity\Alumnos;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Inscripciones
 *
 * @ORM\Table(name="inscripciones")
 * @ORM\Entity(repositoryClass="PlataformaBundle\Repository\InscripcionesRepository")
 */
class Inscripciones
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
    /**
     * @ORM\ManyToOne(targetEntity="Alumnos", inversedBy="inscripciones")
     * @ORM\JoinColumn(name="alumno_id", referencedColumnName="id")
     * 
     */
    private $alumno;

    /**
     * @var string
     *
     * @ORM\Column(name="curso", type="string", length=255)
     */
    private $curso;

    /**
     * @var string
     *
     * @ORM\Column(name="division", type="string", length=255)
     */
    private $division;

    /**
     * @var string
     *
     * @ORM\Column(name="turno", type="string", length=255)
     */
    private $turno;

    /**
     * @var string
     *
     * @ORM\Column(name="especialidad", type="string", length=255)
     */
    private $especialidad;

    /**
     * @var string
     *
     * @ORM\Column(name="cant_mate_adeuda", type="string", length=255)
     */
    private $cantMateAdeuda;

    /**
     * @var string
     *
     * @ORM\Column(name="fecha_inscripcion", type="string", length=20)
     */
    private $fechaInscripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="anio", type="string", length=20)
     */
    private $anio;


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
     * Set curso
     *
     * @param string $curso
     *
     * @return Inscripciones
     */
    public function setCurso($curso)
    {
        $this->curso = $curso;

        return $this;
    }

    /**
     * Get curso
     *
     * @return string
     */
    public function getCurso()
    {
        return $this->curso;
    }

    /**
     * Set division
     *
     * @param string $division
     *
     * @return Inscripciones
     */
    public function setDivision($division)
    {
        $this->division = $division;

        return $this;
    }

    /**
     * Get division
     *
     * @return string
     */
    public function getDivision()
    {
        return $this->division;
    }

    /**
     * Set turno
     *
     * @param string $turno
     *
     * @return Inscripciones
     */
    public function setTurno($turno)
    {
        $this->turno = $turno;

        return $this;
    }

    /**
     * Get turno
     *
     * @return string
     */
    public function getTurno()
    {
        return $this->turno;
    }

    /**
     * Set especialidad
     *
     * @param string $especialidad
     *
     * @return Inscripciones
     */
    public function setEspecialidad($especialidad)
    {
        $this->especialidad = $especialidad;

        return $this;
    }

    /**
     * Get especialidad
     *
     * @return string
     */
    public function getEspecialidad()
    {
        return $this->especialidad;
    }

    /**
     * Set cantMateAdeuda
     *
     * @param string $cantMateAdeuda
     *
     * @return Inscripciones
     */
    public function setCantMateAdeuda($cantMateAdeuda)
    {
        $this->cantMateAdeuda = $cantMateAdeuda;

        return $this;
    }

    /**
     * Get cantMateAdeuda
     *
     * @return string
     */
    public function getCantMateAdeuda()
    {
        return $this->cantMateAdeuda;
    }

    /**
     * Set fechaInscripcion
     *
     * @param \DateTime $fechaInscripcion
     *
     * @return Inscripciones
     */
    public function setFechaInscripcion($fechaInscripcion)
    {
        $this->fechaInscripcion = $fechaInscripcion;

        return $this;
    }

    /**
     * Get fechaInscripcion
     *
     * @return \Date
     */
    public function getFechaInscripcion()
    {
        return $this->fechaInscripcion;
    }

    /**
     * Set anio
     *
     * @param string $anio
     *
     * @return Inscripciones
     */
    public function setAnio($anio)
    {
        $this->anio = $anio;

        return $this;
    }

    /**
     * Get anio
     *
     * @return string
     */
    public function getAnio()
    {
        return $this->anio;
    }

    /**
     * Set alumno
     *
     * @param \PlataformaBundle\Entity\Alumnos $alumno
     *
     * @return Inscripciones
     */
    public function setAlumno(\PlataformaBundle\Entity\Alumnos $alumno = null)
    {
        $this->alumno = $alumno;

        return $this;
    }

    /**
     * Get alumno
     *
     * @return \PlataformaBundle\Entity\Alumnos
     */
    public function getAlumno()
    {
        return $this->alumno;
    }
}
