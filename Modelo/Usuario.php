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
     * @var String
     */
    protected $mail, $whatsapp, $password;

    function __construct($arrayDatos)
    {

        parent::mapeoAtributosArray($arrayDatos);
    }


    function __toString()
    {
        return sprintf("%04d", $this->getId()) . " - " . $this->nombre;
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
}
