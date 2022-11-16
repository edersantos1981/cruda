<?php

namespace Modelo;

/**
 * Description of Cuenta
 *
 * @author usuario
 */
class Cuenta extends \Cruda\ModeloGenerico {


    function __construct($arrayDatos) {

        parent::mapeoAtributosArray($arrayDatos);
    }

    function __toString()
    {
        return sprintf("%04d", $this->getId()) . " - " . $this->descripcion;
    }

}
