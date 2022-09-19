<?php 
namespace Modelo;
class CuentaColeccion extends \Uargflow\ColeccionGenerica {
    
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