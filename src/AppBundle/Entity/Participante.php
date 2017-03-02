<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Participante
 *
 * @ORM\Table(name="Participante")
 * @ORM\Entity
 */
class Participante
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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Evento", mappedBy="idparticipante")
     */
    private $idevento;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idevento = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * @return Participante
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
     * Add idevento
     *
     * @param \AppBundle\Entity\Evento $idevento
     *
     * @return Participante
     */
    public function addIdevento(\AppBundle\Entity\Evento $idevento)
    {
        $this->idevento[] = $idevento;

        return $this;
    }

    /**
     * Remove idevento
     *
     * @param \AppBundle\Entity\Evento $idevento
     */
    public function removeIdevento(\AppBundle\Entity\Evento $idevento)
    {
        $this->idevento->removeElement($idevento);
    }

    /**
     * Get idevento
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdevento()
    {
        return $this->idevento;
    }
}
