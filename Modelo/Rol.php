<?php

namespace Modelo;

/**
 * Description of Rol
 *
 * @author usuario
 */
class Rol extends \Uargflow\ModeloGenerico {

     /**
     *
     * @var int
     */
    protected $fk_sistema, $vigencia_pass;

     /**
     *
     * @var String
     */
    protected $sistema;

    function __construct($arrayDatos) {

        parent::mapeoAtributosArray($arrayDatos);
    }

    /**
     * Get the value of fk_sistema
     *
     * @return  int
     */ 
    public function getFk_sistema()
    {
        return $this->fk_sistema;
    }

    /**
     * Set the value of fk_sistema
     *
     * @param  int  $fk_sistema
     */ 
    public function setFk_sistema(int $fk_sistema)
    {
        $this->fk_sistema = $fk_sistema;
    }

    /**
     * Get the value of sistema
     *
     * @return  String
     */ 
    public function getSistema()
    {
        return $this->sistema;
    }

    /**
     * Set the value of sistema
     *
     * @param  String  $sistema
     */ 
    public function setSistema(String $sistema)
    {
        $this->sistema = $sistema;
    }

    /**
     * Get the value of vigencia_pass
     *
     * @return  int
     */ 
    public function getVigencia_pass()
    {
        return $this->vigencia_pass;
    }

    /**
     * Set the value of vigencia_pass
     *
     * @param  int  $vigencia_pass
     *
     * @return  self
     */ 
    public function setVigencia_pass(int $vigencia_pass)
    {
        $this->vigencia_pass = $vigencia_pass;

        return $this;
    }
    
    function __toString()
    {
        return sprintf("%04d", $this->getId()) . " - " . $this->descripcion;
    }
}
