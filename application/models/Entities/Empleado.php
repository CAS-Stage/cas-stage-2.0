<?php

namespace Entities;

/**
 * Entities\Empleado
 */
class Empleado
{
    /**
     * @var integer $rut
     */
    private $rut;

    /**
     * @var string $apellidos
     */
    private $apellidos;

    /**
     * @var string $nombres
     */
    private $nombres;

    /**
     * @var date $fecha_nacimiento
     */
    private $fecha_nacimiento;

    /**
     * @var string $direccion
     */
    private $direccion;

    /**
     * @var string $fono
     */
    private $fono;

    /**
     * @var Entities\Contrato
     */
    private $contratos;

    /**
     * @var Entities\RegistroMensual
     */
    private $registrosMensuales;

    /**
     * @var Entities\Comuna
     */
    private $comuna;

    public function __construct()
    {
        $this->contratos = new \Doctrine\Common\Collections\ArrayCollection();
    $this->registrosMensuales = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set rut
     *
     * @param integer $rut
     */
    public function setRut($rut)
    {
        $this->rut = $rut;
    }

    /**
     * Get rut
     *
     * @return integer $rut
     */
    public function getRut()
    {
        return $this->rut;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    /**
     * Get apellidos
     *
     * @return string $apellidos
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set nombres
     *
     * @param string $nombres
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;
    }

    /**
     * Get nombres
     *
     * @return string $nombres
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * Set fecha_nacimiento
     *
     * @param date $fechaNacimiento
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fecha_nacimiento = $fechaNacimiento;
    }

    /**
     * Get fecha_nacimiento
     *
     * @return date $fechaNacimiento
     */
    public function getFechaNacimiento()
    {
        return $this->fecha_nacimiento;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    /**
     * Get direccion
     *
     * @return string $direccion
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set fono
     *
     * @param string $fono
     */
    public function setFono($fono)
    {
        $this->fono = $fono;
    }

    /**
     * Get fono
     *
     * @return string $fono
     */
    public function getFono()
    {
        return $this->fono;
    }

    /**
     * Add contratos
     *
     * @param Entities\Contrato $contratos
     */
    public function addContratos(\Entities\Contrato $contratos)
    {
        $this->contratos[] = $contratos;
    }

    /**
     * Get contratos
     *
     * @return Doctrine\Common\Collections\Collection $contratos
     */
    public function getContratos()
    {
        return $this->contratos;
    }

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

    /**
     * Set comuna
     *
     * @param Entities\Comuna $comuna
     */
    public function setComuna(\Entities\Comuna $comuna)
    {
        $this->comuna = $comuna;
    }

    /**
     * Get comuna
     *
     * @return Entities\Comuna $comuna
     */
    public function getComuna()
    {
        return $this->comuna;
    }
}