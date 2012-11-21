<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * SistemaSalud
 *
 * @ORM\Table(name="sistema_salud")
 * @ORM\Entity
 */
class SistemaSalud
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
     * @ORM\Column(name="nombre", type="string", length=45, nullable=false)
     */
    private $nombre;

    /**
     * @var boolean
     *
     * @ORM\Column(name="tiene_pacto", type="boolean", nullable=false)
     */
    private $tiene_pacto;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Entities\PactoSalud", mappedBy="sistemaSalud")
     */
    private $pactosSalud;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pactosSalud = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nombre
     *
     * @param string $nombre
     * @return SistemaSalud
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set tiene_pacto
     *
     * @param boolean $tienePacto
     * @return SistemaSalud
     */
    public function setTienePacto($tienePacto)
    {
        $this->tiene_pacto = $tienePacto;
    
        return $this;
    }

    /**
     * Get tiene_pacto
     *
     * @return boolean 
     */
    public function getTienePacto()
    {
        return $this->tiene_pacto;
    }

    /**
     * Add pactosSalud
     *
     * @param \Entities\PactoSalud $pactosSalud
     * @return SistemaSalud
     */
    public function addPactosSalud(\Entities\PactoSalud $pactosSalud)
    {
        $this->pactosSalud[] = $pactosSalud;
    
        return $this;
    }

    /**
     * Remove pactosSalud
     *
     * @param \Entities\PactoSalud $pactosSalud
     */
    public function removePactosSalud(\Entities\PactoSalud $pactosSalud)
    {
        $this->pactosSalud->removeElement($pactosSalud);
    }

    /**
     * Get pactosSalud
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPactosSalud()
    {
        return $this->pactosSalud;
    }
}
