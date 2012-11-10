<?php

namespace Entities;

/**
 * Entities\SistemaSalud
 */
class SistemaSalud
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
     * @var boolean $tiene_pacto
     */
    private $tiene_pacto;

    /**
     * @var Entities\PactoSalud
     */
    private $pactosSalud;

    public function __construct()
    {
        $this->pactosSalud = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set tiene_pacto
     *
     * @param boolean $tienePacto
     */
    public function setTienePacto($tienePacto)
    {
        $this->tiene_pacto = $tienePacto;
    }

    /**
     * Get tiene_pacto
     *
     * @return boolean $tienePacto
     */
    public function getTienePacto()
    {
        return $this->tiene_pacto;
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
}