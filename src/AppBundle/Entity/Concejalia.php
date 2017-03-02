<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Concejalia
 *
 * @ORM\Table(name="Concejalia", indexes={@ORM\Index(name="IDX_AD84AC56E815EB21", columns={"idAutoridad"})})
 * @ORM\Entity
 */
class Concejalia
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
     * @var \Autoridad
     *
     * @ORM\ManyToOne(targetEntity="Autoridad")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idAutoridad", referencedColumnName="id")
     * })
     */
    private $idautoridad;



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
     * @return Concejalia
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
     * @return Concejalia
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
     * Set idautoridad
     *
     * @param \AppBundle\Entity\Autoridad $idautoridad
     *
     * @return Concejalia
     */
    public function setIdautoridad(\AppBundle\Entity\Autoridad $idautoridad = null)
    {
        $this->idautoridad = $idautoridad;

        return $this;
    }

    /**
     * Get idautoridad
     *
     * @return \AppBundle\Entity\Autoridad
     */
    public function getIdautoridad()
    {
        return $this->idautoridad;
    }
}
