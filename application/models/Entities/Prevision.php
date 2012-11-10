<?php

namespace Entities;

/**
 * Entities\Prevision
 */
class Prevision
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $nombre
     */
    private $nombre;

    /**
     * @var Entities\Contrato
     */
    private $contratos;

    /**
     * @var Entities\DescuentoPrevision
     */
    private $descuentosPrevision;

    public function __construct()
    {
        $this->contratos = new \Doctrine\Common\Collections\ArrayCollection();
    $this->descuentosPrevision = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
     * Set nombre
     *
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * Get nombre
     *
     * @return string $nombre
     */
    public function getNombre()
    {
        return $this->nombre;
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
     * Add descuentosPrevision
     *
     * @param Entities\DescuentoPrevision $descuentosPrevision
     */
    public function addDescuentosPrevision(\Entities\DescuentoPrevision $descuentosPrevision)
    {
        $this->descuentosPrevision[] = $descuentosPrevision;
    }

    /**
     * Get descuentosPrevision
     *
     * @return Doctrine\Common\Collections\Collection $descuentosPrevision
     */
    public function getDescuentosPrevision()
    {
        return $this->descuentosPrevision;
    }
}