<?php

namespace PlataformaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use EM\MyBundle\Entity\Alumnos;

/**
 * personas
 *
 * @ORM\Table(name="personas")
 * @ORM\Entity(repositoryClass="PlataformaBundle\Repository\personasRepository")
 * @UniqueEntity(fields="dni", message="Ya existe una Persona con este DNI")
 */
class Personas
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
     * @ORM\OneToOne(targetEntity="Alumnos", mappedBy="persona", cascade="remove")
     */
    private $alumno;

    /**
     * @ORM\OneToOne(targetEntity="Tutor", mappedBy="persona", cascade="remove")
     */
    private $tutor;

    /**
     * @var int
     *
     * @ORM\Column(name="dni", type="integer", length=255)
     */
    private $dni;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", length=255)
     */
    private $apellido;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=255)
     */
    private $direccion;

    



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
     * Set dni
     *
     * @param string $dni
     *
     * @return personas
     */
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get dni
     *
     * @return string
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set apellido
     *
     * @param string $apellido
     *
     * @return personas
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return personas
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     *
     * @return personas
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set alumno
     *
     * @param \PlataformaBundle\Entity\Alumnos $alumno
     *
     * @return Personas
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

    /**
     * Set tutor
     *
     * @param \PlataformaBundle\Entity\Tutor $tutor
     *
     * @return Personas
     */
    public function setTutor(\PlataformaBundle\Entity\Tutor $tutor = null)
    {
        $this->tutor = $tutor;

        return $this;
    }

    /**
     * Get tutor
     *
     * @return \PlataformaBundle\Entity\Tutor
     */
    public function getTutor()
    {
        return $this->tutor;
    }
}
