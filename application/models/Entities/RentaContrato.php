<?php

namespace Entities;

/**
 * Entities\RentaContrato
 */
class RentaContrato
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
     * @var integer $renta_bruta
     */
    private $renta_bruta;

    /**
     * @var boolean $gratificacion
     */
    private $gratificacion = false;

    /**
     * @var Entities\TipoContrato
     */
    private $tipoContrato;


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
     * Set renta_bruta
     *
     * @param integer $rentaBruta
     */
    public function setRentaBruta($rentaBruta)
    {
        $this->renta_bruta = $rentaBruta;
    }

    /**
     * Get renta_bruta
     *
     * @return integer $rentaBruta
     */
    public function getRentaBruta()
    {
        return $this->renta_bruta;
    }

    /**
     * Set gratificacion
     *
     * @param boolean $gratificacion
     */
    public function setGratificacion($gratificacion)
    {
        $this->gratificacion = $gratificacion;
    }

    /**
     * Get gratificacion
     *
     * @return boolean $gratificacion
     */
    public function getGratificacion()
    {
        return $this->gratificacion;
    }

    /**
     * Set tipoContrato
     *
     * @param Entities\TipoContrato $tipoContrato
     */
    public function setTipoContrato(\Entities\TipoContrato $tipoContrato)
    {
        $this->tipoContrato = $tipoContrato;
    }

    /**
     * Get tipoContrato
     *
     * @return Entities\TipoContrato $tipoContrato
     */
    public function getTipoContrato()
    {
        return $this->tipoContrato;
    }
}