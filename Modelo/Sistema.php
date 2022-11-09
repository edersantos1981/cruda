<?php

namespace Modelo;

/**
 * Description of Sistema
 *
 * @author usuario
 */
class Sistema extends \Uargflow\ModeloGenerico {


    function __construct($arrayDatos) {

        parent::mapeoAtributosArray($arrayDatos);
    }

    function __toString()
    {
        return sprintf("%04d", $this->getId()) . " - " . $this->descripcion;
    }

}
