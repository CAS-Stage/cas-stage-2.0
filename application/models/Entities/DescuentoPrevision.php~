<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * DescuentoPrevision
 *
 * @ORM\Table(name="descuento_prevision")
 * @ORM\Entity
 */
class DescuentoPrevision
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_periodo", type="date", nullable=false)
     */
    private $fecha_periodo;

    /**
     * @var float
     *
     * @ORM\Column(name="descuento", type="float", nullable=false)
     */
    private $descuento;

    /**
     * @var \Entities\Prevision
     *
     * @ORM\ManyToOne(targetEntity="Entities\Prevision", inversedBy="descuentosPrevision")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_prevision", referencedColumnName="id")
     * })
     */
    private $prevision;


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
     * Set fecha_periodo
     *
     * @param \DateTime $fechaPeriodo
     * @return DescuentoPrevision
     */
    public function setFechaPeriodo($fechaPeriodo)
    {
        $this->fecha_periodo = $fechaPeriodo;
    
        return $this;
    }

    /**
     * Get fecha_periodo
     *
     * @return \DateTime 
     */
    public function getFechaPeriodo()
    {
        return $this->fecha_periodo;
    }

    /**
     * Set descuento
     *
     * @param float $descuento
     * @return DescuentoPrevision
     */
    public function setDescuento($descuento)
    {
        $this->descuento = $descuento;
    
        return $this;
    }

    /**
     * Get descuento
     *
     * @return float 
     */
    public function getDescuento()
    {
        return $this->descuento;
    }

    /**
     * Set prevision
     *
     * @param \Entities\Prevision $prevision
     * @return DescuentoPrevision
     */
    public function setPrevision(\Entities\Prevision $prevision = null)
    {
        $this->prevision = $prevision;
    
        return $this;
    }

    /**
     * Get prevision
     *
     * @return \Entities\Prevision 
     */
    public function getPrevision()
    {
        return $this->prevision;
    }
}
