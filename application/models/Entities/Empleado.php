<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Empleado
 *
 * @ORM\Table(name="empleado")
 * @ORM\Entity
 */
class Empleado
{
    /**
     * @var integer
     *
     * @ORM\Column(name="rut", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $rut;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidos", type="string", length=45, nullable=false)
     */
    private $apellidos;

    /**
     * @var string
     *
     * @ORM\Column(name="nombres", type="string", length=45, nullable=false)
     */
    private $nombres;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_nacimiento", type="date", nullable=false)
     */
    private $fecha_nacimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=100, nullable=false)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="fono", type="string", length=45, nullable=true)
     */
    private $fono;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Entities\Contrato", mappedBy="empleado")
     */
    private $contratos;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Entities\RegistroMensual", mappedBy="registroMensual")
     */
    private $registrosMensuales;

    /**
     * @var \Entities\Comuna
     *
     * @ORM\ManyToOne(targetEntity="Entities\Comuna")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_comuna", referencedColumnName="id")
     * })
     */
    private $comuna;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->contratos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->registrosMensuales = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set rut
     *
     * @param integer $rut
     * @return Empleado
     */
    public function setRut($rut)
    {
        $this->rut = $rut;
    
        return $this;
    }

    /**
     * Get rut
     *
     * @return integer 
     */
    public function getRut()
    {
        return $this->rut;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     * @return Empleado
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    
        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string 
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set nombres
     *
     * @param string $nombres
     * @return Empleado
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;
    
        return $this;
    }

    /**
     * Get nombres
     *
     * @return string 
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * Set fecha_nacimiento
     *
     * @param \DateTime $fechaNacimiento
     * @return Empleado
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fecha_nacimiento = $fechaNacimiento;
    
        return $this;
    }

    /**
     * Get fecha_nacimiento
     *
     * @return \DateTime 
     */
    public function getFechaNacimiento()
    {
        return $this->fecha_nacimiento;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Empleado
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    
        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set fono
     *
     * @param string $fono
     * @return Empleado
     */
    public function setFono($fono)
    {
        $this->fono = $fono;
    
        return $this;
    }

    /**
     * Get fono
     *
     * @return string 
     */
    public function getFono()
    {
        return $this->fono;
    }

    /**
     * Add contratos
     *
     * @param \Entities\Contrato $contratos
     * @return Empleado
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
     * Add registrosMensuales
     *
     * @param \Entities\RegistroMensual $registrosMensuales
     * @return Empleado
     */
    public function addRegistrosMensuale(\Entities\RegistroMensual $registrosMensuales)
    {
        $this->registrosMensuales[] = $registrosMensuales;
    
        return $this;
    }

    /**
     * Remove registrosMensuales
     *
     * @param \Entities\RegistroMensual $registrosMensuales
     */
    public function removeRegistrosMensuale(\Entities\RegistroMensual $registrosMensuales)
    {
        $this->registrosMensuales->removeElement($registrosMensuales);
    }

    /**
     * Get registrosMensuales
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRegistrosMensuales()
    {
        return $this->registrosMensuales;
    }

    /**
     * Set comuna
     *
     * @param \Entities\Comuna $comuna
     * @return Empleado
     */
    public function setComuna(\Entities\Comuna $comuna = null)
    {
        $this->comuna = $comuna;
    
        return $this;
    }

    /**
     * Get comuna
     *
     * @return \Entities\Comuna 
     */
    public function getComuna()
    {
        return $this->comuna;
    }
}
