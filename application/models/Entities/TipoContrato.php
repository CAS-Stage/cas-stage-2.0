<?php

namespace Entities;

/**
 * Entities\TipoContrato
 */
class TipoContrato
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $cargo
     */
    private $cargo;

    /**
     * @var Entities\RentaContrato
     */
    private $rentasContrato;

    public function __construct()
    {
        $this->rentasContrato = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set cargo
     *
     * @param string $cargo
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;
    }

    /**
     * Get cargo
     *
     * @return string $cargo
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * Add rentasContrato
     *
     * @param Entities\RentaContrato $rentasContrato
     */
    public function addRentasContrato(\Entities\RentaContrato $rentasContrato)
    {
        $this->rentasContrato[] = $rentasContrato;
    }

    /**
     * Get rentasContrato
     *
     * @return Doctrine\Common\Collections\Collection $rentasContrato
     */
    public function getRentasContrato()
    {
        return $this->rentasContrato;
    }
}