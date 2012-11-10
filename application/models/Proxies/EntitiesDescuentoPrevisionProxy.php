<?php

namespace Proxies;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class EntitiesDescuentoPrevisionProxy extends \Entities\DescuentoPrevision implements \Doctrine\ORM\Proxy\Proxy
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

    public function setDescuentoPrevision($descuentoPrevision)
    {
        $this->__load();
        return parent::setDescuentoPrevision($descuentoPrevision);
    }

    public function getDescuentoPrevision()
    {
        $this->__load();
        return parent::getDescuentoPrevision();
    }

    public function setPrevision(\Entities\Prevision $prevision)
    {
        $this->__load();
        return parent::setPrevision($prevision);
    }

    public function getPrevision()
    {
        $this->__load();
        return parent::getPrevision();
    }

    public function setDescuento($descuento)
    {
        $this->__load();
        return parent::setDescuento($descuento);
    }

    public function getDescuento()
    {
        $this->__load();
        return parent::getDescuento();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'fecha_periodo', 'descuento', 'prevision');
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