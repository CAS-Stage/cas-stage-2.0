<?php

namespace Proxies;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class EntitiesEmpleadoProxy extends \Entities\Empleado implements \Doctrine\ORM\Proxy\Proxy
{
    private $_entityPersister;
    private $_identifier;
    public $__isInitialized__ = false;
    public function __construct($entityPersister, $identifier)
    {
        $this->_entityPersister = $entityPersister;
        $this->_identifier = $identifier;
    }
    /** @private */
    public function __load()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;

            if (method_exists($this, "__wakeup")) {
                // call this after __isInitialized__to avoid infinite recursion
                // but before loading to emulate what ClassMetadata::newInstance()
                // provides.
                $this->__wakeup();
            }

            if ($this->_entityPersister->load($this->_identifier, $this) === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }
    
    
    public function setRut($rut)
    {
        $this->__load();
        return parent::setRut($rut);
    }

    public function getRut()
    {
        $this->__load();
        return parent::getRut();
    }

    public function setApellidos($apellidos)
    {
        $this->__load();
        return parent::setApellidos($apellidos);
    }

    public function getApellidos()
    {
        $this->__load();
        return parent::getApellidos();
    }

    public function setNombres($nombres)
    {
        $this->__load();
        return parent::setNombres($nombres);
    }

    public function getNombres()
    {
        $this->__load();
        return parent::getNombres();
    }

    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->__load();
        return parent::setFechaNacimiento($fechaNacimiento);
    }

    public function getFechaNacimiento()
    {
        $this->__load();
        return parent::getFechaNacimiento();
    }

    public function setDireccion($direccion)
    {
        $this->__load();
        return parent::setDireccion($direccion);
    }

    public function getDireccion()
    {
        $this->__load();
        return parent::getDireccion();
    }

    public function setFono($fono)
    {
        $this->__load();
        return parent::setFono($fono);
    }

    public function getFono()
    {
        $this->__load();
        return parent::getFono();
    }

    public function addContratos(\Entities\Contrato $contratos)
    {
        $this->__load();
        return parent::addContratos($contratos);
    }

    public function getContratos()
    {
        $this->__load();
        return parent::getContratos();
    }

    public function addRegistrosMensuales(\Entities\RegistroMensual $registrosMensuales)
    {
        $this->__load();
        return parent::addRegistrosMensuales($registrosMensuales);
    }

    public function getRegistrosMensuales()
    {
        $this->__load();
        return parent::getRegistrosMensuales();
    }

    public function setComuna(\Entities\Comuna $comuna)
    {
        $this->__load();
        return parent::setComuna($comuna);
    }

    public function getComuna()
    {
        $this->__load();
        return parent::getComuna();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'rut', 'apellidos', 'nombres', 'fecha_nacimiento', 'direccion', 'fono', 'contratos', 'registrosMensuales', 'comuna');
    }

    public function __clone()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            $class = $this->_entityPersister->getClassMetadata();
            $original = $this->_entityPersister->load($this->_identifier);
            if ($original === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            foreach ($class->reflFields AS $field => $reflProperty) {
                $reflProperty->setValue($this, $reflProperty->getValue($original));
            }
            unset($this->_entityPersister, $this->_identifier);
        }
        
    }
}