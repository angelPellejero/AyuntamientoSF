<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Actividad
 *
 * @ORM\Table(name="Actividad")
 * @ORM\Entity
 */
class Actividad
{
  public function __toString(){
    return $this-> nombre;
  }
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=500, nullable=false)
     */
    private $descripcion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fInicio", type="date", nullable=false)
     */
    private $finicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fFin", type="date", nullable=false)
     */
    private $ffin;



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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Actividad
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
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Actividad
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set finicio
     *
     * @param \DateTime $finicio
     *
     * @return Actividad
     */
    public function setFinicio($finicio)
    {
        $this->finicio = $finicio;

        return $this;
    }

    /**
     * Get finicio
     *
     * @return \DateTime
     */
    public function getFinicio()
    {
        return $this->finicio;
    }

    /**
     * Set ffin
     *
     * @param \DateTime $ffin
     *
     * @return Actividad
     */
    public function setFfin($ffin)
    {
        $this->ffin = $ffin;

        return $this;
    }

    /**
     * Get ffin
     *
     * @return \DateTime
     */
    public function getFfin()
    {
        return $this->ffin;
    }
}
