<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 */
class Usuario
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $perfil;

    /**
     * @var string
     */
    private $nombre;


    /**
     * Set id
     *
     * @param integer $id
     * @return Usuario
     */
    public function setId($id)
    {
        $this->id = $id;
    
        return $this;
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
     * Set username
     *
     * @param string $username
     * @return Usuario
     */
    public function setUsername($username)
    {
        $this->username = $username;
    
        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Usuario
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set perfil
     *
     * @param string $perfil
     * @return Usuario
     */
    public function setPerfil($perfil)
    {
        $this->perfil = $perfil;
    
        return $this;
    }

    /**
     * Get perfil
     *
     * @return string 
     */
    public function getPerfil()
    {
        return $this->perfil;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Usuario
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
}
