<?php 
namespace Modelo;
class SubcuentaColeccion extends \Cruda\ColeccionGenerica {
    
    public function __construct($array) {
        parent::__construct($array, Subcuenta::class);
    }
    
    /**
    * @return Subcuenta[]
    */
    public function getColeccion() {
    	return parent::getColeccion();
    }
    
}