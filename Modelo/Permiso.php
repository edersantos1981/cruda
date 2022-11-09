<?php

namespace Modelo;

/**
 * Description of Permiso
 *
 * @author usuario
 */
class Permiso extends \Uargflow\ModeloGenerico {

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

    function __toString()
    {
        return sprintf("%04d", $this->getId()) . " - " . $this->descripcion;
    }
}
