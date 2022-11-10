<?php

namespace Modelo;

/**
 * Description of Usuario
 *
 * @author usuario
 */
class Usuario extends \Uargflow\ModeloGenerico
{
    /**
     *
     * @var int
     */
    protected $fk_rol;

    /**
     *
     * @var Rol
     */
    protected $rol;

    /**
     *
     * @var String
     */
    protected $mail, $whatsapp, $password;

    function __construct($arrayDatos)
    {

        parent::mapeoAtributosArray($arrayDatos);
    }

    /**
     * Get the value of mail
     *
     * @return  String
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Get the value of whatsapp
     *
     * @return  String
     */
    public function getWhatsapp()
    {
        return $this->whatsapp;
    }

    /**
     * Get the value of password
     *
     * @return  String
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of whatsapp
     *
     * @param  String  $whatsapp
     */
    public function setWhatsapp(String $whatsapp)
    {
        $this->whatsapp = $whatsapp;
    }

    /**
     * Set the value of mail
     *
     * @param  String  $mail
     */
    public function setMail(String $mail)
    {
        $this->mail = $mail;
    }

    /**
     * Set the value of password
     *
     * @param  String  $password
     */
    public function setPassword(String $password)
    {
        $this->password = $password;
    }

    /**
     * Get the value of fk_rol
     *
     * @return  int
     */ 
    public function getFk_rol()
    {
        return $this->fk_rol;
    }

    /**
     * Set the value of fk_rol
     *
     * @param  int  $fk_rol
     */ 
    public function setFk_rol(int $fk_rol)
    {
        $this->fk_rol = $fk_rol;
    }

    /**
     * Get the value of rol
     *
     * @return Rol
     */ 
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * Set the value of rol
     *
     * @param  Rol  $rol_
     */ 
    public function setRol($rol_)
    {
        $this->rol = $rol_;
    }

    function __toString()
    {
        return sprintf("%04d", $this->getId()) . " - " . $this->nombre;
    }
}
