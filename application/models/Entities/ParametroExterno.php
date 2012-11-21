<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * ParametroExterno
 *
 * @ORM\Table(name="parametro_externo")
 * @ORM\Entity
 */
class ParametroExterno
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
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=21, nullable=false)
     */
    private $codigo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_vigencia", type="date", nullable=false)
     */
    private $fecha_vigencia;

    /**
     * @var float
     *
     * @ORM\Column(name="valor", type="float", nullable=false)
     */
    private $valor;


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
     * Set codigo
     *
     * @param string $codigo
     * @return ParametroExterno
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    
        return $this;
    }

    /**
     * Get codigo
     *
     * @return string 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set fecha_vigencia
     *
     * @param \DateTime $fechaVigencia
     * @return ParametroExterno
     */
    public function setFechaVigencia($fechaVigencia)
    {
        $this->fecha_vigencia = $fechaVigencia;
    
        return $this;
    }

    /**
     * Get fecha_vigencia
     *
     * @return \DateTime 
     */
    public function getFechaVigencia()
    {
        return $this->fecha_vigencia;
    }

    /**
     * Set valor
     *
     * @param float $valor
     * @return ParametroExterno
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    
        return $this;
    }

    /**
     * Get valor
     *
     * @return float 
     */
    public function getValor()
    {
        return $this->valor;
    }
}
