<?php

namespace Entities;

/**
 * Entities\Comuna
 */
class Comuna
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
}