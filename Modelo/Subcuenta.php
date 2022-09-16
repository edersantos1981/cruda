<?php

namespace Modelo;

/**
 * Description of Subcuenta
 *
 * @author usuario
 */
class Subcuenta extends \Uargflow\ModeloGenerico
{

    /**
     *
     * @var int
     */
    protected $fk_cuenta;

    /**
     *
     * @var Cuenta
     */
    protected $cuenta;



    function __construct($arrayDatos)
    {

        parent::mapeoAtributosArray($arrayDatos);
    }


    /**
     * Get the value of cuenta
     *
     * @return  int
     */
    public function getFk_cuenta()
    {
        return $this->fk_cuenta;
    }

    /**
     * Set the value of cuenta
     *
     * @param  int  $cuenta
     *
     */
    public function setFk_cuenta(int $cuenta)
    {
        $this->fk_cuenta = $cuenta;
    }

    /**
     * Get the value of cuenta
     *
     * @return Cuenta
     */
    public function getCuenta()
    {
        return $this->cuenta;
    }

    /**
     * Set the value of cuenta
     *
     * @param  Cuenta  $cuenta
     *
     */
    public function setCuenta($cuenta)
    {
        $this->cuenta = $cuenta;
    }

    function __toString()
    {
        return sprintf("%04d", $this->getId()) . " - " . $this->descripcion;
    }
    
}
