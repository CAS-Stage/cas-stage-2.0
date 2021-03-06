<?php

namespace Proxies;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class EntitiesPactoSaludProxy extends \Entities\PactoSalud implements \Doctrine\ORM\Proxy\Proxy
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
    
    
    public function getId()
    {
        $this->__load();
        return parent::getId();
    }

    public function setFechaPeriodo($fechaPeriodo)
    {
        $this->__load();
        return parent::setFechaPeriodo($fechaPeriodo);
    }

    public function getFechaPeriodo()
    {
        $this->__load();
        return parent::getFechaPeriodo();
    }

    public function setPacto($pacto)
    {
        $this->__load();
        return parent::setPacto($pacto);
    }

    public function getPacto()
    {
        $this->__load();
        return parent::getPacto();
    }

    public function setContrato(\Entities\Contrato $contrato)
    {
        $this->__load();
        return parent::setContrato($contrato);
    }

    public function getContrato()
    {
        $this->__load();
        return parent::getContrato();
    }

    public function setSistemaSalud(\Entities\SistemaSalud $sistemaSalud)
    {
        $this->__load();
        return parent::setSistemaSalud($sistemaSalud);
    }

    public function getSistemaSalud()
    {
        $this->__load();
        return parent::getSistemaSalud();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'fecha_periodo', 'pacto', 'contrato', 'sistemaSalud');
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