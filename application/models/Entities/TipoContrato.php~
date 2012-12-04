<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoContrato
 *
 * @ORM\Table(name="tipo_contrato")
 * @ORM\Entity
 */
class TipoContrato
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
     * @ORM\Column(name="cargo", type="string", length=45, nullable=false)
     */
    private $cargo;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Entities\RentaContrato", mappedBy="tipoContrato")
     * @ORM\OrderBy({
     *     "fecha_periodo"="DESC"
     * })
     */
    private $rentasContrato;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->rentasContrato = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set cargo
     *
     * @param string $cargo
     * @return TipoContrato
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;
    
        return $this;
    }

    /**
     * Get cargo
     *
     * @return string 
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * Add rentasContrato
     *
     * @param \Entities\RentaContrato $rentasContrato
     * @return TipoContrato
     */
    public function addRentasContrato(\Entities\RentaContrato $rentasContrato)
    {
        $this->rentasContrato[] = $rentasContrato;
    
        return $this;
    }

    /**
     * Remove rentasContrato
     *
     * @param \Entities\RentaContrato $rentasContrato
     */
    public function removeRentasContrato(\Entities\RentaContrato $rentasContrato)
    {
        $this->rentasContrato->removeElement($rentasContrato);
    }

    /**
     * Get rentasContrato
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRentasContrato()
    {
        return $this->rentasContrato;
    }
}
