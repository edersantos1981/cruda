<?php 
namespace Modelo;
class CuentaColeccion extends \Cruda\ColeccionGenerica {
    
    public function __construct($array) {
        parent::__construct($array, Cuenta::class);
    }
    
    /**
    * @return Cuenta[]
    */
    public function getColeccion() {
    	return parent::getColeccion();
    }
    
}