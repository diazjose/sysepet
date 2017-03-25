<?php

namespace PlataformaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use EM\MyBundle\Entity\Alumnos;
use EM\MyBundle\Entity\Personas;

/**
 * TutorAlumno
 *
 * @ORM\Table(name="tutoralumno")
 * @ORM\Entity(repositoryClass="PlataformaBundle\Repository\TutorAlumnosRepository")
 * 
 */
class TutorAlumno
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
     * @ORM\ManyToOne(targetEntity="Alumnos")
     */
    private $alumno;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="Tutor")
     */
    private $tutor;

    /**
     * @var string
     *
     * @ORM\Column(name="parentesco", type="string", length=255)
     */
    private $parentesco;

 
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set parentesco
     *
     * @param string $parentesco
     *
     * @return TutorAlumno
     */
    public function setParentesco($parentesco)
    {
        $this->parentesco = $parentesco;

        return $this;
    }

    /**
     * Get parentesco
     *
     * @return string
     */
    public function getParentesco()
    {
        return $this->parentesco;
    }

    /**
     * Set alumno
     *
     * @param \PlataformaBundle\Entity\Alumnos $alumno
     *
     * @return TutorAlumno
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
     * @return TutorAlumno
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
