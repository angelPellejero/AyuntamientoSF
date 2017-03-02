<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evento
 *
 * @ORM\Table(name="Evento", indexes={@ORM\Index(name="IDX_402A0E334B9A5992", columns={"idConceOrganiza"}), @ORM\Index(name="IDX_402A0E3371189650", columns={"idActividad"}), @ORM\Index(name="IDX_402A0E331CF05BC3", columns={"idPatrocina"})})
 * @ORM\Entity
 */
class Evento
{
  function __toString(){
    return $this->nombre;
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
     * @ORM\Column(name="fyh", type="datetime", nullable=false)
     */
    private $fyh;

    /**
     * @var string
     *
     * @ORM\Column(name="lugar", type="string", length=100, nullable=true)
     */
    private $lugar;

    /**
     * @var \Concejalia
     *
     * @ORM\ManyToOne(targetEntity="Concejalia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idConceOrganiza", referencedColumnName="id")
     * })
     */
    private $idconceorganiza;

    /**
     * @var \Actividad
     *
     * @ORM\ManyToOne(targetEntity="Actividad")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idActividad", referencedColumnName="id")
     * })
     */
    private $idactividad;

    /**
     * @var \Patrocinador
     *
     * @ORM\ManyToOne(targetEntity="Patrocinador")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idPatrocina", referencedColumnName="id")
     * })
     */
    private $idpatrocina;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Participante", inversedBy="idevento")
     * @ORM\JoinTable(name="participa",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idEvento", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idParticipante", referencedColumnName="id")
     *   }
     * )
     */
    private $idparticipante;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idparticipante = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Evento
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
     * @return Evento
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
     * Set fyh
     *
     * @param \DateTime $fyh
     *
     * @return Evento
     */
    public function setFyh($fyh)
    {
        $this->fyh = $fyh;

        return $this;
    }

    /**
     * Get fyh
     *
     * @return \DateTime
     */
    public function getFyh()
    {
        return $this->fyh;
    }

    /**
     * Set lugar
     *
     * @param string $lugar
     *
     * @return Evento
     */
    public function setLugar($lugar)
    {
        $this->lugar = $lugar;

        return $this;
    }

    /**
     * Get lugar
     *
     * @return string
     */
    public function getLugar()
    {
        return $this->lugar;
    }

    /**
     * Set idconceorganiza
     *
     * @param \AppBundle\Entity\Concejalia $idconceorganiza
     *
     * @return Evento
     */
    public function setIdconceorganiza(\AppBundle\Entity\Concejalia $idconceorganiza = null)
    {
        $this->idconceorganiza = $idconceorganiza;

        return $this;
    }

    /**
     * Get idconceorganiza
     *
     * @return \AppBundle\Entity\Concejalia
     */
    public function getIdconceorganiza()
    {
        return $this->idconceorganiza;
    }

    /**
     * Set idactividad
     *
     * @param \AppBundle\Entity\Actividad $idactividad
     *
     * @return Evento
     */
    public function setIdactividad(\AppBundle\Entity\Actividad $idactividad = null)
    {
        $this->idactividad = $idactividad;

        return $this;
    }

    /**
     * Get idactividad
     *
     * @return \AppBundle\Entity\Actividad
     */
    public function getIdactividad()
    {
        return $this->idactividad;
    }

    /**
     * Set idpatrocina
     *
     * @param \AppBundle\Entity\Patrocinador $idpatrocina
     *
     * @return Evento
     */
    public function setIdpatrocina(\AppBundle\Entity\Patrocinador $idpatrocina = null)
    {
        $this->idpatrocina = $idpatrocina;

        return $this;
    }

    /**
     * Get idpatrocina
     *
     * @return \AppBundle\Entity\Patrocinador
     */
    public function getIdpatrocina()
    {
        return $this->idpatrocina;
    }

    /**
     * Add idparticipante
     *
     * @param \AppBundle\Entity\Participante $idparticipante
     *
     * @return Evento
     */
    public function addIdparticipante(\AppBundle\Entity\Participante $idparticipante)
    {
        $this->idparticipante[] = $idparticipante;

        return $this;
    }

    /**
     * Remove idparticipante
     *
     * @param \AppBundle\Entity\Participante $idparticipante
     */
    public function removeIdparticipante(\AppBundle\Entity\Participante $idparticipante)
    {
        $this->idparticipante->removeElement($idparticipante);
    }

    /**
     * Get idparticipante
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdparticipante()
    {
        return $this->idparticipante;
    }
}
