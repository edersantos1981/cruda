<?php

namespace Modelo;

/**
 * Description of Usuario
 *
 * @author usuario
 */
class Usuario extends \Cruda\ModeloGenerico
{
    
    /**
     *
     * @var Rol[]
     */
    protected $roles;

    /**
     *
     * @var String
     */
    protected $mail, $nombre_completo, $nombre_usuario, $whatsapp, $password;

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
     * Get the value of rol
     *
     * @return Rol[]
     */
    public function getRoles()
    {
        return $this->roles;
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
     * Set the value of rol
     *
     * @param  Rol[]  $roles_
     */
    public function setRoles($roles_)
    {
        $this->roles = $roles_;
    }

    /**
     * Get the value of nombre_completo
     *
     * @return  String
     */
    public function getNombre_completo()
    {
        return $this->nombre_completo;
    }

    /**
     * Get the value of nombre_usuario
     *
     * @return  String
     */
    public function getNombre_usuario()
    {
        return $this->nombre_usuario;
    }

    /**
     * Set the value of nombre_completo
     *
     * @param  String  $nombre_completo
     */
    public function setNombre_completo(String $nombre_completo)
    {
        $this->nombre_completo = $nombre_completo;
    }

    /**
     * Set the value of nombre_usuario
     *
     * @param  String  $nombre_usuario
     */
    public function setNombre_usuario(String $nombre_usuario)
    {
        $this->nombre_usuario = $nombre_usuario;
    }

    function __toString()
    {
        return sprintf("%04d", $this->getId()) . " - " . $this->nombre;
    }
}
