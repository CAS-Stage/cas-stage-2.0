<?php

namespace Entities;

/**
 * Entities\DescuentoPrevision
 */
class DescuentoPrevision
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var date $fecha_periodo
     */
    private $fecha_periodo;

    /**
     * @var float $descuento_prevision
     */
    private $descuento_prevision;

    /**
     * @var Entities\Prevision
     */
    private $prevision;


    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set fecha_periodo
     *
     * @param date $fechaPeriodo
     */
    public function setFechaPeriodo($fechaPeriodo)
    {
        $this->fecha_periodo = $fechaPeriodo;
    }

    /**
     * Get fecha_periodo
     *
     * @return date $fechaPeriodo
     */
    public function getFechaPeriodo()
    {
        return $this->fecha_periodo;
    }

    /**
     * Set descuento_prevision
     *
     * @param float $descuentoPrevision
     */
    public function setDescuentoPrevision($descuentoPrevision)
    {
        $this->descuento_prevision = $descuentoPrevision;
    }

    /**
     * Get descuento_prevision
     *
     * @return float $descuentoPrevision
     */
    public function getDescuentoPrevision()
    {
        return $this->descuento_prevision;
    }

    /**
     * Set prevision
     *
     * @param Entities\Prevision $prevision
     */
    public function setPrevision(\Entities\Prevision $prevision)
    {
        $this->prevision = $prevision;
    }

    /**
     * Get prevision
     *
     * @return Entities\Prevision $prevision
     */
    public function getPrevision()
    {
        return $this->prevision;
    }
    /**
     * @var float $descuento
     */
    private $descuento;


    /**
     * Set descuento
     *
     * @param float $descuento
     */
    public function setDescuento($descuento)
    {
        $this->descuento = $descuento;
    }

    /**
     * Get descuento
     *
     * @return float $descuento
     */
    public function getDescuento()
    {
        return $this->descuento;
    }
}