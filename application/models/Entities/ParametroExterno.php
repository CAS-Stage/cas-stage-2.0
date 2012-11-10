<?php

namespace Entities;

/**
 * Entities\ParametroExterno
 */
class ParametroExterno
{
    /**
     * @var string $codigo
     */
    private $codigo;

    /**
     * @var date $fecha_vigencia
     */
    private $fecha_vigencia;

    /**
     * @var integer $valor
     */
    private $valor;


    /**
     * Set codigo
     *
     * @param string $codigo
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    /**
     * Get codigo
     *
     * @return string $codigo
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set fecha_vigencia
     *
     * @param date $fechaVigencia
     */
    public function setFechaVigencia($fechaVigencia)
    {
        $this->fecha_vigencia = $fechaVigencia;
    }

    /**
     * Get fecha_vigencia
     *
     * @return date $fechaVigencia
     */
    public function getFechaVigencia()
    {
        return $this->fecha_vigencia;
    }

    /**
     * Set valor
     *
     * @param integer $valor
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    /**
     * Get valor
     *
     * @return integer $valor
     */
    public function getValor()
    {
        return $this->valor;
    }
    /**
     * @var integer $id
     */
    private $id;


    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }
}