<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * RegistroMensual
 *
 * @ORM\Table(name="registro_mensual")
 * @ORM\Entity
 */
class RegistroMensual
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
     * @var float
     *
     * @ORM\Column(name="cantidad_horas_extras", type="float", nullable=true)
     */
    private $cantidad_horas_extras;

    /**
     * @var integer
     *
     * @ORM\Column(name="monto_anticipo", type="integer", nullable=true)
     */
    private $monto_anticipo;

    /**
     * @var integer
     *
     * @ORM\Column(name="bono_movilizacion", type="integer", nullable=true)
     */
    private $bono_movilizacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="bono_colacion", type="integer", nullable=true)
     */
    private $bono_colacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="bono_produccion", type="integer", nullable=true)
     */
    private $bono_produccion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_periodo", type="date", nullable=false)
     */
    private $fecha_periodo;

    /**
     * @var \Entities\Contrato
     *
     * @ORM\ManyToOne(targetEntity="Entities\Contrato", inversedBy="registrosMensuales")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_contrato", referencedColumnName="id")
     * })
     */
    private $contrato;


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
     * Set cantidad_horas_extras
     *
     * @param float $cantidadHorasExtras
     * @return RegistroMensual
     */
    public function setCantidadHorasExtras($cantidadHorasExtras)
    {
        $this->cantidad_horas_extras = $cantidadHorasExtras;
    
        return $this;
    }

    /**
     * Get cantidad_horas_extras
     *
     * @return float 
     */
    public function getCantidadHorasExtras()
    {
        return $this->cantidad_horas_extras;
    }

    /**
     * Set monto_anticipo
     *
     * @param integer $montoAnticipo
     * @return RegistroMensual
     */
    public function setMontoAnticipo($montoAnticipo)
    {
        $this->monto_anticipo = $montoAnticipo;
    
        return $this;
    }

    /**
     * Get monto_anticipo
     *
     * @return integer 
     */
    public function getMontoAnticipo()
    {
        return $this->monto_anticipo;
    }

    /**
     * Set bono_movilizacion
     *
     * @param integer $bonoMovilizacion
     * @return RegistroMensual
     */
    public function setBonoMovilizacion($bonoMovilizacion)
    {
        $this->bono_movilizacion = $bonoMovilizacion;
    
        return $this;
    }

    /**
     * Get bono_movilizacion
     *
     * @return integer 
     */
    public function getBonoMovilizacion()
    {
        return $this->bono_movilizacion;
    }

    /**
     * Set bono_colacion
     *
     * @param integer $bonoColacion
     * @return RegistroMensual
     */
    public function setBonoColacion($bonoColacion)
    {
        $this->bono_colacion = $bonoColacion;
    
        return $this;
    }

    /**
     * Get bono_colacion
     *
     * @return integer 
     */
    public function getBonoColacion()
    {
        return $this->bono_colacion;
    }

    /**
     * Set bono_produccion
     *
     * @param integer $bonoProduccion
     * @return RegistroMensual
     */
    public function setBonoProduccion($bonoProduccion)
    {
        $this->bono_produccion = $bonoProduccion;
    
        return $this;
    }

    /**
     * Get bono_produccion
     *
     * @return integer 
     */
    public function getBonoProduccion()
    {
        return $this->bono_produccion;
    }

    /**
     * Set fecha_periodo
     *
     * @param \DateTime $fechaPeriodo
     * @return RegistroMensual
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
     * Set contrato
     *
     * @param \Entities\Contrato $contrato
     * @return RegistroMensual
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
}
