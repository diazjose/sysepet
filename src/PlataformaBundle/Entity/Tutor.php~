<?php

namespace PlataformaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tutor
 *
 * @ORM\Table(name="tutor")
 * @ORM\Entity(repositoryClass="PlataformaBundle\Repository\TutorRepository")
 */
class Tutor
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
     * @ORM\OneToOne(targetEntity="Personas", inversedBy="tutor", cascade="remove")
     * @ORM\JoinColumn(name="persona_id", referencedColumnName="id")
     */
    private $persona;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=255)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="lugar_trabajo", type="string", length=255)
     */
    private $lugarTrabajo;

    /**
     * @var string
     *
     * @ORM\Column(name="programa_social", type="string", length=255)
     */
    private $programaSocial;


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
     * Set telefono
     *
     * @param string $telefono
     *
     * @return Tutor
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set lugarTrabajo
     *
     * @param string $lugarTrabajo
     *
     * @return Tutor
     */
    public function setLugarTrabajo($lugarTrabajo)
    {
        $this->lugarTrabajo = $lugarTrabajo;

        return $this;
    }

    /**
     * Get lugarTrabajo
     *
     * @return string
     */
    public function getLugarTrabajo()
    {
        return $this->lugarTrabajo;
    }

    /**
     * Set programaSocial
     *
     * @param string $programaSocial
     *
     * @return Tutor
     */
    public function setProgramaSocial($programaSocial)
    {
        $this->programaSocial = $programaSocial;

        return $this;
    }

    /**
     * Get programaSocial
     *
     * @return string
     */
    public function getProgramaSocial()
    {
        return $this->programaSocial;
    }

    /**
     * Set persona
     *
     * @param \PlataformaBundle\Entity\Personas $persona
     *
     * @return Tutor
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
}
