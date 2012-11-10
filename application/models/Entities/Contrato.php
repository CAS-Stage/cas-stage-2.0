<?php

namespace Entities;

/**
 * Entities\Contrato
 */
class Contrato
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var date $fecha_inicio
     */
    private $fecha_inicio;

    /**
     * @var date $fecha_termino
     */
    private $fecha_termino;

    /**
     * @var Entities\TipoContrato
     */
    private $tipoContrato;

    /**
     * @var Entities\Empleado
     */
    private $empleado;

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
     * Set fecha_inicio
     *
     * @param date $fechaInicio
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fecha_inicio = $fechaInicio;
    }

    /**
     * Get fecha_inicio
     *
     * @return date $fechaInicio
     */
    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }

    /**
     * Set fecha_termino
     *
     * @param date $fechaTermino
     */
    public function setFechaTermino($fechaTermino)
    {
        $this->fecha_termino = $fechaTermino;
    }

    /**
     * Get fecha_termino
     *
     * @return date $fechaTermino
     */
    public function getFechaTermino()
    {
        return $this->fecha_termino;
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

    /**
     * Set empleado
     *
     * @param Entities\Empleado $empleado
     */
    public function setEmpleado(\Entities\Empleado $empleado)
    {
        $this->empleado = $empleado;
    }

    /**
     * Get empleado
     *
     * @return Entities\Empleado $empleado
     */
    public function getEmpleado()
    {
        return $this->empleado;
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
     * @var Entities\PactoSalud
     */
    private $pactosSalud;

    public function __construct()
    {
        $this->pactosSalud = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add pactosSalud
     *
     * @param Entities\PactoSalud $pactosSalud
     */
    public function addPactosSalud(\Entities\PactoSalud $pactosSalud)
    {
        $this->pactosSalud[] = $pactosSalud;
    }

    /**
     * Get pactosSalud
     *
     * @return Doctrine\Common\Collections\Collection $pactosSalud
     */
    public function getPactosSalud()
    {
        return $this->pactosSalud;
    }
    /**
     * @var Entities\RegistroMensual
     */
    private $registrosMensuales;


    /**
     * Add registrosMensuales
     *
     * @param Entities\RegistroMensual $registrosMensuales
     */
    public function addRegistrosMensuales(\Entities\RegistroMensual $registrosMensuales)
    {
        $this->registrosMensuales[] = $registrosMensuales;
    }

    /**
     * Get registrosMensuales
     *
     * @return Doctrine\Common\Collections\Collection $registrosMensuales
     */
    public function getRegistrosMensuales()
    {
        return $this->registrosMensuales;
    }
}