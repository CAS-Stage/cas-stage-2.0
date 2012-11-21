<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prevision
 *
 * @ORM\Table(name="prevision")
 * @ORM\Entity
 */
class Prevision
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=45, nullable=false)
     */
    private $nombre;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Entities\Contrato", mappedBy="prevision")
     */
    private $contratos;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Entities\DescuentoPrevision", mappedBy="prevision")
     * @ORM\OrderBy({
     *     "fecha_periodo"="ASC"
     * })
     */
    private $descuentosPrevision;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->contratos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->descuentosPrevision = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Prevision
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
     * Add contratos
     *
     * @param \Entities\Contrato $contratos
     * @return Prevision
     */
    public function addContrato(\Entities\Contrato $contratos)
    {
        $this->contratos[] = $contratos;
    
        return $this;
    }

    /**
     * Remove contratos
     *
     * @param \Entities\Contrato $contratos
     */
    public function removeContrato(\Entities\Contrato $contratos)
    {
        $this->contratos->removeElement($contratos);
    }

    /**
     * Get contratos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContratos()
    {
        return $this->contratos;
    }

    /**
     * Add descuentosPrevision
     *
     * @param \Entities\DescuentoPrevision $descuentosPrevision
     * @return Prevision
     */
    public function addDescuentosPrevision(\Entities\DescuentoPrevision $descuentosPrevision)
    {
        $this->descuentosPrevision[] = $descuentosPrevision;
    
        return $this;
    }

    /**
     * Remove descuentosPrevision
     *
     * @param \Entities\DescuentoPrevision $descuentosPrevision
     */
    public function removeDescuentosPrevision(\Entities\DescuentoPrevision $descuentosPrevision)
    {
        $this->descuentosPrevision->removeElement($descuentosPrevision);
    }

    /**
     * Get descuentosPrevision
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDescuentosPrevision()
    {
        return $this->descuentosPrevision;
    }
}
