<?php

namespace Modelo;

/**
 * Description of Sistema
 *
 * @author usuario
 */
class Sistema extends \Cruda\ModeloGenerico {


    function __construct($arrayDatos) {

        parent::mapeoAtributosArray($arrayDatos);
    }

    function __toString()
    {
        return sprintf("%04d", $this->id) . " - " . $this->descripcion;
    }

}
