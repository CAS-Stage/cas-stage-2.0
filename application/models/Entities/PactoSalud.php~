<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * PactoSalud
 *
 * @ORM\Table(name="pacto_salud")
 * @ORM\Entity
 */
class PactoSalud
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_periodo", type="date", nullable=false)
     */
    private $fecha_periodo;

    /**
     * @var float
     *
     * @ORM\Column(name="pacto", type="float", nullable=true)
     */
    private $pacto;

    /**
     * @var \Entities\Contrato
     *
     * @ORM\ManyToOne(targetEntity="Entities\Contrato", inversedBy="pactosSalud")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_contrato", referencedColumnName="id")
     * })
     */
    private $contrato;

    /**
     * @var \Entities\SistemaSalud
     *
     * @ORM\ManyToOne(targetEntity="Entities\SistemaSalud", inversedBy="pactosSalud")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_sistema_salud", referencedColumnName="id")
     * })
     */
    private $sistemaSalud;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set fecha_periodo
     *
     * @param \DateTime $fechaPeriodo
     * @return PactoSalud
     */
    public function setFechaPeriodo($fechaPeriodo)
    {
        $this->fecha_periodo = $fechaPeriodo;
    
        return $this;
    }

    /**
     * Get fecha_periodo
     *
     * @return \DateTime 
     */
    public function getFechaPeriodo()
    {
        return $this->fecha_periodo;
    }

    /**
     * Set pacto
     *
     * @param float $pacto
     * @return PactoSalud
     */
    public function setPacto($pacto)
    {
        $this->pacto = $pacto;
    
        return $this;
    }

    /**
     * Get pacto
     *
     * @return float 
     */
    public function getPacto()
    {
        return $this->pacto;
    }

    /**
     * Set contrato
     *
     * @param \Entities\Contrato $contrato
     * @return PactoSalud
     */
    public function setContrato(\Entities\Contrato $contrato = null)
    {
        $this->contrato = $contrato;
    
        return $this;
    }

    /**
     * Get contrato
     *
     * @return \Entities\Contrato 
     */
    public function getContrato()
    {
        return $this->contrato;
    }

    /**
     * Set sistemaSalud
     *
     * @param \Entities\SistemaSalud $sistemaSalud
     * @return PactoSalud
     */
    public function setSistemaSalud(\Entities\SistemaSalud $sistemaSalud = null)
    {
        $this->sistemaSalud = $sistemaSalud;
    
        return $this;
    }

    /**
     * Get sistemaSalud
     *
     * @return \Entities\SistemaSalud 
     */
    public function getSistemaSalud()
    {
        return $this->sistemaSalud;
    }
}
