<?php 
namespace Modelo;
class UnidadMedidaColeccion extends \Cruda\ColeccionGenerica {
    
    public function __construct($array) {
        parent::__construct($array, UnidadMedida::class);
    }
    
    /**
    * @return UnidadMedida[]
    */
    public function getColeccion() {
    	return parent::getColeccion();
    }
    
}