<?php

namespace Entities;

/**
 * Entities\RegistroMensual
 */
class RegistroMensual
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var integer $cantidad_horas_extras
     */
    private $cantidad_horas_extras;

    /**
     * @var integer $monto_anticipo
     */
    private $monto_anticipo;

    /**
     * @var integer $bono_movilizacion
     */
    private $bono_movilizacion;

    /**
     * @var integer $bono_colacion
     */
    private $bono_colacion;

    /**
     * @var integer $bono_produccion
     */
    private $bono_produccion;

    /**
     * @var date $fecha_periodo
     */
    private $fecha_periodo;

    /**
     * @var Entities\Contrato
     */
    private $contrato;


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
     * Set cantidad_horas_extras
     *
     * @param integer $cantidadHorasExtras
     */
    public function setCantidadHorasExtras($cantidadHorasExtras)
    {
        $this->cantidad_horas_extras = $cantidadHorasExtras;
    }

    /**
     * Get cantidad_horas_extras
     *
     * @return integer $cantidadHorasExtras
     */
    public function getCantidadHorasExtras()
    {
        return $this->cantidad_horas_extras;
    }

    /**
     * Set monto_anticipo
     *
     * @param integer $montoAnticipo
     */
    public function setMontoAnticipo($montoAnticipo)
    {
        $this->monto_anticipo = $montoAnticipo;
    }

    /**
     * Get monto_anticipo
     *
     * @return integer $montoAnticipo
     */
    public function getMontoAnticipo()
    {
        return $this->monto_anticipo;
    }

    /**
     * Set bono_movilizacion
     *
     * @param integer $bonoMovilizacion
     */
    public function setBonoMovilizacion($bonoMovilizacion)
    {
        $this->bono_movilizacion = $bonoMovilizacion;
    }

    /**
     * Get bono_movilizacion
     *
     * @return integer $bonoMovilizacion
     */
    public function getBonoMovilizacion()
    {
        return $this->bono_movilizacion;
    }

    /**
     * Set bono_colacion
     *
     * @param integer $bonoColacion
     */
    public function setBonoColacion($bonoColacion)
    {
        $this->bono_colacion = $bonoColacion;
    }

    /**
     * Get bono_colacion
     *
     * @return integer $bonoColacion
     */
    public function getBonoColacion()
    {
        return $this->bono_colacion;
    }

    /**
     * Set bono_produccion
     *
     * @param integer $bonoProduccion
     */
    public function setBonoProduccion($bonoProduccion)
    {
        $this->bono_produccion = $bonoProduccion;
    }

    /**
     * Get bono_produccion
     *
     * @return integer $bonoProduccion
     */
    public function getBonoProduccion()
    {
        return $this->bono_produccion;
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
     * Set contrato
     *
     * @param Entities\Contrato $contrato
     */
    public function setContrato(\Entities\Contrato $contrato)
    {
        $this->contrato = $contrato;
    }

    /**
     * Get contrato
     *
     * @return Entities\Contrato $contrato
     */
    public function getContrato()
    {
        return $this->contrato;
    }
}