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
    protected $fk_sistema;

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
     * @return Sistema
     */ 
    public function getSistema()
    {
        return $this->sistema;
    }

    /**
     * Set the value of sistema
     *
     * @param  Sistema  $sistema_
     */ 
    public function setSistema($sistema_)
    {
        $this->sistema = $sistema_;
    }
    
    function __toString()
    {
        return sprintf("%04d", $this->id) . " - " . $this->descripcion;
    }
}
