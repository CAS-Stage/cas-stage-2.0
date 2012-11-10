<?php

namespace Entities;

/**
 * Entities\PactoSalud
 */
class PactoSalud
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
     * @var float $pacto
     */
    private $pacto;

    /**
     * @var Entities\Contrato
     */
    private $contrato;

    /**
     * @var Entities\SistemaSalud
     */
    private $sistemaSalud;


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
     * Set pacto
     *
     * @param float $pacto
     */
    public function setPacto($pacto)
    {
        $this->pacto = $pacto;
    }

    /**
     * Get pacto
     *
     * @return float $pacto
     */
    public function getPacto()
    {
        return $this->pacto;
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

    /**
     * Set sistemaSalud
     *
     * @param Entities\SistemaSalud $sistemaSalud
     */
    public function setSistemaSalud(\Entities\SistemaSalud $sistemaSalud)
    {
        $this->sistemaSalud = $sistemaSalud;
    }

    /**
     * Get sistemaSalud
     *
     * @return Entities\SistemaSalud $sistemaSalud
     */
    public function getSistemaSalud()
    {
        return $this->sistemaSalud;
    }
}