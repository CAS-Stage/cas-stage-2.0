<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * RentaContrato
 *
 * @ORM\Table(name="renta_contrato")
 * @ORM\Entity
 */
class RentaContrato
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
     * @var integer
     *
     * @ORM\Column(name="renta_bruta", type="integer", nullable=false)
     */
    private $renta_bruta;

    /**
     * @var boolean
     *
     * @ORM\Column(name="gratificacion", type="boolean", nullable=false)
     */
    private $gratificacion;

    /**
     * @var \Entities\TipoContrato
     *
     * @ORM\ManyToOne(targetEntity="Entities\TipoContrato", inversedBy="rentasContrato")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_contrato", referencedColumnName="id")
     * })
     */
    private $tipoContrato;


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
     * @return RentaContrato
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
     * Set renta_bruta
     *
     * @param integer $rentaBruta
     * @return RentaContrato
     */
    public function setRentaBruta($rentaBruta)
    {
        $this->renta_bruta = $rentaBruta;
    
        return $this;
    }

    /**
     * Get renta_bruta
     *
     * @return integer 
     */
    public function getRentaBruta()
    {
        return $this->renta_bruta;
    }

    /**
     * Set gratificacion
     *
     * @param boolean $gratificacion
     * @return RentaContrato
     */
    public function setGratificacion($gratificacion)
    {
        $this->gratificacion = $gratificacion;
    
        return $this;
    }

    /**
     * Get gratificacion
     *
     * @return boolean 
     */
    public function getGratificacion()
    {
        return $this->gratificacion;
    }

    /**
     * Set tipoContrato
     *
     * @param \Entities\TipoContrato $tipoContrato
     * @return RentaContrato
     */
    public function setTipoContrato(\Entities\TipoContrato $tipoContrato = null)
    {
        $this->tipoContrato = $tipoContrato;
    
        return $this;
    }

    /**
     * Get tipoContrato
     *
     * @return \Entities\TipoContrato 
     */
    public function getTipoContrato()
    {
        return $this->tipoContrato;
    }
}
